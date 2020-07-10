<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/penduduk/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $message = [
            'nik.exists' => 'Anda Bukan Penduduk Desa Sumerta Kaja',
            'email.unique' =>'Email sudah terdaftar pada sistem',
        ];

        return Validator::make($data, [
            'nik' => ['required', 'exists:penduduk,NIK'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            return User::create([
                'NIK' => $data['nik'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'jabatan' => 'p',
                ]);
        // return redirect()->back();
        // try{
        //         User::create([
        //             'NIK' => $data['nik'],
        //             'username' => $data['username'],
        //             'email' => $data['email'],
        //             'password' => Hash::make($data['password']),
        //             'jabatan' => 'p']);

        //         return redirect('/register')->with('success','Berhasil');
        // }catch(\Exception $e){

        //     return redirect('/register')->with('error','Anda bukan Penduduk Desa Sumerta Kaja');
        // }

    }
}
