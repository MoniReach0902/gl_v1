<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Validator;
use App\Models\UserPermission;
use Carbon\Carbon;
use Image;

class MediaController extends Controller
{
    //
    private $obj_info = ['name' => 'media', 'routing' => 'admin.controller', 'title' => 'Media Center', 'icon' => '<i class="fas fa-users"></i>'];
    public $args;

    private $model;
    private $submodel;
    private $tablename;
    private $fprimarykey = 'media_id';
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
        $this->obj_info['title'] = 'Media'; //__('label.lb09');
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
        $this->model = new Media;
        $this->tablename = $this->model->gettable();
        $this->dflang = df_lang();

        $controllers = [];
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
            ->select(\DB::raw($this->fprimarykey . " AS id," . $this->tablename . '.*'))->whereRaw('trash <> "yes"');
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
        // dd($sfp);
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'store', ''],
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

                'route' => ['create'  => $create_route, 'trash' => $trash_route, 'submit' => $sumit_route],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Active',
            ])
            ->with(['act' => 'index'])
            ->with($sfp)
            ->with($setting);
    }
    public function create(Request $request, $condition = [], $setting = [])
    {
        $results = $this->listingmodel();
        $sfp = $this->sfp($request, $results);
        // dd($sfp);
        $sumit_route = url_builder(
            $this->obj_info['routing'],
            [$this->obj_info['name'], 'store', ''],
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

                'route' => ['create'  => $create_route, 'trash' => $trash_route, 'submit' => $sumit_route],
                'fprimarykey'     => $this->fprimarykey,
                'caption' => 'Active',
            ])
            ->with(['act' => 'index'])
            ->with($sfp)
            ->with($setting);
    }


    public function validator($request, $isupdate = false)
    {
        $max = true;
        if (!empty($request->file('images'))) {
            $count = count($request->file('images'));
            for ($i = 0; $i < $count; $i++) {
                $size = filesize($request->file('images')[$i]);
                // dd($size / 1024);
                if (($size / 1024) > 2048) {
                    $max = false;
                }
                // $rules[$request->file('images')[$i]] = 'required|minme:png.jpeg|max:2048';
            }
        }

        return $max;
    }

    public function setinfo($request, $isupdate = false)
    {
        // dd($this->args['userinfo']['id']);
        $newid = ($isupdate) ? $request->input($this->fprimarykey)  : $this->model->max($this->fprimarykey) + 1;
        if ($newid == 1) $newid = 2;
        $tableData = [];


        $images = $request->file('images');
        // dd($images[0]);
        if (!empty($images)) {
            foreach ($images as $key => $img) {
                $name = $img->getClientOriginalName();

                $record = [
                    'date' => Carbon::now(),
                    'status' => 'enable',
                    'trash' => 'no',
                    'blongto' => $this->args['userinfo']['id'],
                    'base_url' => '',
                    'extra' => '',
                    'media' =>  $name,
                ];
                array_push($tableData, $record);
            }
        }
        // $tableData = [

        //     $this->fprimarykey => $newid,

        //     'blongto'   => $this->args['userinfo']['id']

        // ];
        if ($isupdate) {
            $tableData = array_except($tableData, [$this->fprimarykey, 'add_date', 'blongto', 'trash']);
        }
        return ['tableData' => $tableData];
    }



    public function store(Request $request)
    {


        $obj_info = $this->obj_info;
        $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
        if ($request->isMethod('post')) {
            $validator = $this->validator($request);
            if (!$validator) {
                $routing = url_builder($obj_info['routing'], [$obj_info['name'], 'create']);
                return response()
                    ->json(
                        [
                            "type" => "validator",
                            'status' => false,
                            'route' => ['url' => $routing],
                            "message" => 'Error Max Size',
                            "data" => []
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
        $count = count($data['tableData']);
        // dd($count);
        $save_status = $this->model->insert($data['tableData']);
        if ($save_status) {
            for ($i = 0; $i < $count; $i++) {

<<<<<<< HEAD
                $request->file('images')[$i]->storeAs('media', $data['tableData'][$i]['media']);
=======
                $request->file('images')[$i]->storeAs('media', $data['tableData'][$i]['image_url']);
>>>>>>> origin/piseth
            }
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
                        "message" => $success_ms,

                        "callback" => $callback,
                        "data" => ['tableData' => $data['tableData']]
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
        $trash = $this->model->where($this->fprimarykey, $editid)->update(["trash" => "yes"]);

        if ($trash) {
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



        return \Redirect::to($routing)
            ->with(
                [
                    "type" => "url",
                    'status' => false,
                    'route' => ['url' => redirect()->back()->getTargetUrl()],
                    "message" => __('ccms.suc_delete'),
                ]
            );
    }
}