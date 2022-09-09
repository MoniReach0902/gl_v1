<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    private $model;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new User;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'province_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function setinfo($request, $isupdate = false)
    {
        $newid = $this->model->max('id') + 1;
        $tableData = [

            'id' => $newid,
            'name'     => !empty($request->input('email')) ? $request->input('email') : '',
            'email'    => !empty($request->input('phone')) ? $request->input('phone') : '',
            'fullname'  => !empty($request->input('email')) ? $request->input('email') : '',
            'password' =>  Hash::make($request->input('password')),
            'api_token'  => '',
            'permission_id' => 1,
            'province_id'  => !empty($request->input('province_id')) ? $request->input('province_id') : 0,
            'district_id'     => !empty($request->input('district_id')) ? $request->input('district_id') : 0,
            'commune_id'   => !empty($request->input('commune_id')) ? $request->input('commune_id') : 0,
            'userstatus' => 'yes',
            'trash' => 'no'

        ];
        return ['tableData' => $tableData, 'id' => $newid];
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $validator = $this->validator($request->input());
            // if ($validator->fails()) {
            //     return response()
            //         ->json(
            //             [
            //                 "type" => "validator",
            //                 'status' => false,
            //                 "message" => $validator->errors()->first(),
            //             ],
            //             422
            //         );
            // }

            $data = $this->setinfo($request);
            // return response()
            //     ->json(
            //         $data, 200);

            $save_status = $this->model->insert($data['tableData']);
            if ($save_status) {
                return response()
                    ->json(
                        [
                            "type" => "success",
                            "status" => true,
                            "message" => "Register successfully",
                        ],
                        200
                    );
            }
            return response()
                ->json(
                    [
                        "type" => "error",
                        'status' => false,
                        "message" => 'Register is false',
                        "data" => []
                    ],
                    422
                );
        }
    }
}
