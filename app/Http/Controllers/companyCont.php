<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class companyCont extends Controller
{
    //
    public function createcompany(Request $request){
        $this->validate($request,[
            'name'=>'required|max:120',
            'email'=>'email',
            'logo'=>'image',
            
        ]);
        if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumnnail.'.$imageExt;
            $request->file('image')->storeAs('thumbnails/',$imageName);
        }
        $company = new Company ();
        $company->name=$request->input('name');
        $company->email=$request->input('email');
        $company->logo = $imageName;
        $company->website=$request->input('website');
        $company->save();
        return redirect('home');
    }
    
    public function deletecompany($id){
       $company = Company::findOrFail($id);
       $company->delete();
        return redirect('home');
    }
        public function updatepage($id){
       $company = Company::findOrFail($id);
       
        return view('updatecompany')->with('company',$company);
    }
    
    public function updatecompany(Request $request,$id){
       
       $this->validate($request,[
            'name'=>'required|max:120',
            'email'=>'email',
            'logo'=>'image',
            
        ]);
        $company = Company::findOrFail($id);
       if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumnnail.'.$imageExt;
            $request->file('image')->storeAs('thumbnails/',$imageName);
        }
        $company->name=$request->input('name');
        $company->email=$request->input('email');
        $company->logo = $imageName;
        $company->website=$request->input('website');
        $company->update();
        return redirect('home');
    }
}
