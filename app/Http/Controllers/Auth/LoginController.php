<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->username = $this->findUsername();
    }
    // public function findUsername()
    // {
    //     $login = request()->input('login');

    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    //     request()->merge([$fieldType => $login]);

    //     return $fieldType;
    // }

    // public function username()
    // {
    //     return $this->username;
    // }

    public function login()
    {
        $this->validate(request(), [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var(request()->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'name';

        request()->merge([
            $login_type => request()->input('login')
        ]);

        //$login_type => request()->input('login')
        $login = request()->input('login');
        if (\Auth::attempt(
            [
                'name' => function ($query) use ($login) {
                    $query->whereraw("(name=? or email=?)", [$login, $login]);
                    // ->orwhere('email', $login);
                },
                'password' => request()->input('password'),
                'userstatus' => function ($query) {
                    $query->where('userstatus', '<>', 'no')->where('trash', '<>', 'yes');
                }
            ]
        )) {
            return redirect()->intended($this->redirectPath());
        }
        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'Phone Or Password Invalids.....',
            ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
}
