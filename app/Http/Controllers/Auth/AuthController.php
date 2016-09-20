<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
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

        $verifyToken = md5(uniqid());

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verify' => $verifyToken,
        ]);
    }

    public function authenticated($request, $user)
    {
        
        
        
        if($user->isAdmin){

            return redirect()->intended('/admin/dashboard');

        }
        //return redirect()->intended($this->redirectPath());
        return redirect()->intended('/');
    }

    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());


        $this->sendEmailVerification($user);

//        Auth::guard($this->getGuard())->login();

        return redirect('login')->with('linkToEmail','A verification link is  sent to your E-mail !');
    }

    public function sendEmailVerification(User $user)
    {

        Mail::send('emails.confirm', ['user'=>$user], function($m) use ($user) {

            $m->from('andranik-ayvazyan@mail.ru','Please confirm your account');

            $m->to($user->email,$user->name)->subject('verify link');

        });

    }


    public function confirmEmail ($token)
    {

       $user = User::where('verify',$token)->first();

       if($user) {
           $user->verify = null;
           $user->save();
           return redirect('login')->with('verified', 'You are verified!');
       } else{
           return abort(404);
       }

    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        $user = User::where('email', $credentials['email'])->first();

        if($user && $user->verify !== null){

            return redirect('login')->with('verify','You must visit the link is  sent to your E-mail account');

        }

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {

            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    
}