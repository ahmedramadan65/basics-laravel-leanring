<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
class employeeCont extends Controller
{
    //
        public function createemployee(Request $request){
        $this->validate($request,[
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'email',
            'phone'=>'numeric|min:10',
            'company'=>'required' 
        ],
            ['company.required'=>'You have to choose your company' ]);
        
        $employee = new Employee ();
        $employee->first_name=$request->input('first_name');
        $employee->last_name=$request->input('last_name');
        $employee->email=$request->input('email');
        $employee->phone=$request->input('phone');
        $employee->company_id= $request->input('company');
        $employee->save();
        return redirect('home');
        
    }
    
    public function deleteemployee($id){
       $employee = Employee::findOrFail($id);
       $employee->delete();
        return redirect('home');
    }
    
    
    public function updatepage($id){
       $employee = Employee::findOrFail($id);
       $companines = Company::latest()->get();
       
        return view('updateemployee')->with('employee',$employee)->with('companines',$companines);
    }
    
    public function updateemployee(Request $request,$id){
       
       $this->validate($request,[
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'email',
            'phone'=>'numeric|min:10',
            'company'=>'required' 
        ],
            ['company.required'=>'You have to choose your company' ]);
       
        $employee = Employee::findOrFail($id);
       
        $employee->first_name=$request->input('first_name');
        $employee->last_name=$request->input('last_name');
        $employee->email=$request->input('email');
        $employee->phone=$request->input('phone');
        $employee->company_id= $request->input('company');
        $employee->update();
        return redirect('home');
    }
}
