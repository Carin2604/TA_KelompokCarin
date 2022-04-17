<?php

namespace App\Http\Controllers;

use App\Models\Classes AS Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Kelas::where('ruang','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.kelas.list',compact('collection'));
        }
        return view('pages.kelas.main');
    }
    public function create()
    {
        return view('pages.kelas.input',['data' => new Kelas]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tingkatan' => 'required',
            'ruang' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tingkatan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tingkatan'),
                ]);
            }elseif ($errors->has('ruang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('ruang'),
                ]);
            }
        }
        $data = new Kelas;
        $data->tingkatan = $request->tingkatan;
        $data->ruang = $request->ruang;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas tersimpan',
        ]);
    }
    public function show(Kelas $Kelas)
    {
        //
    }
    public function edit(Kelas $Kelas)
    {
        return view('pages.kelas.input',['data' => $Kelas]);
    }
    public function update(Request $request, Kelas $Kelas)
    {
        $validator = Validator::make($request->all(), [
            'tingkatan' => 'required',
            'ruang' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tingkatan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tingkatan'),
                ]);
            }elseif ($errors->has('ruang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('ruang'),
                ]);
            }
        }
        $Kelas->tingkatan = $request->tingkatan;
        $Kelas->ruang = $request->ruang;
        $Kelas->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas diperbarui',
        ]);
    }
    public function destroy(Kelas $kelas)
    {
        dd($kelas);
        $kelas->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas terhapus',
        ]);
    }
}
