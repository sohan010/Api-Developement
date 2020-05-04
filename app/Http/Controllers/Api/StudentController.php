<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use Hash;
use DB;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::all();
        return $student;

        // $data = DB::table('students')->get();
        // return response()->json($data);
    }

    public function store(Request $request)
    {
         $this->validate($request,[
        'class_id'=>'required',
        'section_id'=>'required',
        'name'=>'required|unique:students|max:30',
        'phone'=>'required|unique:students|max:11',
        'email'=>'required|unique:students|max:80',
        'address'=>'required|max:120',
        'gender'=>'required',
     ]);

         $data = $request->all();
         $data['password']=Hash::make($request->password);
         $create = Student::create($data);
         return "Insert Success";

    }

    public function show($id)
    {
        $data = Student::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
         $data = $request->all();
         $data['password']=Hash::make($request->password);
         $create = Student::where('id',$id)->update($data);
         return "Update Success";
    }

    public function destroy($id)
    {
         $data = Student::find($id);
         $img_path = $data->photo;
         unlink($img_path);
        
        $delete = Student::where('id',$id)->delete();
         return "Delete Success";


    }
    
}
