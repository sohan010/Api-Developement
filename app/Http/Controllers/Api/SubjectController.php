<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;

class SubjectController extends Controller
{

    public function index()
    {
        $data = Subject::all();
        return $data;
    }

    public function store(Request $request)
    {
        $this->validate($request,[

        'class_id'=>'required',
        'subject_name'=>'required|unique:subjects|max:30',
        'subject_code'=>'required|unique:subjects|max:20'
     ]);

        $subject = Subject::create($request->all());
        return response('Insert Success');
    }

    public function show($id)
    {
         $data = Subject::find($id);
            return $data;
    }


    public function update(Request $request, $id)
    {
         $data = $request->all();
         $subject = Subject::where('id',$id)->update($data);
         return response('Update Success');
    }

    public function destroy($id)
    {
        $data = Subject::where('id',$id)->delete();
         return ('Delete Success');
    }
}
