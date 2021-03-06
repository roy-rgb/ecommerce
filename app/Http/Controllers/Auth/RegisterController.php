<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Division;
use App\Models\District;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use vendor\laravel\ui\auth-backend\RegistersUsers;

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
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();

        return view('auth.register', compact('districts','divisions'));    
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'division_id' => ['required'],
            'district_id' => ['required'],
            'phone_no' => ['required', 'numeric','min:11'],
            // 'street_address' =>['required' , 'max:100']

        ]);

        // return User::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'username' => $data['first_name'],

        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'division_id' => $data['division_id'],
        //     'district_id' => $data['district_id'],
        //     'phone_no' => $data['phone_no'],
        //     // 'street_address' => $data['street_address'],
        //     'ip_address' => request()->ip(),
          
           
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
     
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name,

            'email' => $request->email,
            'password' => Hash::make($request->password),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'ip_address' => request()->ip(),
            'remember_token' => Str::random(50),
            'status' => 0,

          
 
        ]);
       

        $user->notify(new VerifyRegistration($user));
        session()->flash('success','A confirmation email has sent to you.. Please check and confirm your email');
        return redirect('/');
   
    }
}
