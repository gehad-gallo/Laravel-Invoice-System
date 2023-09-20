<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;
use LaravelLocalization;

class DepartmentController extends Controller
{
   
    public function showData(){
    	
        $all_departments = Department::get();
        return view('admin.departments.index', compact('all_departments'));
    }


    public function insertNewDepartment(DepartmentRequest $request){

    	//validate data
    	//insert new department
	     //save offer into DB using AJAX

        $department = Department::create([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);

        if ($department){
            response()->json([
                'status' => true,
            ]); 
        	return redirect('departments')->with(['success' => 'Department added successfully']);
        }else{
            return response()->json([
                'status' => false,
            ]);}

	}

	public function delateDepartment(Request $request){

        $department = Department::find($request -> id);
	    if ($department != null) {
	        $department->delete();

	  //      response()->json([
    //        'status' => true,
    //    ]);
	//    return redirect('departments')->with(['success' => 'Department removed successfully']);
	    }

       
	}


	public function editDepartment($id){

		$department = Department::find($id);
		return view('admin.departments.edit',compact('department'));
	}


	public function saveEditDepartment(Request $request, $id){
 		
		$department = Department::findOrFail($id);
	    $department->name_en = $request['name_en'];
	    $department->name_ar = $request['name_ar'];
	    
	    $department->save();
        return redirect()->route('departments')->with(['success' => 'Department updated successfully!']);

	}
}
