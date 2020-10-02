<?php

namespace App\Http\Controllers\Auth;

use App\Province;
use App\Region;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/usuario/mis-motos';

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
        $provinces = Province::all();

        $provinceId = request()->input(['provincia']);

        if ($provinceId) {
            $regions = Region::where('province_id', $provinceId)
                ->get();

            $provinceName = Province::where('id', $provinceId)
                ->first();
        }

        return view('auth.register', compact('provinces', 'regions', 'provinceName'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['phoneWsp'])){
            $wsp = 1;
        }else{
            $wsp = 0;
        }

        return $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'phoneWsp' => $wsp,
            'type' => 'User',
            'email' => $data['email'],
            'province_id' => $data['province'],
            'region_id' => $data['region'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
