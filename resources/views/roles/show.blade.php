@extends('layouts.app')

@section('content')
    {!! Form::model($role) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                <a href="{{ URL::route('roles.index') }}" class="btn btn-info"><i class="fa fa-btn fa-backward"></i>Back</a>
            </div>
            <div class="pull-right">
                <!-- to limit deletion of roles-->
                {{-- <form action="{{ url('roles/'.$role->id) }}" method="POST"  onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                     <button type="submit" id="delete-role-{{ $role->id }}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
                 </form>--}}
            </div>
            <div class="pull-right">
                <a href="{{ URL::route('roles.edit', ['id' => $role->id, 'method' => 'GET']) }}" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>Edit</a>
            </div>

            <div><h3>View Role: {{ $role->name }}</h3></div>
        </div>

        <!-- to limit showing of roles permissions  -->
        {{--@include ('roles.partial', ['CRUD_Action' => 'View'])--}}
        <h3 style="text-align: center; color: red">Action not permitted</h3>
    </div>
    {!! Form::close() !!}
@stop
