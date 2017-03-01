@include('layouts.app')
@extends('CreateTool')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>New Cassel Tool Information </h1>
    <a href="{{url('/tool/create')}}" class="btn btn-success">Create Tool</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Tool ID</th>
            <th>Tool Name</th>
            <th>Tool Comments</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <script>
            function ConfirmDelete()
            {
                var x = confirm("Are you sure you want to delete? Click OK to continue");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
        @foreach ($createtool as $createtool)
            <tr>
                <td>{{ $createtool->id}}</td>
                <td>{{ $createtool->tool_name}}</td>
                <td>{{ $createtool->tool_comment}}</td>
                <td><a href="{{url('tool',$createtool->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{url('tool/update', $createtool->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['tool.destroy', $createtool->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection