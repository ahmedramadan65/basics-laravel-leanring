@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="jumbotron companies">
                        <h1 class="display-4">Companies</h1>
                        <a class="btn btn-primary btn-lg" href="/createcompany" role="button">Add Company</a>
                        @foreach($companies as $company)
                        <div style="display: inline">
                            <h3 class="display-4">{{$company->name}}</h3>
                            <p class="lead">{{$company->email}}</p>
                            <p class="lead">{{$company->website}}</p>
                            <div class="col-md-3">
                                <img src="{{asset('storage/thumbnails/' . $company->logo)}}" class="img-responsive"/>
                            </div>
                            <div style="margin-top: 20px;">
                                <a class="btn btn-primary btn-lg" href="{{route('delete.company',['id'=>$company->id])}}" role="button">Delete Company</a>
                                <a class="btn btn-primary btn-lg" href="{{route('update.page',['id'=>$company->id])}}" role="button">Edit Company</a>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                    <div class="jumbotron companies">
                        <h1 class="display-4">Employees</h1>
                        <a class="btn btn-primary btn-lg" href="/createemployee" role="button">Add Employee</a>
                        @foreach($employees as $employee)
                        <div style="display: inline">
                            <h3 class="display-4">{{$employee->first_name}}</h3>
                            <p class="lead">{{$employee->last_name}}</p>
                            <p class="lead">{{$employee->email}}</p>
                            <p class="lead">{{$employee->phone}}</p>
                            <p class="lead">{{$employee->company->name}}</p>
                            <div style="margin-top: 20px;">
                                <a class="btn btn-primary btn-lg" href="{{route('delete.employee',['id'=>$employee->id])}}" role="button">Delete Employee</a>
                                <a class="btn btn-primary btn-lg" href="{{route('update.pageemp',['id'=>$employee->id])}}" role="button">Edit Employee Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>                
        </div>
    </div>
</div>    
@endsection
