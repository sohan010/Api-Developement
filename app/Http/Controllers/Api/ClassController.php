<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{

    public function index()
    {
        $data = DB::table('classes')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'class_name'=>'required|unique:classes|max:20'
       ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->insert($data);
        return response('Insert Success');
    }

    public function show($id)
    {
        $data = DB::table('classes')->where('id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
 
         $data = array();
         $data['class_name'] = $request->class_name;
         DB::table('classes')->where('id',$id)->update($data);
         return response('Update Success');
    }

    public function destroy($id)
    {
        $data = DB::table('classes')->where('id',$id)->delete();
        return response('Deleted');
    }
}
