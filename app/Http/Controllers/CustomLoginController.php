<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class CustomLoginController extends Controller
{
	use AuthenticatesUsers;

    public function adminLogin(){
    	return view('admin.login.login');
    }


    public function employeeLogin(){
    	return view('employees.login');
    }


    public function checkAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);




        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

           	return redirect()->route('dashboard');
        }
        return back()->withInput($request->only('email'))->with('error', 'Email or password is wrong');;
    }


    public function gitLogout(){

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.login');
    }

    
    private function getGaurd()
    {
        return auth('admin');
    }





}
