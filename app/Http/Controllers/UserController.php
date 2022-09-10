<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    private $obj_info = ['name' => 'user', 'routing' => 'admin.controller', 'title' => 'User', 'icon' => '<i class="fas fa-user"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $columns = [];
    private $fprimarykey = 'id';
    private $protectme = null;

    public $dflang;
    private $rcdperpage = 15; #record per page, set zero to get all record# set -1 to use default
    private $users;

    private $koboform_id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $args = [])
    {
        //$this->middleware('auth');
        // dd($args['userinfo']);
        $this->obj_info['title'] = 'User'; //__('label.lb09');

        $default_protectme = config('me.app.protectme');
        $this->protectme = [
            'display' => 'yes',
            'group' => [],
            'object' => [$this->obj_info['name']],
            'method'  => [
                'index' => $default_protectme['index'],
                // 'show' => $default_protectme['show'],
                'create' => $default_protectme['create'],
                'edit' => $default_protectme['edit'],
                'delete' => $default_protectme['delete'],
                // 'destroy' => $default_protectme['destroy'],
                // 'restore' => $default_protectme['restore'],
            ]
        ];

        $this->args = $args;
        $this->model = new User;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();

        /*column*/
        $tbl_columns = getTableColumns($this->tablename);
        //dd($tbl_columns);
        foreach ($tbl_columns as $column) {
            //tbl
            if (strpos($column, 'tbl') !== false) {
                array_push($this->columns, $column);
            }
        }
        natsort($this->columns);
        //dd($this->columns);
    }

    public function getters($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function setters($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function default()
    {

        /*location*/
        $location = Location::getlocation($this->dflang[0])->get();
        $provinces = $location->pluck('title', 'id')->toArray();

        /*permission*/
        $permission = UserPermission::select('permission_id', 'title')->where('trash', '<>', 'yes')
            ->get()
            ->pluck('title', 'permission_id')
            ->toArray();

        return [
            'provinces' => $provinces,
            'permission' => $permission,
        ];
    } /*../function..*/

    public function listingModel()
    {
        #DEFIND MODEL#
        return $this->model
            ->leftJoin('users_permission', 'users_permission.permission_id', 'users.permission_id')

            ->select(
                \DB::raw($this->fprimarykey . " AS id, name,email, fullname ,userstatus, users.permission_id, users_permission.title as permission"),

            )->whereRaw('users.trash <> "yes"');
    } /*../function..*/
    //JSON_UNQUOTE(JSON_EXTRACT(title, '$.".$this->dflang[0]."'))

    public function sfp($request, $results)
    {
        #Sort Filter Pagination#

        // CACHE SORTING INPUTS
        $allowed = array('title', $this->fprimarykey);
        $sort = in_array($request->input('sort'), $allowed) ? $request->input('sort') : $this->fprimarykey;
        $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
        $results = $results->orderby($sort, $order);

        // FILTERS
        $appends = [];
        $querystr = [];
        $districts = [];
        $communes = [];

        if ($request->has('round') && !empty($request->input('round'))) {
            $qry = (int)$request->input('round');
            $results = $results->where("round", $qry);

            array_push($querystr, 'round=' . $qry);
            $appends = array_merge($appends, ['round' => $qry]);
        }

        if ($request->has('phase') && !empty($request->input('phase'))) {
            $qry = (int)$request->input('phase');
            $results = $results->where("phase", $qry);

            array_push($querystr, 'phase=' . $qry);
            $appends = array_merge($appends, ['phase' => $qry]);
        }

        if ($request->has('province') && !empty($request->input('province'))) {
            $qry = (int)$request->input('province');
            $results = $results->where("province", $qry);

            array_push($querystr, 'province=' . $qry);
            $appends = array_merge($appends, ['province' => $qry]);

            $where = [['trash', '<>', 'yes'], ['parent_id', '=', $qry ?? -1]];
            $location = Location::getlocation($this->dflang[0], $where)->get();
            $districts = $location->pluck('title', 'id')->toArray();
        }

        if ($request->has('district') && !empty($request->input('district'))) {
            $qry = (int)$request->input('district');
            $results = $results->where("district", $qry);

            array_push($querystr, 'district=' . $qry);
            $appends = array_merge($appends, ['district' => $qry]);

            $where = [['trash', '<>', 'yes'], ['parent_id', '=', $qry ?? -1]];
            $location = Location::getlocation($this->dflang[0], $where)->get();
            $communes = $location->pluck('title', 'id')->toArray();
        }

        if ($request->has('commune') && !empty($request->input('commune'))) {
            $qry = (int)$request->input('commune');
            $results = $results->where("commune", $qry);

            array_push($querystr, 'commune=' . $qry);
            $appends = array_merge($appends, ['commune' => $qry]);
        }


        // PAGINATION and PERPAGE
        $perpage = null;
        $perpage_query = [];
        if ($request->has('perpage')) {
            $perpage = $request->input('perpage');
            $perpage_query = ['perpage=' . $perpage];
            $appends = array_merge($appends, ['perpage' => $perpage]);
        } elseif (null !== $this->rcdperpage && $this->rcdperpage != 0) {
            $perpage = $this->rcdperpage < 0 ? config('me.app.rpp') ?? 15 : $this->rcdperpage;
        }
        if (null !== $perpage) {
            $results = $results->paginate($perpage);
        }

        $appends = array_merge(
            $appends,
            [
                'sort'      => $request->input('sort'),
                'order'     => $request->input('order')
            ]
        );

        $pagination = $results->appends(
            $appends
        );

        // dd($pagination);
        $recordinfo = recordInfo($pagination->currentPage(), $pagination->perPage(), $pagination->total());

        return [
            'results'           => $results,
            'paginationlinks'    => $pagination->links("pagination::bootstrap-4"),
            'recordinfo'    => $recordinfo,
            'sort'          => $sort,
            'order'         => $order,
            'querystr'      => $querystr,
            'perpage_query' => $perpage_query,
            'districts'     => $districts,
            'communes'      => $communes,
        ];
    } /*../function..*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $condition = [], $setting = [])
    {
        $default = $this->default();
        $provinces = $default['provinces'];

        $results = $this->listingmodel();
        $sfp = $this->sfp($request, $results);

        //return \Redirect::to('/test/index');
        $create_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'create', ''
            ],
        );

        $trash_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'trash', ''
            ],
        );

        return view('app.' . $this->obj_info['name'] . '.index', compact(['provinces']))
            ->with([

                'obj_info'  => $this->obj_info,
                'route' => [
                    'create'  => $create_route,
                    'trash' => $trash_route
                ],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Active',
            ])
            ->with(['act' => 'index'])
            ->with($sfp)
            ->with($setting);
    }

    public function trash(Request $request, $condition = [], $setting = [])
    {
    }



    public function validator($request, $isupdate = false)
    {
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $update_rules = [$this->fprimarykey => 'required'];

        $rules['name']      = ['required', 'string'];
        $rules['phone']      = ['required', 'numeric'];
        // dd($request->input('permission_id'));
        if ($request->input('permission_id') != 1) {

            $rules['permission_id']      = ['required'];

            $rules['fullname']      = ['required'];
        }



        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' => 'The :attribute field can not be blank.',
        ];
        if ($isupdate) {
            $rules['name']      = ['required', 'string', 'unique:users,name,' . $newid];
            $rules['phone']      = ['required',  'numeric', 'unique:users,email,' . $newid];
            $rules = array_merge($rules, $update_rules);
        } else {
            $rules['password']      = ['required', 'string', 'min:6', 'confirmed'];
        }
        return Validator::make($request->input(), $rules, $validatorMessages);
    }

    public function conateArrayToString($request, $value)
    {
        $item = [];
        if (!empty($value)) {
            array_push($item, $value);
            $item = "'" . implode("','", $item[0]) . "'";
        }
        return $item;
    }

    public function setinfo($request, $isupdate = false)
    {
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $tableData = [];
        $userlevel = $this->conateArrayToString($request, $request->input('userlevel'));
        $formtype = $this->conateArrayToString($request, $request->input('formtype'));
        $formuse = $this->conateArrayToString($request, $request->input('formuse'));

        $levelsetting = !empty($request->input('levelsetting')) ? $request->input('levelsetting') : [];
        $tableData = [

            'id' => $newid,
            'name'     => !empty($request->input('name')) ? $request->input('name') : '',
            'email'    => !empty($request->input('phone')) ? $request->input('phone') : '',
            'password' =>  Hash::make($request->input('password')),
            'permission_id' => !empty($request->input('permission_id')) ? $request->input('permission_id') : 0,

            'userstatus' => !empty($request->input('userstatus')) ? $request->input('userstatus') : 'no',

            'fullname'   => !empty($request->input('fullname')) ? $request->input('fullname') : '',
            'trash'     => 'no',

        ];
        if ($isupdate) {
            $tableData = array_except($tableData, [$this->fprimarykey, 'password', 'trash']);
        }
        return ['tableData' => $tableData, 'id' => $newid];
    }

    public function create()
    {
        $default = $this->default();
        $provinces = $default['provinces'];
        $permission = $default['permission'];
        $districts = [];
        $communes = [];
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'store', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.create',  compact(['permission', 'provinces', 'districts', 'communes']))
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'New',
                'isupdate' => false,

            ]);
    } /*../function..*/

    public function store(Request $request)
    {
        $data = [];
        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {
            $validate = $this->validator($request);
            if ($validate->fails()) {
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            "message" => __('me.forminvalid'),
                            "data" => $validate->errors()
                        ],
                        422
                    );
            }
            $data = $this->setinfo($request);
            // dd($data);
            return $this->proceed_store($request, $data, $obj_info);
        } /*end if is post*/

        return response()
            ->json(
                [
                    "type" => "error",
                    "message" => __('me.forminvalid'),
                    "data" => []
                ],
                422
            );
    }
    /* end function*/
    function proceed_store($request, $data, $obj_info)
    {
        $save_status = $this->model->insert($data['tableData']);
        if ($save_status) {
            $savetype = strtolower($request->input('savetype'));
            $success_ms = __('ccms.suc_save');
            return response()
                ->json(
                    [
                        "type" => "success",
                        "status" => $save_status,
                        "message" => 'Success',
                        "data" => []
                    ],
                    200
                );
        }
        return response()
            ->json(
                [
                    "type" => "error",
                    'status' => false,
                    "message" => 'Save is false',
                    "data" => []
                ],
                422
            );
    }
    /* end function*/

    public function edit(Request $request, $id = 0)
    {

        #prepare for back to url after SAVE#
        if (!$request->session()->has('backurl')) {
            $request->session()->put('backurl', redirect()->back()->getTargetUrl());
        }

        $obj_info = $this->obj_info;

        $default = $this->default();
        $provinces = $default['provinces'];
        $permission = $default['permission'];
        $input = null;

        #Retrieve Data#
        if (empty($id)) {
            $editid = $this->args['routeinfo']['id'];
        } else {
            $editid = $id;
        }

        if ($request->has($this->fprimarykey)) {
            $editid = $request->input($this->fprimarykey);
        }

        $input = $this->model
            ->where($this->fprimarykey, (int)$editid)
            ->whereRaw(where_not_trush())
            ->whereRaw(where_not_topadmin())
            ->get();
        //dd($input->toSql());
        if ($input->isEmpty()) {
            $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'index']);
            return response()
                ->json(
                    [
                        "type" => "url",
                        'status' => false,
                        'route' => ['url' => redirect()->back()->getTargetUrl()],
                        "message" => 'Your edit is not affected',
                        "data" => ['id' => $editid]
                    ],
                    422
                );
        }


        $input = $input->toArray()[0];
        $x = [];
        foreach ($input as $key => $value) {
            $x[$key] = $value;
        }

        $input = $x;
        $input['formtype'] = str_replace("'", '', $input['formtype']);
        $input['formtype'] = explode(',', $input['formtype']);
        $input['userlevel'] = str_replace("'", '', $input['userlevel']);
        $input['userlevel'] = explode(',', $input['userlevel']);
        $input['formuse'] = str_replace("'", '', $input['formuse']);
        $input['formuse'] = explode(',', $input['formuse']);


        // dd($input);

        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'update', ''],
            [],
        );
        $cancel_route = redirect()->back()->getTargetUrl();
        $province_id = empty($input['province_id']) ? -1 : $input['province_id'];
        $districts = [];
        $where = [['trash', '<>', 'yes'], ['parent_id', '=', $province_id]];
        $location = Location::getlocation($this->dflang[0], $where)->get();
        $districts = $location->pluck('title', 'id')->toArray();
        $district_id = empty($input['district_id']) ? -1 : $input['district_id'];
        $communes = [];
        $where = [['trash', '<>', 'yes'], ['parent_id', '=', $district_id]];
        $location = Location::getlocation($this->dflang[0], $where)->get();
        $communes = $location->pluck('title', 'id')->toArray();
        //dd($input);
        return view('app.' . $this->obj_info['name'] . '.create', compact(['permission', 'provinces', 'districts', 'communes']))
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Edit',
                'isupdate' => true,
                'input' => $input,
            ]);
    } /*../end fun..*/

    public function update(Request $request)
    {
        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {
            $validator = $this->validator($request, true);
            // dd($validator);
            if ($validator->fails()) {

                $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            'route' => ['url' => $routing],
                            "message" => __('me.forminvalid'),
                            "data" => $validator->errors()
                        ],
                        422
                    );
            }

            $data = $this->setinfo($request, true);
            return $this->proceed_update($request, $data, $obj_info);
        } /*end if is post*/

        return response()
            ->json(
                [
                    "type" => "error",
                    "message" => __('me.forminvalid'),
                    "data" => []
                ],
                422
            );
    }/*../end fun..*/

    function proceed_update($request, $data, $obj_info)
    {

        $update_status = $this->model
            ->where($this->fprimarykey, $data['id'])
            ->update($data['tableData']);

        if ($update_status) {
            $savetype = strtolower($request->input('savetype'));
            $id = $data['id'];
            $rout_to = save_type_route($savetype, $obj_info, $id);
            $success_ms = __('ccms.suc_save');
            $callback = '';
            if (is_axios()) {
                $callback = $request->input('jscallback');
            }
            return response()
                ->json(
                    [
                        "type" => "success",
                        "status" => $update_status,
                        "message" => $success_ms,
                        "route" => $rout_to,
                        "callback" => $callback,
                        "data" => [
                            $this->fprimarykey => $data['id'],
                            'id' => $data['id']
                        ]
                    ],
                    200
                );
        }
        return response()
            ->json(
                [
                    "type" => "error",
                    'status' => false,
                    "message" => 'Your update is not affected',
                    "data" => []
                ],
                422
            );
    }
    /* end function*/

    public function totrash(Request $request, $id = 0)
    {
        $obj_info = $this->obj_info;
        #Retrieve Data#
        if (empty($id)) {
            $editid = $this->args['routeinfo']['id'];
        } else {
            $editid = $id;
        }

        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'index']);
        $trash = $this->model->where('id', $editid)->where('id', '<>', 1)->update(["trash" => "yes"]);

        if ($trash) {
            return response()
                ->json(
                    [
                        "type" => "url",
                        'status' => true,
                        'route' => ['url' => redirect()->back()->getTargetUrl()],
                        "message" => __('User remove'),
                        "data" => ['id' => $editid]
                    ],
                    200
                );
        }
        return response()
            ->json(
                [
                    "type" => "error",
                    'status' => false,
                    'route' => ['url' => redirect()->back()->getTargetUrl()],
                    "message" => 'Your update is not affected',
                    "data" => ['id' => $editid]
                ],
                422
            );
    }

    public function profile()
    {
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'phonenumber', ''],
            [],
        );
        $sumit_username = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'username', ''],
            [],
        );
        $sumit_password = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'changepassword', ''],
            [],
        );
        $cancel_route = redirect()->back()->getTargetUrl();

        // dd($this->args['userinfo']);

        return view('app.user.profile')->with([
            'obj_info'  => $this->obj_info,
            'route' => ['submit'  => $sumit_route, 'username' => $sumit_username, 'password' => $sumit_password, 'cancel' => $cancel_route],
            'form' => ['save_type' => 'save'],
            'fprimarykey'     => $this->fprimarykey,
            'caption' => 'Profile',


        ]);
    }
    public function validatorphone($request, $isupdate = false)
    {

        $rules['password'] = ['required'];
        $rules['new_phone_number'] = ['required', 'numeric'];

        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' =>  __('dev.required'),
            'numeric' => __('dev.number_only')
        ];

        return Validator::make($request->input(), $rules, $validatorMessages);
    }

    public function phonenumber(Request $request)
    {

        $validator = $this->validatorphone($request, false);
        if ($validator->fails()) {
            $routing = url_builder($this->obj_info['routing'], [$this->obj_info['name'], 'profile']);
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        'route' => ['url' => $routing],
                        "message" => __('ccms.fail_save'),
                        "data" => $validator->errors()
                    ],
                    422
                );
        }
        if (Hash::check($request->password, Auth()->user()->password)) {
            $userinfo = $this->args['userinfo'];
            // dd($userinfo);
            $update = $this->model->where('id', $userinfo['id'])->update(['email' => $request->input('new_phone_number')]);
            if ($update) {
                $routing = url_builder($this->obj_info['routing'], [$this->obj_info['name'], 'profile']);
                return response()
                    ->json(
                        [
                            "type" => "success",
                            "status" => true,
                            'route' => ['url' => $routing],
                            "message" => 'Success',
                            "data" => []
                        ],
                        200
                    );
            }
        } else {
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        "message" => __('dev.invalid_password'),
                    ],
                    422
                );
        }
    }
    public function validator_username($request, $isupdate = false)
    {

        $rules['password1'] = ['required'];
        $rules['username'] = ['required'];

        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' =>  __('dev.required'),
            // 'numeric' => __('dev.number_only')
        ];

        return Validator::make($request->input(), $rules, $validatorMessages);
    }
    public function username(Request $request)
    {
        $validator = $this->validator_username($request, false);
        if ($validator->fails()) {
            $routing = url_builder($this->obj_info['routing'], [$this->obj_info['name'], 'profile']);
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        'route' => ['url' => $routing],
                        "message" => __('ccms.fail_save'),
                        "data" => $validator->errors()
                    ],
                    422
                );
        }

        if (Hash::check($request->password1, Auth()->user()->password)) {

            $userinfo = $this->args['userinfo'];

            $update = $this->model->where('id', $userinfo['id'])->update(['name' => $request->input('username')]);
            if ($update) {
                return response()
                    ->json(
                        [
                            "type" => "success",
                            "status" => true,
                            'route' => ['url' => redirect()->back()->getTargetUrl()],
                            "message" => 'Success',
                            "data" => []
                        ],
                        200
                    );
            }
        } else {
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        "message" => __('dev.invalid_password'),
                    ],
                    422
                );
        }
    }
    public function validator_password($request, $isupdate = false)
    {
        $rules['password2'] = ['required', 'min:6', 'required_with:password_confirmation', 'same:password_confirmation'];
        $rules['current_password'] = ['required'];
        $rules['password_confirmation'] = ['required'];

        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' =>  __('dev.required'),
            'min:6' => __('dev.min6'),
            'required_with:password_confirmation' => __('dev.same_password'),
            'same:password_confirmation' => __('dev.same_password')
        ];

        return Validator::make($request->input(), $rules, $validatorMessages);
    }
    public function changepassword(Request $request)
    {
        // $validation = $request->validate(
        //     [
        //         'current_password' => 'required',
        //         'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        //         'password_confirmation' => 'min:6'
        //     ],
        //     ['required' => __('dev.required'),]
        // );

        $validator = $this->validator_password($request, false);
        if ($validator->fails()) {
            $routing = url_builder($this->obj_info['routing'], [$this->obj_info['name'], 'profile']);
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        'route' => ['url' => $routing],
                        "message" => __('ccms.fail_save'),
                        "data" => $validator->errors()
                    ],
                    422
                );
        }
        if (Hash::check($request->current_password, Auth()->user()->password)) {
            $userinfo = $this->args['userinfo'];
            $update = $this->model->where('id', $userinfo['id'])->update(['password' => Hash::make($request->input('password2'))]);
            if ($update) {
                return response()
                    ->json(
                        [
                            "type" => "success",
                            "status" => true,
                            'route' => ['url' => redirect()->back()->getTargetUrl()],
                            "message" => 'Success',
                            "data" => []
                        ],
                        200
                    );
            }
        } else {
            return response()
                ->json(
                    [
                        "type" => "validator",
                        'status' => false,
                        "message" => __('dev.invalid_password'),
                    ],
                    422
                );
        }
    }
}
