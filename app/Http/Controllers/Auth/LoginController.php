<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }


    protected function credentials(Request $request)
    {
       // return $request->only($this->username(), 'password');
        return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'0'];
    }

     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach($this->guard()->user()->role as $role){

            if($role->name == 'super_admin'){

                return redirect('sadmin/home');

            }elseif($role->name == 'admin'){

                return redirect('admin/home');

            }elseif($role->name == 'user'){

                return redirect('user/home');
                
            }elseif($role->name == 'employee'){

                return redirect('/login');
                
            }

        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /*public function redirectTo(){
        
        // User role
        $role = Auth::user()->role->name; 
        
        // Check user role
        switch ($role) {
            case 'super_admin':
                    return redirect('sadmin/home');
                break;
            case 'admin':
                    return redirect('/admin/home');
                break; 
            case 'user':
                return redirect('/user/home');
            break;
            default:
                    return redirect('/'); 
                break;
        }
    }*/

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
