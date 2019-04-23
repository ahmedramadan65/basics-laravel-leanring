@extends('layouts.app')
@section('content')
@include('layouts.feedback')
<form action="{{route('update.company',['id'=>$company->id])}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-row">
    <div class="form-group">
      <label for="inputName">Company Name</label>
      <input type="name" class="form-control" name="name" id="inputName" placeholder="Company Name" 
             value="{{$company->name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email"
             value="{{$company->email}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputLogo">Company Logo</label>
      <input type="file" class="form-control" id="inputLogo" name="image" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputwebsite">Company Website</label>
    <input type="text" class="form-control" name="website" id="inputwebsite" placeholder="Company Website"
           value="{{$company->website}}">
  </div>
    <button type="submit" name="addcompany" class="btn btn-primary">Update Company</button>
</form>

@endsection
