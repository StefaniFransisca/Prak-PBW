<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\mahasiswa;

class MahasiswaAPIController extends Controller
{
    public function all(){
        $mahasiswa = mahasiswa::All();
        //return $mahasiswa;
        return response()->json([
            'success' => true,
            'message' => "Behasil Ditampilkan",
            'date' => today(),
            'data'    => $mahasiswa
        ], 200);
    }
    public function create(Request $request){
        $mahasiswa = mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender, 
            'jurusan' => $request->jurusan, 
            'bidang_minat' => $request->bidang_minat
        ]);
        if($mahasiswa)
        {
            return response()->json([
                'success' => true, 
                'message'=> 'Data Berhasil Disimpan'
            ],200);
        }
        else 
        {
            return response()->json([
                'success' => false,
                'message' =>'Data Gagal Digunkan'
            ],400);
        }
    }
    public function update($id, Request $request){
        $mahasiswa = mahasiswa::whereId($id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender, 
            'jurusan' => $request->jurusan, 
            'bidang_minat' => $request->bidang_minat
        ]);
        if ($mahasiswa)
        {
            return response()->json([
                'success' => true, 
                'message' => 'Data Berhasil Diubah',
            ],200);
        }
        else
        {
            return response()->json([
                'success' => false, 
                'message' => 'Data Gagal Diubah', 
            ],400);
        }
    }
    public function update2(Request $request){
        $mahasiswa = mahasiswa::whereId($request->id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender, 
            'jurusan' => $request->jurusan, 
            'bidang_minat' => $request->bidang_minat
        ]);
        if ($mahasiswa)
        {
            return response()->json([
                'success' => true, 
                'message' => 'Data Berhasil Diubah',
            ],200);
        }
        else
        {
            return response()->json([
                'success' => false, 
                'message' => 'Data Gagal Diubah', 
            ],400);
        }
    }
    public function delete($id){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();
        if ($mahasiswa)
        {
            return response()->json([
                'success' => true, 
                'message' => 'Data Berhasil Hapus',
            ],200);
        }
        else
        {
            return response()->json([
                'success' => false, 
                'message' => 'Data Gagal Dihapus', 
            ],400);
        }
    }
}
