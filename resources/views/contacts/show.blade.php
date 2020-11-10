@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Contact</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Contact    </div>

    <div class="panel-body">
                

        <form action="{{ url('/contacts') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="first_name" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-6">
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{$model['first_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-6">
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{$model['last_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" name="phone" id="phone" class="form-control" value="{{$model['phone'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" value="{{$model['email'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-6">
                <input type="text" name="address" id="address" class="form-control" value="{{$model['address'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/contacts') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection