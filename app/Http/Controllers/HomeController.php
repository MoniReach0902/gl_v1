<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Form4;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $obj_info = ['name' => 'home', 'title' => 'Add Stock', 'icon' => '<i class="fa fa-home" style="color: green" aria-hidden="true"></i>'];
    private $args;
    private $request;

    private $model;
    private $submodel;
    private $tablename;
    private $fprimarykey = '';
    private $protectme = null;

    private $dflang;
    private $rcdperpage = -1; #record per page, set negetive to get all record#
    private $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $args = [])
    {
        //$this->middleware('auth');
        $this->obj_info['title'] = ''; //__('label.lb09');
        $default_protectme = config('me.app.protectme');
        // $this->protectme = [
        //     'display' => 'no',
        //     'object' => [$this->obj_info['name']],
        //     'method'  => [
        //         'index' => $default_protectme['index'],
        //         'show' => $default_protectme['show'],
        //         'create' => $default_protectme['create'],
        //         'edit' => $default_protectme['edit'],
        //         'delete' => $default_protectme['delete'],
        //         'destroy' => $default_protectme['destroy'],
        //         'restore' => $default_protectme['restore'],
        //     ]
        // ];
        $this->args = $args;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return \Redirect::to('/test/index');
        return view('home')
            ->with([

                'obj_info'  => $this->obj_info,
            ]);
    }

    public function indexmobile()
    {

        // aaa
        $x = filterCondition1('ncdd_form4', ["formtype", "formuse", "userlevel", "province", "district", "commune"], $this->args['userinfo']);

        $form4 = Form4::select(
            DB::raw("(IFNull(confirmed,'Total')) AS confirmed"),
            DB::raw("count(form4_id) as count"),
        )

            ->whereRaw($x)
            ->groupBy('confirmed')
            ->get();

        $form4_count = 0;
        $form4_confirmed = 0;
        $form4_pending = 0;
        if ($form4->isNotEmpty()) {

            foreach ($form4 as $record) {
                $form4_count += $record->count;
                if ($record->confirmed == 'yes') {
                    $form4_confirmed += $record->count;
                }
            }
        }
        $form4_pending = $form4_count - $form4_confirmed;


        return response()->json(
            [
                'navigation' =>
                [
                    ['name' => 'តារាងទី៤', 'title' => 'ការពន្យល់អំពីដំណើរការវាយតម្លៃភាពត្រៀមរួច ជាស្រេចរបស់រដ្ឋបាលឃុំ សង្កាត់', 'route' => '/Form4', 'count' => $form4_count, 'pending' => $form4_pending],
                    // ['name'=> 'តារាងទី១០', 'title'=>'ការពន្យល់អំពីដំណើរការវាយតម្លៃរដ្ឋបាលឃុំ សង្កាត់ជាប្រចាំ', 'route' => '/Form10', 'count'=>3, 'pending' =>1],
                    // ['name'=> 'តារាងទី១៥', 'title'=>'ការពន្យល់អំពីដំណើរការវាយតម្លៃភាពត្រៀមរួចជាស្រេចរបស់រដ្ឋបាលក្រុង ស្រុក', 'route' => '/Form15', 'count'=>1, 'pending' =>1],
                    // ['name'=> 'តារាងទី១៩', 'title'=>'ការពន្យល់អំពីដំណើរការវាយតម្លៃភាពត្រៀមរួចជាស្រេចរបស់រដ្ឋបាលក្រុង ស្រុក', 'route' => '/Form1៩', 'count'=>1, 'pending' =>1],
                ]
            ]
        );
    }
}
