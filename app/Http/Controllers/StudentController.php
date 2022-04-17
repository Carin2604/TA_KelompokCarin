<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Student::where('nama','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.student.list',compact('collection'));
        }
        return view('pages.student.main');
    }
    public function create()
    {
        return view('pages.student.input', ['data' => new Student]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tahun_masuk_sekolah' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nis'),
                ]);
            }elseif ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('tempat_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tempat_lahir'),
                ]);
            }elseif ($errors->has('tanggal_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_lahir'),
                ]);
            }elseif ($errors->has('jk')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jk'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('tahun_masuk_sekolah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun_masuk_sekolah'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $data = new Student;
        $data->nis = $request->nis;
        $data->nisn = $request->nisn;
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->tahun_masuk_sekolah = $request->tahun_masuk_sekolah;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->st = 'A';
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa tersimpan',
        ]);
    }
    public function show(Student $student)
    {
        //
    }
    public function edit(Student $student)
    {
        return view('pages.student.input', ['data' => $student]);
    }
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tahun_masuk_sekolah' => 'required',
            'username' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nis'),
                ]);
            }elseif ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('tempat_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tempat_lahir'),
                ]);
            }elseif ($errors->has('tanggal_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_lahir'),
                ]);
            }elseif ($errors->has('jk')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jk'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('tahun_masuk_sekolah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun_masuk_sekolah'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }
        }
        $student->nis = $request->nis;
        $student->nisn = $request->nisn;
        $student->nama = $request->nama;
        $student->tempat_lahir = $request->tempat_lahir;
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->jk = $request->jk;
        $student->agama = $request->agama;
        $student->alamat = $request->alamat;
        $student->tahun_masuk_sekolah = $request->tahun_masuk_sekolah;
        $student->username = $request->username;
        if($request->password){
            $student->password = Hash::make($request->password);
        }
        $student->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa diperbarui',
        ]);
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa terhapus',
        ]);
    }
}
