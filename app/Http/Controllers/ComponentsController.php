<?php

namespace App\Http\Controllers;

use App\Models\Colors;
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
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ComponentsController extends Controller
{
    //
    private $obj_info = ['name' => 'components', 'routing' => 'admin.controller', 'title' => 'Components', 'icon' => '<i class="fas fa-industry"></i>'];
    public $args;

    private $model;
    private $tablename;
    private $columns = [];

    public $dflang;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $args = [])
    {
        //$this->middleware('auth');
        // dd($args['userinfo']);
        $this->obj_info['title'] =  __('dev.product_color');

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
        // $this->model = new Colors;
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
/*../function..*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('app.' . $this->obj_info['name'] . '.index');
            
    }

}