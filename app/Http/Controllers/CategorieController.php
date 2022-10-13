<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Example;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\Location;
use App\Models\Room;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    //
    private $obj_info = ['name' => 'categorie', 'routing' => 'admin.controller', 'title' => 'Categorie', 'icon' => '<i class="fa fa-tags"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $columns = [];
    private $fprimarykey = 'categorie_id';
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
        $this->obj_info['title'] =  'Categories';

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
        $this->model = new Categorie;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();
        // dd($this->tablename);

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
        $categorie = $this->model
            ->select(
                \DB::raw($this->tablename . ".* "),
                DB::raw("JSON_UNQUOTE(JSON_EXTRACT(" . $this->tablename . ".name,'$." . $this->dflang[0] . "')) AS text"),

            )
            ->whereRaw('trash <> "yes"')->get();
        return ['categorie' => $categorie];
    } /*../function..*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $condition = [], $setting = [])
    {

        $default = $this->default();
        $categorie = $default['categorie'];
         //dd('aaa');


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
            ->with(['categorie' => $categorie])
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
            'required' => 'abc123',
        ];

        return Validator::make($request->all(), $rules, $validatorMessages);
    }
    public function setinfo($request, $isupdate = false)
    {

        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $tableData = [];


        $tableData = [
            'categorie_id' => $newid,
            'name' => $request->input('categorie-title'),

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
    /* end function*/
    public function update_slide(Request $request)
    {


        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {


            $data = $this->setinfo_slide($request, true);
            dd($data);

            return $this->proceed_update_slide($request, $data, $obj_info);
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
    function proceed_update_slide($request, $data, $obj_info)
    {
        $value = $data['tableData'];

        for ($i = 0; $i < count($value); $i++) {
            if ($value[$i]['img_id'] < 1) {
                $update_status = $this->model->where($this->fprimarykey, (int)$value[$i]['img_id'] * -1)
                    ->update(['trash' => 'yes', 'img' => '']);
                // if (!empty($value[$i]['img_path'])) {
                //     unlink('public/sliders/' . $value[$i]['img_path']);
                // }
            }
        }
        if ($update_status) {
            $savetype = strtolower($request->input('savetype'));
            // $id = $data['id'];
            // $rout_to = save_type_route($savetype, $obj_info, $id);
            $success_ms = __('ccms.suc_save');
            return response()
                ->json(
                    [
                        "type" => "success",
                        "status" => $update_status,
                        "message" => $success_ms,
                        // "route" => $rout_to,
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
    public function setinfo_slide($request, $isupdate = false)
    {

        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $tableData = [];


        $count = count($request->img_id);
        // dd($request->img_id);
        for ($i = 0; $i < $count; $i++) {
            $record = [
                'img_id' => $request->input('img_id')[$i],
                'img_path' => $request->input('img_path')[$i],
            ];
            array_push($tableData, $record);
        }


        $img = $request->file('img');
        if (!empty($img)) {
            $img_name = hexdec(uniqid()) . '-' . $img->getClientOriginalName();
            $img->move('public/sliders', $img_name);
        } else {
            $img_name = '';
        }


        if ($isupdate) {
            $tableData = array_except($tableData, [$this->fprimarykey, 'password', 'trash']);
        }
        return ['tableData' => $tableData];
    }



    public function indexmobile(Request $request, $condition = [], $setting = [])
    {
        $default = $this->default();
        $slider = $default['img'];

        return response()->json(
            [

                // 'obj_info'  => $this->obj_info,
                // 'fprimarykey'     => $this->fprimarykey,
                // 'caption' => 'Active',
                'slider' => $slider,
                // 'setting' => $setting,

            ]
        );
    }
}
