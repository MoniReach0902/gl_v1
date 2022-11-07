<?php

namespace App\Http\Controllers;

// use App\Models\Example;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class ComponentsController extends Controller
{
    //
    private $obj_info = ['name' => 'components', 'routing' => 'admin.controller', 'title' => 'Components', 'icon' => '<i class="fas fa-plus"></i>'];
    public $args;


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
        $this->obj_info['title'] =  'Components';

        $default_protectme = config('me.app.protectme');
        $this->protectme = [
            'display' => 'yes',
            'group' => [],
            'object' => [$this->obj_info['name']],
            'method'  => [
                'index' => $default_protectme['index'],
                // 'index' => $default_protectme['index'],
            ]
        ];

      
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('app.' . $this->obj_info['name'] . '.index')
           
            ->with(['act' => 'index'])
        ;
    }

    
  
}
