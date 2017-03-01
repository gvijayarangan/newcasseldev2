@include('layouts.app')
@extends('CreateRescon')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>New Cassel Resident Contact Information </h1>
    <a href="{{url('/rescontact/create')}}" class="btn btn-success">Create Rescontact</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Contact ID</th>
            <th>Contact First Name</th>
            <th>Contact Middle Name</th>
            <th>Contact Last Name</th>
            <th>Relationship</th>
            <th>Cellphone</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Gender</th>
            <th>Resident Name</th>
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
        @foreach ($createrescons as $createrescon)
            <tr>
                <td>{{ $createrescon->id}}</td>
                <td>{{ $createrescon->con_fname}}</td>
                <td>{{ $createrescon->con_mname}}</td>
                <td>{{ $createrescon->con_lname}}</td>
                <td>{{ $createrescon->con_relationship}}</td>
                <td>{{ $createrescon->con_cellphone}}</td>
                <td>{{ $createrescon->con_email}}</td>
                <td>{{ $createrescon->con_comment}}</td>
                <td>{{ $createrescon->con_gender}}</td>
                <td>{{ $createrescon->con_res_id}}</td>
                <td><a href="{{url('rescontact',$createrescon->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{url('rescontact/update', $createrescon->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['rescontact.destroy', $createrescon->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection