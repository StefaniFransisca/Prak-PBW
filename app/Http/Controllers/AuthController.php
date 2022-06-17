<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user(){
        $user = user::paginate(5);
        return view('user',['user'=>$user]);
        //return $user;
    }
    public function formuliruser(){
        return view('formuliruser');
    }
    public function simpanuser(Request $request){
        $request->validate([
            'nik_user' => 'bail|required|unique:users|max:255',
            'nama_user' => 'required|max:255',
            'no_hp' => 'required|max:30',
            'password' => 'required|min:3'
        ]);
        $user = User::create([
            'nik_user' => $request->nik_user,
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'password' => md5($request->password)
        ]);
        return redirect('/user')->with('alert-warning', 'Berhasil disimpan');
    }
    public function edituser($id){
        $user = User::find($id);
        return view('edituser', ['user' =>$user]);
    }

    public function updateuser($id, Request $request){
        $request->validate([
            'nik_user' => 'bail|required|max:255',
            'nama_user' => 'required|max:255',
            'no_hp' => 'required|max:30',
            'password' => 'required|min:3'
        ]);
        $user = user::find($id);
        $user -> nik_user = $request -> nik_user;
        $user -> nama_user = $request -> nama_user;
        $user -> no_hp = $request -> no_hp;
        $user -> password = md5($request -> password);
        $user -> save();
        return redirect('/user')->with('alert-warning', 'Berhasil diubah');
    }
    public function hapususer($id){
        $user = user::find($id);
        $user -> delete();
        return redirect('/user')->with('alert-danger', 'Berhasil dihapus');
    }
    public function login(){
        return view('login');
    }
    public function ceklogin(Request $request){
        $user = User::where([
            'nik_user' => $request->nik_user,
            'password' => md5($request->password)])->first();
        if($user){
            Auth::login($user);
            return redirect('/home')->with('alert-primary', 'Anda Berhasil Login');
        }else{
            return redirect('/login');
        }
        // Auth::login($user);
        // if(Auth::attempt(['nik_user' => $request->nik_user, 'password' => md5($request->password)]))
        // {
        //     return redirect('/user');
        // }else{
        //     return redirect('/login');
        // }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('alert-primary', 'Berhasil Logout');
    }

    public function pencarian(Request $request){
        $cari = $request->cari;
        $user = user::where('nama_user', 'like', '%'.$cari.'%')->orWhere('nik_user', 'like', '%'.$cari.'%')->paginate();
        return view('user', ['user'=>$user]);
    }
}
