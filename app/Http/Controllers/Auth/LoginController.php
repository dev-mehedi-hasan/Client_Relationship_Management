<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\SocialIdentity;

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
    protected $redirectTo;

    protected function redirectTo(){
        if (Auth::user()->user_type == '1' && Auth::user()->status == '1' && Auth::user()->is_approved == '1') {
            return redirect()->route('admin.dashboard');
        }
        elseif(Auth::user()->user_type == '2' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
            return redirect()->route('worker.dashboard');
        }
        elseif(Auth::user()->user_type == '3' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
            return redirect()->route('client.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $ValidData = User::where('email', $request->email)->first();
        $PasswordCheck = Hash::check($request->password, @$ValidData->password);
        if($PasswordCheck == false){
            $notification = array(
                'message'   =>  'Your email or password dose not match!',
                'alert-type'=>  'error'
            );
            return redirect()->back()->with($notification);
        }
        elseif($ValidData->is_approved == '0'){
            $notification = array(
                'message'   =>  'Be paticent. Your request is on process to approve',
                'alert-type'=>  'error'
            );
            return redirect()->back()->with($notification);
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('login');
        }

    }

      // Facebook Login
      public function facebookRedirectToProvider($provider)
      {
          return Socialite::driver($provider)->redirect();
      }

       // Facebook Login
      public function facebookHandleProviderCallback($provider)
      {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);

          // $user->token;
      }



      public function findOrCreateUser($providerUser, $provider)
      {
          $account = SocialIdentity::whereProviderName($provider)
                     ->whereProviderId($providerUser->getId())
                     ->first();

          if ($account) {
              return $account->user;
          } else {
              $user = User::whereEmail($providerUser->getEmail())->first();

              if (! $user) {
                  $user = User::create([
                      'email' => $providerUser->getEmail(),
                      'name'  => $providerUser->getName(),
                  ]);
              }

              $user->identities()->create([
                  'provider_id'   => $providerUser->getId(),
                  'provider_name' => $provider,
              ]);

              return $user;
          }
      }





       // Google Login
       public function googleRedirectToProvider($provider)
       {
           return Socialite::driver('google')->redirect();
       }

        // Google Login
       public function googleHandleProviderCallback($provider)
       {
           $user = Socialite::driver('google')->user();

           // $user->token;
       }











        // if(Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        // {
        //     if (Auth::user()->user_type == '1' && Auth::user()->status == '1' && Auth::user()->is_approved == '1') {
        //         return redirect()->route('admin.dashboard');
        //     }
        //     elseif(Auth::user()->user_type == '2' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
        //         return redirect()->route('worker.dashboard');
        //     }
        //     elseif(Auth::user()->user_type == '3' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
        //         return redirect()->route('client.dashboard');
        //     }
        // }else{
        //     return redirect()->route('login')
        //         ->with('error','Email-Address And Password Are Wrong.');
        // }

}
