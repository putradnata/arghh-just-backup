<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Penduduk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = DB::table('users')
                    ->join('penduduk','users.NIK','penduduk.NIK')
                    ->select(
                        'users.id',
                        'users.NIK',
                        'users.username',
                        'users.email as emailUser',
                        'penduduk.nama as namaPenduduk',
                    )
                    ->where('users.jabatan','o')
                    ->get();

        return view('operator/operator-list.index',[
            'users' => $user,
        ]);
    }

    public function createAdmin(){

        // $penduduk = Penduduk::where('statusPenduduk','A')
        //             ->get();

        //forget, my model not even relation lol, use QB instead
        $penduduk = DB::table('penduduk')
                        ->select(
                            'penduduk.NIK',
                            'penduduk.nama',
                        )
                        ->whereRaw('penduduk.NIK not in(select users.NIK from users)')
                        ->get();


        return view('operator/operator-list.form',[
            'penduduk' => $penduduk,
        ]);
    }

    public function storeAdmin(Request $request){

        $data = [
            'NIK' => $request->penduduk,
            'username' => $request->username,
            'password' => $request->kataSandi,
            'email' => $request->email,
        ];

        $message = [
            'username.required' => 'Username Wajib diisi',
            'password.required' => 'Password Wajib diisi',
            'username.max' => 'Username Maksimal 25 Karakter',
            'password.min' => 'Password Minimal 8 Karakter',
            'email' => 'Masukkan dengan Format Email yang benar',
            'email.unique' => 'Email Sudah Terdaftar',
        ];

        $validate = Validator::make($data,[
            'username' => ['required','max:25'],
            'password' => ['required','string','min:8'],
            'email' => ['email','unique:users,email'],
        ], $message);

        if($validate->fails()){
            return redirect()->route('operator-list.create')
                ->withErrors($validate)
                ->withInput();
        }else{
            $store = User::create([
                'NIK' => $request->penduduk,
                'username' => $request->username,
                'password' => Hash::make($request->kataSandi),
                'email' => $request->email,
                'jabatan' => 'o',
            ]);

            if($store){
                return redirect()->route('operator-list.index')->with('success','Data Operator Berhasil Ditambahkan');
            }else{
                return redirect()->route('operator-list.index')->with('error','Terjadi Kesalahan Saat Menyimpan Data');
            }

        }
    }
}
