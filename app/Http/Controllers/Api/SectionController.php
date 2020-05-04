<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Section;

class SectionController extends Controller
{
 
    public function index()
    {
        $data = Section::all();
        return $data;
    }


    public function store(Request $request)
    {
         $this->validate($request,[

        'class_id'=>'required',
        'section_name'=>'required|unique:sections|max:30',
     ]);

        $subject = Section::create($request->all());
        return 'Insert Success';
    }
    


    public function show($id)
    {
        $data = Section::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $subject = Section::where('id',$id)->update($data);
        return 'Update Success';
    }

    public function destroy($id)
    {
        $data = Section::find($id)->delete();
       return 'Delete Success';
    }
}
