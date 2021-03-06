<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

// use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Contracts\Auth\Registrar;
use App\Http\Requests\LoginRequest;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    public function __construct(Guard $auth) {
        $this->auth      = $auth;
        // $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(LoginRequest $request){
        $login = array(
            'username' => $request->username,
            'password' => $request->password,
            'level'    => 1
        );
        if($this->auth->attempt($login)){
            return redirect()->route('admin.product.list');
        }else{
            return redirect()->back();
        }
    }
}
