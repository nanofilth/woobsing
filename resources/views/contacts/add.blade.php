@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Contact</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Contact    </div>

    <div class="panel-body">
                
        <form action="{{ url('/contacts'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                                <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{$model['first_name'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{$model['last_name'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-2">
                    <input type="number" name="phone" id="phone" class="form-control" value="{{$model['phone'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="email" class="form-control" value="{{$model['email'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" name="address" id="address" class="form-control" value="{{$model['address'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/contacts') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection