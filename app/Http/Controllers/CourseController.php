<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Course::where('nama','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.course.list',compact('collection'));
        }
        return view('pages.course.main');
    }
    public function create()
    {
        return view('pages.course.input',['data' => new Course]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }
        }
        $data = new Course;
        $data->nama = $request->nama;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Kuliah tersimpan',
        ]);
    }
    public function show(Course $course)
    {
        //
    }
    public function edit(Course $course)
    {
        return view('pages.course.input',['data' => $course]);
    }
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }
        }
        $course->nama = $request->nama;
        $course->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Kuliah diperbarui',
        ]);
    }
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Kuliah terhapus',
        ]);
    }
}
