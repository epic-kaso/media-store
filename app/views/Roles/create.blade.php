@extends('layouts.application')
@section('main-content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {{ Form::open(['route'=>'roles.store']) }}
            <!-- role.name text field -->

            <div class="form-group">
                    {{ Form::label('role_name','Role Name: ') }}
                     @if($errors->has('role_name'))
                        {{ $errors->first('role_name','<span class="simple_error">:message</span>') }}
                    @endif
                    {{ Form::text('role_name',null,['class'=>'form-control','placeholder'=>'Role Name goes here']) }}
            </div>

            <!-- role.description text field -->

            <div class="form-group">
                    {{ Form::label('role_description','Role Description: ') }}
                    @if($errors->has('role_description'))
                      {{ $errors->first('role_description','<span class="simple_error">:message</span>') }}
                    @endif
                    {{ Form::text('role_description',null,['class'=>'form-control','placeholder'=>'Role Description goes here']) }}
            </div>

            <input class="btn btn-primary" type="submit" value="Create"/>
            {{ Form::close() }}
        </div>
    </div>
@stop