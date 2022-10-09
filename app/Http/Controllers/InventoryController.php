<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\Location;
use App\Models\Room;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    //
    private $obj_info = ['name' => 'inventory', 'routing' => 'admin.controller', 'title' => 'Inventory', 'icon' => '<i class="fas fa-plus"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $columns = [];
    private $fprimarykey = 'inventory_id ';
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
        $this->obj_info['title'] = 'Inventory';

        $default_protectme = config('me.app.protectme');
        $this->protectme = [
            'display' => 'yes',
            'group' => [],
            'object' => [$this->obj_info['name']],
            'method'  => [
                'index' => $default_protectme['index'],
                // 'show' => $default_protectme['show'],
                'create' => $default_protectme['create'],
                // 'edit' => $default_protectme['edit'],
                // 'delete' => $default_protectme['delete'],
                // 'destroy' => $default_protectme['destroy'],
                // 'restore' => $default_protectme['restore'],
            ]
        ];

        $this->args = $args;
        $this->model = new Inventory;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();
        // dd($this->tablename);c

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
        // $equipment = $this->model->where('trash', '<>', 'yes')->get();
        // // dd($example);
        // return ['equipment' => $equipment];
    } /*../function..*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $condition = [], $setting = [])
    {

        $default = $this->default();
        // $equipment = $default['equipment'];
        // dd($slider);


        $create_modal = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'modal', ''],
            [],
        );
        $submit = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'update_slide', ''],
            [],
        );
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
                'route' => [
                    'create'  => $create_route,
                    'trash' => $trash_route,
                    'create_modal' => $create_modal,
                    'submit' => $submit,
                ],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Active',
            ])
            ->with(['act' => 'index'])
            // ->with(['equipment' => $equipment])
            // ->with($setting)
        ;
    }

    public function validator($request, $isupdate = false)
    {
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $update_rules = [$this->fprimarykey => 'required'];

        $rules['example-title'] = ['required'];
        // $rules['img'] = ['required'];
        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' => 'តម្លៃមិនអាចទទេរ',
        ];

        return Validator::make($request->all(), $rules, $validatorMessages);
    }
    public function setinfo($request, $isupdate = false)
    {

        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $tableData = [];


        $tableData = [
            'equipment_id' => $newid,
            // 'title' => $request->input('example-title'),
            // 'product_name' => $request->input('product_name'),
            // 'price' => $request->input('price'),
            'name' => $request->input('name'),
            'create_date'  => date("Y-m-d"),
            'update_date'  => date("Y-m-d"),
            'blongto'   => $this->args['userinfo']['id'],
            'trash' => 'no',

        ];
        if ($isupdate) {
            $tableData = array_except($tableData, [$this->fprimarykey, 'password', 'trash']);
        }
        return ['tableData' => $tableData, $this->fprimarykey => $newid];
    }
    public function create()
    {
        $default = $this->default();
        // // $provinces = $default['provinces'];
        // $permission = $default['permission'];
        $districts = [];
        $communes = [];
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'store', ''],
            [],
        );
        $new = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'create', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.create')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'cancel' => $cancel_route, 'new' => $new],
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
                            "message" => __('ccms.fail_save'),
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
                    "message" => __('ccms.fail_save'),
                    "data" => []
                ],
                422
            );
    }
    /* end function*/
    function proceed_store($request, $data, $obj_info)
    {
        // dd($data['tableData']);
        $save_status = $this->model->insert($data['tableData']);
        // dd($save_status);
        if ($save_status) {
            // $request->file('img')->storeAs('slider', $data['tableData']['img']);
            $savetype = strtolower($request->input('savetype'));
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
                        "message" => 'Success',
                        "callback" => $callback,
                        "data" => []
                    ],
                    200
                );
            // redirect()->back();
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





    public function edit(Request $request, $id = 0)
    {

        #prepare for back to url after SAVE#
        if (!$request->session()->has('backurl')) {
            $request->session()->put('backurl', redirect()->back()->getTargetUrl());
        }

        $obj_info = $this->obj_info;

        $default = $this->default();

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




        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'update', ''],
            [],
        );
        $cancel_route = redirect()->back()->getTargetUrl();

        //dd($input);
        return view('app.' . $this->obj_info['name'] . '.create')
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
        // dd($data);

        $update_status = $this->model
            ->where($this->fprimarykey, $data['exmaple_id'])
            ->update($data['tableData']);

        if ($update_status) {
            $savetype = strtolower($request->input('savetype'));
            $id = $data['exmaple_id'];
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
                            $this->fprimarykey => $data['exmaple_id'],
                            'id' => $data['exmaple_id']
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

        // $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'index']);
        $trash = $this->model->where('exmaple_id', $editid)->update(["trash" => "yes"]);

        if ($trash) {
            return response()
                ->json(
                    [
                        "type" => "url",
                        'status' => true,
                        'route' => ['url' => redirect()->back()->getTargetUrl()],
                        "message" => __('Example remove'),
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
}
