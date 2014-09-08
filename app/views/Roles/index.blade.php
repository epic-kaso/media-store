@extends('layouts.application')
@section('main-content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <table class="table">
                <thead>
                    <tr>
                        <td>Roles</td>
                        <td>Info</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    @if(isset($roles) && $roles->count() > 0)
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td><a
                                    class="btn btn-xs btn-danger"
                                    href="{{ URL::route('roles.destroy',['id'=>$role->id]) }}"
                                    data-method="delete" rel="nofollow" data-confirm="Are you sure?"
                                >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr><td colspan="2" class="text-center">No Data Available</td></tr>
                    @endif
                </tbody>
            </table>
            <a href="{{ URL::route('roles.create') }}" class="btn btn-sm btn-primary">Add Role</a>
        </div>
    </div>
@stop