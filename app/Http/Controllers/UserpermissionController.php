<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\UserPermission;

class UserpermissionController extends Controller
{
    //
    private $obj_info = ['name' => 'userpermission', 'routing' => 'admin.controller', 'title' => 'User Permission', 'icon' => '<i class="fas fa-users"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $fprimarykey = 'permission_id';
    private $protectme = null;

    public $dflang;
    private $rcdperpage = -1; #record per page, set zero to get all record# set -1 to use default
    private $users;

    private $definelevel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $args = [])
    {
        //$this->middleware('auth');
        $this->obj_info['title'] = 'User Permission'; //__('label.lb09');
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
                // 'delete' => $default_protectme['delete'],
                // 'destroy' => $default_protectme['destroy'],
                // 'restore' => $default_protectme['restore'],
            ]
        ];

        $this->args = $args;
        $this->model = new UserPermission;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();

        $controllers = [];

        foreach (glob(app_path() . '/Http/Controllers/*Controller.php') as $controller) {
            $classname = basename($controller, '.php');
            //echo $classname.'<br>';
            $classPath = 'App\Http\Controllers\\' . $classname;

            if ($classname != 'UserpermissionController') {
                $reflection = new \ReflectionClass($classPath);

                $props   = $reflection->getProperties();
                foreach ($props as $prop) {

                    if ($prop->getName() == 'protectme') {
                        //echo $classname.'<br>';
                        $getclass = new $classPath($args);
                        $class_info = $getclass->getters('obj_info');
                        $classname = $class_info['name'];
                        $getter_protectme = $getclass->getters('protectme');
                        $display = $getter_protectme['display'] ?? 'no';

                        if ($display == 'yes') {
                            $class_info['protectme'] = $getter_protectme;
                            if (!empty($classname))
                                $this->definelevel[$classname] = $class_info;
                        }
                    }
                }
            }
        }

        /*also add this Controller to Manage*/
        $classname = $this->obj_info['name'];
        $obj_info = $this->obj_info;
        $obj_info['protectme'] = $this->protectme;
        $this->definelevel[$classname] = $obj_info;
        ksort($this->definelevel, SORT_NATURAL);
        // 
        // dd($this->definelevel);

        // $routing=url_builder(
        //     $obj_info['routing'],
        //     [
        //         $obj_info['name'], 'edit',''
        //     ],
        //     ['foo=a','bar=b']
        // );
        // dd($routing);
        // result dd => http://127.0.0.1:8000/userpermission/edit?foo=a&bar=b
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
        return [];
    } /*../function..*/

    public function listingModel()
    {
        #DEFIND MODEL#
        return $this->model
            ->select(\DB::raw($this->fprimarykey . " AS id, title, levelsetting, level_status"))->whereRaw('trash <> "yes"');
    } /*../function..*/

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

        if ($request->has('txt')) {
            $qry = $request->input('txt');
            $results = $results->whereRaw("(lower(JSON_UNQUOTE(title)) like '%" . strtolower($qry) . "%' or tnote like '%" . strtolower($qry) . "%')");
            array_push($querystr, 'title=' . $qry);
            $appends = array_merge($appends, ['title' => $qry]);
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
            'perpage_query' => $perpage_query
        ];
    } /*../function..*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $condition = [], $setting = [])
    {
        $results = $this->listingmodel();
        $sfp = $this->sfp($request, $results);
        $definelevel = $this->definelevel;
        //dd($definelevel);
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

        return view('app.' . $this->obj_info['name'] . '.index')
            ->with([

                'obj_info'  => $this->obj_info,
                'definelevel' => $this->definelevel,
                'route' => ['create'  => $create_route, 'trash' => $trash_route],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Active',
            ])
            ->with(['act' => 'index'])
            ->with($sfp)
            ->with($setting);
    }

    public function trash(Request $request, $condition = [], $setting = [])
    {

        $results = $this->listingmodel();
        $sfp = $this->sfp($request, $results);
        $definelevel = $this->definelevel;
        //dd($definelevel);
        //return \Redirect::to('/test/index');
        $create_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'create', ''
            ],
        );

        $active_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], '', ''
            ],
        );

        return view('app.' . $this->obj_info['name'] . '.index')
            ->with([

                'obj_info'  => $this->obj_info,
                'definelevel' => $this->definelevel,
                'route' => ['create'  => $create_route, 'active' => $active_route],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Trash',
                'istrash' => true,
            ])
            ->with(['act' => 'index'])
            ->with($sfp)
            ->with($setting);
    }



    public function validator($request, $isupdate = false)
    {
        $update_rules = [$this->fprimarykey => 'required'];

        if ($isupdate) {
            $rules['title']      = 'required|unique:' . $this->tablename . ',title,' . $request->input($this->fprimarykey) . ',' . $this->fprimarykey;
        } else {
            $rules['title']      = 'required|distinct|unique:' . $this->tablename . ',title';
        }

        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' => __('me.fieldreqire'),
        ];

        if ($isupdate) {
            $rules = array_merge($rules, $update_rules);
        }
        return Validator::make($request->input(), $rules, $validatorMessages);
    }

    public function setinfo($request, $isupdate = false)
    {
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        if ($newid == 1) $newid = 2;
        $tableData = [];
        $levelsetting = !empty($request->input('levelsetting')) ? $request->input('levelsetting') : [];
        $tableData = [

            $this->fprimarykey => $newid,
            'title'     => !empty($request->input('title')) ? $request->input('title') : '',
            'levelsetting'    => json_encode($levelsetting),
            'level_status' =>  'yes',
            'level_type'  => '',
            'tag'       => '',
            'add_date'  => date("Y-m-d"),
            'trash'     => 'no',
            'blongto'   => $this->args['userinfo']['id']

        ];
        if ($isupdate) {
            $tableData = array_except($tableData, [$this->fprimarykey, 'add_date', 'blongto', 'trash']);
        }
        return ['tableData' => $tableData, 'id' => $newid];
    }

    public function create()
    {
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'store', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.create')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'New',
                'definelevel' => $this->definelevel,
                'istrush' => false,
            ]);
    } /*../function..*/

    public function store(Request $request)
    {

        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {
            $validator = $this->validator($request);
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

            $data = $this->setinfo($request);
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
            $id = $data['id'];
            $rout_to = save_type_route($savetype, $obj_info, $id);
            $success_ms = __('ccms.suc_save');
            $callback = 'formreset';
            if (is_axios()) {
                $callback = $request->input('jscallback');
            }
            return response()
                ->json(
                    [
                        "type" => "success",
                        "status" => $save_status,
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
        $definelevel = $this->definelevel;
        $input = null;

        #Retrieve Data#
        if (empty($id)) {
            $editid = $this->args['routeinfo']['id'];
        } else {
            $editid = $id;
        }

        if ($request->has('level_id')) {
            $editid = $request->input('level_id');
        }

        $input = $this->model->where($this->fprimarykey, (int)$editid)->where('trash', '<>', 'yes')->get();
        if ($input->isEmpty()) {
            $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'index']);
            return response()
                ->json(
                    [
                        "type" => "url",
                        'status' => true,
                        'route' => ['url' => redirect()->back()->getTargetUrl()],
                        "message" => __('ccms.suc_delete'),
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
        $x['levelsetting'] = json_decode($x['levelsetting'], true);
        $input = $x;

        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'update', ''],
            [],
        );
        $cancel_route = redirect()->back()->getTargetUrl();


        $active_permission = [];
        foreach ($input['levelsetting'] as $key => $val) {
            list($controller, $method) = explode('-', $val);
            $active_permission[$controller][] = $method;
        }

        return view('app.' . $this->obj_info['name'] . '.create')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Edit',
                'definelevel' => $this->definelevel,
                'istrush' => false,
                'input' => $input,
                'active_permission' => $active_permission
            ]);
    } /*../end fun..*/

    public function update(Request $request)
    {
        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {
            $validator = $this->validator($request, true);
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
        $trash = $this->model->where($this->fprimarykey, $editid)->where($this->fprimarykey, '<>', 1)->update(["trash" => "yes"]);

        return response()
            ->json(
                [
                    "type" => "url",
                    'status' => true,
                    'route' => ['url' => redirect()->back()->getTargetUrl()],
                    "message" => __('ccms.suc_delete'),
                    "data" => ['id' => $editid]
                ],
                422
            );



        // return \Redirect::to($routing)
        // ->with(
        //     [
        //         "type"=>"url", 
        //         'status' => false,
        //         'route'=>[ 'url' => redirect()->back()->getTargetUrl()],
        //         "message"=> __('ccms.suc_delete'), 
        //     ]
        // );
    }
}
