<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes AS Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
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
    public function show(Kelas $kelas)
    {
        //
    }
    public function edit(Kelas $kela)
    {
        return view('pages.kelas.input',['data' => $kela]);
    }
    public function update(Request $request, Kelas $kela)
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
        $kela->tingkatan = $request->tingkatan;
        $kela->ruang = $request->ruang;
        $kela->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas diperbarui',
        ]);
    }
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kelas terhapus',
        ]);
    }
}
