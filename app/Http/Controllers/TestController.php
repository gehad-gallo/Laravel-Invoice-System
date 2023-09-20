<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class TestController extends Controller
{

    public function showData(){
    	
    	//$all_departments = Department::get();
    //	return view('admin.departments', compact('all_departments'));
    }


    public function addDepartment(){
        $all_departments = Department::get();
        return view('admin.new_department', compact('all_departments'));
    }


    public function storeDepartment(Request $request){

       $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
       ]);
        Department::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);

        return redirect()->route('departments')->with('success', 'Department created successfully!');


    }


    public function editDepartment($id){

        $department = Department::select()->find($id);
        return view('admin.edit_department', compact('department'));

    }


    public function saveEditDepartment(Request $request,$id){

        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
       ]);

        $department = Department::select()->find($id);
        $department -> update($request->all());
        return redirect()->route('departments')->with(['success' => 'Department updated successfully!']);

    }


    public function deleteDepartment(Request $request){

        $department = Department::find($request -> id);
        $department -> delete();

        return response('Department deleted successfully');

    }


}
