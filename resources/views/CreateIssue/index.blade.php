@include('layouts.app')
@extends('CreateIssue')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>New Cassel Issue Information </h1>
    <a href="{{url('/issuetype/create')}}" class="btn btn-success">Create Issue</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Issue ID</th>
            <th>Issue Type Name</th>
            <th>Issue Description</th>
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
        @foreach ($createissue as $createissue)
            <tr>
                <td>{{ $createissue->id}}</td>
                <td>{{ $createissue->issue_typename}}</td>
                <td>{{ $createissue->issue_description}}</td>
                <td><a href="{{url('issuetype',$createissue->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{url('issuetype/update', $createissue->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['issuetype.destroy', $createissue->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection