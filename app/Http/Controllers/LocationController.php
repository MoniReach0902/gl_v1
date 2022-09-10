<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Models\Location;


class LocationController extends Controller
{
    //
    private $obj_info = ['name' => 'location', 'routing' => 'admin.controller', 'title' => 'Location', 'icon' => '<i class="fas fa-map-marker"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $fprimarykey = 'location_id';
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
        $this->obj_info['title'] = 'Location'; //__('label.lb09');
        $default_protectme = config('me.app.protectme');

        $this->protectme = [
            'display' => 'yes',
            'group' => [],
            'object' => [$this->obj_info['name']],
            'method'  => [
                'index' => $default_protectme['index'],
                // 'show' => $default_protectme['show'],
                // 'create' => $default_protectme['create'],
                // 'edit' => $default_protectme['edit'],
                // 'delete' => $default_protectme['delete'],
                // 'destroy' => $default_protectme['destroy'],
                // 'restore' => $default_protectme['restore'],
            ]
        ];

        $this->args = $args;
        $this->model = new Location;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();
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
            ->select(\DB::raw($this->fprimarykey . " AS id, JSON_UNQUOTE(JSON_EXTRACT(title, '$." . $this->dflang[0] . "')) AS title, type, shortname, prefix"));
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

        $import_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'import', ''
            ],
        );

        $importdistrict_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'import_district', ''
            ],
        );

        $importcommune_route = url_builder(
            $this->obj_info['routing'],
            [
                $this->obj_info['name'], 'import_commune', ''
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
                'route' => [
                    'create'  => $create_route,
                    'import' => $import_route,
                    'import_district' => $importdistrict_route,
                    'import_commune' => $importcommune_route,
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
    /* end function*/

    public function validator($request, $isupdate = false)
    {
        $update_rules = [$this->fprimarykey => 'required'];
        $numrecord = count($request->input($this->fprimarykey));
        for ($i = 0; $i < $numrecord - 1; $i++) {
            $rules[$this->fprimarykey . '.' . $i] = 'required|numeric|gt:0';
            //$rules['title-'.$this->dflang[0].'.'.$i]       = 'required|distinct|unique:'.$this->model->gettable().',title->'.$this->dflang[0];
            $rules['title-' . $this->dflang[0] . '.' . $i]       = 'required|distinct';
        }

        $validatorMessages = [
            /*'required' => 'The :attribute field can not be blank.'*/
            'required' => __('me.fieldreqire'),
            'unique' => 'The :attribute field can not be blank. :input :unique'
        ];

        if ($isupdate) {
            $rules = array_merge($rules, $update_rules);
        }
        return Validator::make($request->input(), $rules, $validatorMessages);
    }
    /* end function*/

    public function setinfo($request, $isupdate = false)
    {
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        $tableData = [];
        $numrecord = count($request->input($this->fprimarykey));
        for ($i = 0; $i < $numrecord; $i++) {
            /*For translate*/
            $title = [];
            $df_title;
            $first = true;
            foreach (config('me.app.project_lang') as $lang) {
                $input_title = $request->input('title-' . $lang[0])[$i];
                if ($first) {
                    $df_title = $input_title;
                } else {
                    if (empty($input_title)) {
                        $input_title = $df_title;
                    }
                }
                $title[$lang[0]] = $input_title;

                $first = false;
            }

            $record = [
                $this->fprimarykey => !empty($request->input($this->fprimarykey)[$i]) ? $request->input($this->fprimarykey)[$i] : $newid + $i,
                'parent_id' => !empty($request->input('parent_id')[$i]) ? $request->input('parent_id')[$i] : 0,
                'title'     => json_encode($title),
                'shortname' => !empty($request->input('shortname')[$i]) ? $request->input('shortname')[$i] : '',
                'type'      => !empty($request->input('type')[$i]) ? $request->input('type')[$i] : '',
                'prefix'    => !empty($request->input('prefix')[$i]) ? $request->input('prefix')[$i] : 0,
                'image'     => '',
                'display'   => 'yes',
                'tag'       => '',
                'trash'     => 'no',
                'ordering'  => 0,
                'ab_id'     => 0,
                'blongto'   => $this->args['userinfo']['id']

            ];

            array_push($tableData, $record);
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

        $import_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'loadimportdata', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.create')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'import' => $import_route,  'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Import',
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
            return \Redirect::to($routing)
                ->with('errors', __('ccms.rqnvalid'));
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
    }
    /* end function*/

    public function import()
    {
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'storeimport', ''],
            [],
        );

        $import_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'loadimportdata', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.importprovince')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'import' => $import_route,  'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Import',
                'definelevel' => $this->definelevel,
                'istrush' => false,
            ]);
    } /*../function..*/

    public function loadimportdata(Request $request, $type = 'province')
    {

        if ($request->isMethod('post')) {
            $obj_info = $this->obj_info;
            $validator = Validator::make($request->all(), [
                'file_import' => 'required|mimes:xls,xlsx,xlsm'
            ]);
            if ($validator->fails()) {
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            'route' => ['url' => ''],
                            "message" => __('me.forminvalid'),
                            "data" => $validator->errors()
                        ],
                        422
                    );
            }
            if ($type == 'province') {
                $data = $this->import_formbuilder($request);
            } elseif ($type == 'district') {
                $data = $this->importdistrict_formbuilder($request);
            } elseif ($type == 'commune') {
                $data = $this->importcommune_formbuilder($request);
            }

            $request = $data['request'];
            //Try validation here
            $validator = $this->validator($request);
            if ($validator->fails()) {
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            'route' => ['url' => ''],
                            "message" => __('me.forminvalid'),
                            "data" => $validator->errors()
                        ],
                        422
                    );
            }
            //



            return view('app.' . $this->obj_info['name'] . '.importlist')->with([
                'results' => $data['spreadsheet'],
                'args' => $this->args,
            ]);
        } /* end if POST*/
    }
    /* end function*/

    public function import_formbuilder($request)
    {

        $default = $this->default();

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($request->file('file_import'));
        $reader->setLoadSheetsOnly(["Province"]);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($request->file('file_import'));
        //$spreadsheet->getSheet(0);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $collectSheet = collect(array_values($sheetData));

        $collectSheet = $collectSheet->forget(0); // remmove first row
        $collectSheet = collect($collectSheet->values()->all()); // refill array key index
        $collectSheet = $collectSheet->where('C', '!=', null);


        #table data format
        $tableData = [];
        //////////////
        $subtableData = [];
        if ($collectSheet->count() > 0) {
            $location_id  = [];
            $parent_id = [];
            foreach (config('me.app.project_lang') as $lang) {
                ${'title-' . $lang[0]} = [];
            }
            $shortname = [];
            $type = [];
            $prefix = [];
            $image = [];
            $display = [];
            $tag = [];
            $trash = [];
            $ordering = [];
            $ab_id = [];

            foreach ($collectSheet as $key => $row) {

                $id = (int)$row['C'] ?? 0;
                $excel_title = ['en' => 'H', 'kh' => 'I'];
                if ($id > 0) {
                    array_push($location_id, $id);
                    array_push($parent_id, 0);
                    foreach (config('me.app.project_lang') as $lang) {
                        $define_title = !empty($row[$excel_title[$lang[0]]]) ? $row[$excel_title[$lang[0]]] : '';
                        array_push(${'title-' . $lang[0]}, $define_title);
                    }
                    array_push($shortname, !empty($row['M']) ? $row['M'] : '');
                    array_push($type, !empty($row['B']) ? $row['B'] : '');
                    array_push($prefix, !empty($row['G']) ? (int)$row['G'] : 0);
                } else {
                    unset($collectSheet[$key]);
                }
            }
            $request->request->add(
                [
                    'location_id' => $location_id,
                    'parent_id' => $parent_id,
                    'shortname' => $shortname,
                    'type' => $type,
                    'prefix' => $prefix,
                ]
            );


            foreach (config('me.app.project_lang') as $lang) {
                $request->request->add(
                    [
                        'title-' . $lang[0] => ${'title-' . $lang[0]}
                    ]
                );
            }
        }

        return [
            'request' => $request,
            'spreadsheet' => $collectSheet,
        ];
    }
    /* end function*/

    public function storeimport(Request $request, $type = 'province')
    {
        if ($request->isMethod('post')) {
            $obj_info = $this->obj_info;
            $validator = Validator::make($request->all(), [
                'file_import' => 'required|mimes:xls,xlsx,xlsm'
            ]);
            if ($validator->fails()) {
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            'route' => ['url' => ''],
                            "message" => __('me.forminvalid'),
                            "data" => $validator->errors()
                        ],
                        422
                    );
            }


            if ($type == 'province') {
                $data = $this->import_formbuilder($request);
            } elseif ($type == 'district') {
                $data = $this->importdistrict_formbuilder($request);
            } elseif ($type == 'commune') {
                $data = $this->importcommune_formbuilder($request);
            }
            $request = $data['request'];
            $data = $this->setinfo($request);
            return $this->proceed_store($request, $data, $obj_info);
        }

        /*end*/
    }
    /* end function*/

    /* for District */
    public function import_district()
    {
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'storeimport_district', ''],
            [],
        );

        $import_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'loadimportdata_district', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.importdistrict')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'import' => $import_route,  'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Import District',
                'definelevel' => $this->definelevel,
                'istrush' => false,
            ]);
    } /*../function..*/

    public function loadimportdata_district(Request $request)
    {
        return $this->loadimportdata($request, 'district');
    }

    public function storeimport_district(Request $request)
    {
        return $this->storeimport($request, 'district');
    }

    public function importdistrict_formbuilder($request)
    {

        $default = $this->default();

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($request->file('file_import'));
        $reader->setLoadSheetsOnly(["District"]);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($request->file('file_import'));
        //$spreadsheet->getSheet(0);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $collectSheet = collect(array_values($sheetData));

        $collectSheet = $collectSheet->forget(0); // remmove first row
        $collectSheet = collect($collectSheet->values()->all()); // refill array key index
        $collectSheet = $collectSheet->where('G', '!=', null);


        #table data format
        $tableData = [];
        //////////////
        $subtableData = [];
        if ($collectSheet->count() > 0) {
            $location_id  = [];
            $parent_id = [];
            foreach (config('me.app.project_lang') as $lang) {
                ${'title-' . $lang[0]} = [];
            }
            $shortname = [];
            $type = [];
            $prefix = [];
            $image = [];
            $display = [];
            $tag = [];
            $trash = [];
            $ordering = [];
            $ab_id = [];

            foreach ($collectSheet as $key => $row) {
                $id = (int)$row['G'] ?? 0;
                $excel_parentid = (int)$row['A'] ?? 0;
                $excel_title = ['en' => 'H', 'kh' => 'I'];
                if ($id > 0) {
                    array_push($location_id, $id);
                    array_push($parent_id, $excel_parentid);
                    foreach (config('me.app.project_lang') as $lang) {
                        $define_title = !empty($row[$excel_title[$lang[0]]]) ? $row[$excel_title[$lang[0]]] : '';
                        array_push(${'title-' . $lang[0]}, $define_title);
                    }
                    array_push($shortname, '');
                    array_push($type, !empty($row['E']) ? $row['E'] : '');
                    array_push($prefix, !empty($row['F']) ? (int)$row['F'] : 0);

                    $row['M'] = '';
                    $row['G'] = $row['F'];
                    $collectSheet[$key] = $row;
                } else {
                    unset($collectSheet[$key]);
                }
            }
            $request->request->add(
                [
                    'location_id' => $location_id,
                    'parent_id' => $parent_id,
                    'shortname' => $shortname,
                    'type' => $type,
                    'prefix' => $prefix,
                ]
            );
            foreach (config('me.app.project_lang') as $lang) {
                $request->request->add(
                    [
                        'title-' . $lang[0] => ${'title-' . $lang[0]}
                    ]
                );
            }
        }

        return [
            'request' => $request,
            'spreadsheet' => $collectSheet,
        ];
    }
    /* end function*/

    /* for Commune */
    public function import_commune()
    {
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'storeimport_commune', ''],
            [],
        );

        $import_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'loadimportdata_commune', ''],
            [],
        );

        $cancel_route = redirect()->back()->getTargetUrl();
        return view('app.' . $this->obj_info['name'] . '.importcommune')
            ->with([
                'obj_info'  => $this->obj_info,
                'route' => ['submit'  => $sumit_route, 'import' => $import_route,  'cancel' => $cancel_route],
                'form' => ['save_type' => 'save'],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Import Commune',
                'definelevel' => $this->definelevel,
                'istrush' => false,
            ]);
    } /*../function..*/

    public function loadimportdata_commune(Request $request)
    {
        return $this->loadimportdata($request, 'commune');
    }

    public function storeimport_commune(Request $request)
    {
        return $this->storeimport($request, 'commune');
    }

    public function importcommune_formbuilder($request)
    {

        $default = $this->default();

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($request->file('file_import'));
        $reader->setLoadSheetsOnly(["Commune"]);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($request->file('file_import'));
        //$spreadsheet->getSheet(0);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $collectSheet = collect(array_values($sheetData));

        $collectSheet = $collectSheet->forget(0); // remmove first row
        $collectSheet = collect($collectSheet->values()->all()); // refill array key index
        $collectSheet = $collectSheet->where('G', '!=', null);


        #table data format
        $tableData = [];
        //////////////
        $subtableData = [];
        if ($collectSheet->count() > 0) {
            $location_id  = [];
            $parent_id = [];
            foreach (config('me.app.project_lang') as $lang) {
                ${'title-' . $lang[0]} = [];
            }
            $shortname = [];
            $type = [];
            $prefix = [];
            $image = [];
            $display = [];
            $tag = [];
            $trash = [];
            $ordering = [];
            $ab_id = [];

            foreach ($collectSheet as $key => $row) {
                $id = (int)$row['K'] ?? 0;
                $excel_parentid = (int)$row['E'] ?? 0;
                $excel_title = ['en' => 'L', 'kh' => 'M'];
                if ($id > 0) {
                    array_push($location_id, $id);
                    array_push($parent_id, $excel_parentid);
                    foreach (config('me.app.project_lang') as $lang) {
                        $define_title = !empty($row[$excel_title[$lang[0]]]) ? $row[$excel_title[$lang[0]]] : '';
                        array_push(${'title-' . $lang[0]}, $define_title);
                    }
                    array_push($shortname, '');
                    array_push($type, !empty($row['I']) ? $row['I'] : '');
                    array_push($prefix, !empty($row['J']) ? (int)$row['J'] : 0);
                    $row['H'] = $row['L'];
                    $row['M'] = '';
                    $row['G'] = $row['J'];
                    $collectSheet[$key] = $row;
                } else {
                    unset($collectSheet[$key]);
                }
            }
            $request->request->add(
                [
                    'location_id' => $location_id,
                    'parent_id' => $parent_id,
                    'shortname' => $shortname,
                    'type' => $type,
                    'prefix' => $prefix,
                ]
            );

            foreach (config('me.app.project_lang') as $lang) {
                $request->request->add(
                    [
                        'title-' . $lang[0] => ${'title-' . $lang[0]}
                    ]
                );
            }
        }

        return [
            'request' => $request,
            'spreadsheet' => $collectSheet,
        ];
    }
    /* end function*/

    public function byparent(Request $request)
    {
        $parent_id = (int)$request->input("parent_id") ?? -1;
        $parent_id = $parent_id == 0 ? -1 : $parent_id;
        /*location*/
        $provinces = [];
        $where = [['trash', '<>', 'yes'], ['parent_id', '=', $parent_id]];
        $location = $this->model->getlocation($this->dflang[0], $where)->get();
        $provinces = $location->toArray();
        return response()
            ->json(
                [
                    "callback" => $request->input("jscallback") ?? "",
                    'combo' => 'district',
                    "data" => $provinces
                ],
                200
            );
    }

    public function addlang()
    {
        /*
         ALTER TABLE `tbl_location` ADD `title_en` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title`, ADD `title_kh` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title_en`;
         */
        $results = $this->model->select('location_id', 'title')->get();
        foreach ($results as $record) {
            $title_json = json_decode($record->title);
            $update = $this->model->where('location_id', $record->location_id)->update([
                'title_en' =>  $title_json->en,
                'title_kh' =>  $title_json->kh,
            ]);
            //dd($title_json);
        }
    }
}
