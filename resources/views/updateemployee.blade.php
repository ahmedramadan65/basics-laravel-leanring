@extends('layouts.app')
@section('content')
@include('layouts.feedback')
<form action="{{route('update.employee',['id'=>$employee->id])}}" method="post" >
    {{csrf_field()}}
    <div class="form-group">
      <label for="inputName">First Name</label>
      <input type="name" class="form-control" name="first_name" id="inputName" placeholder="First Name" 
             value="{{$employee->first_name}}">
    </div>
    <div class="form-group">
      <label for="inputName">Last Name</label>
      <input type="name" class="form-control" name="last_name" id="inputName" placeholder="Last Name" 
             value="{{$employee->last_name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email"
             value="{{$employee->email}}">
    
    </div>
    <div class="form-group">
      <label for="inputwebsite">Phone</label>
      <input type="text" class="form-control" name="phone" id="inputwebsite" placeholder="Phone Number"
             value="{{$employee->phone}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Company</label>
      <select id="inputState" class="form-control" name="company" >
            @foreach($companines as $company)
               <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach 
      </select>
    </div> 
    <button type="submit" name="updateemp" class="btn btn-primary">Update Emlpoyee Detials</button>
</form>

@endsection
