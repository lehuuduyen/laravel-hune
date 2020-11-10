<?php
   
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

   
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
   
    // use AuthenticatesUsers;
   
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        // remove session
        $request->session()->flush();
        $request->session()->forget('key_login');
        return redirect('login');
    }
   
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback(Request $request)
    {
        try {
  
            $user = Socialite::driver('google')->user();
            // only allow people with @company.com to login
            // if(explode("@", $user->email)[1] !== 'company.com'){
            //     return redirect()->to('/');
            // }

            $existingUser = DB::connection('sqlsrvUser')->table('admins')
                ->where('email', '=', $user->email)
                ->first();
            if ($existingUser && $existingUser->status == 1) {
                $request->session()->put('key_login', $existingUser);
                return redirect('');
            } else {
                return redirect('login');
            }
  
        } catch (Exception $e) {
            dd($e);
            return redirect('login');
        }
    }
}