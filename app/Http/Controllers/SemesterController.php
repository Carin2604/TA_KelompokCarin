<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SemesterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Semester::where('tahun','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.semester.list',compact('collection'));
        }
        return view('pages.semester.main');
    }
    public function create()
    {
        return view('pages.semester.input', ['data' => new Semester]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'tahun' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('jenis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis'),
                ]);
            }elseif ($errors->has('tahun')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun'),
                ]);
            }elseif ($errors->has('awal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('awal'),
                ]);
            }elseif ($errors->has('akhir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('akhir'),
                ]);
            }
        }
        $data = new Semester;
        $data->jenis = $request->jenis;
        $data->tahun = $request->tahun;
        $data->start = $request->awal;
        $data->end = $request->akhir;
        // if(request()->file('thumbnail')){
        //     Storage::delete($data->thumbnail);
        //     $thumbnail = request()->file('thumbnail')->store("thumbnail");
        //     $data->thumbnail = $thumbnail;
        // }
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Semester tersimpan',
        ]);
    }
    public function show(Semester $semester)
    {
        //
    }
    public function edit(Semester $semester)
    {
        return view('pages.semester.input', ['data' => $semester]);
    }
    public function update(Request $request, Semester $semester)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'tahun' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('jenis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis'),
                ]);
            }elseif ($errors->has('tahun')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tahun'),
                ]);
            }elseif ($errors->has('awal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('awal'),
                ]);
            }elseif ($errors->has('akhir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('akhir'),
                ]);
            }
        }
        $semester->jenis = $request->jenis;
        $semester->tahun = $request->tahun;
        $semester->start = $request->awal;
        $semester->end = $request->akhir;
        // if(request()->file('thumbnail')){
        //     Storage::delete($semester->thumbnail);
        //     $thumbnail = request()->file('thumbnail')->store("thumbnail");
        //     $semester->thumbnail = $thumbnail;
        // }
        $semester->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Semester diperbarui',
        ]);
    }
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Semester terhapus',
        ]);
    }
}
