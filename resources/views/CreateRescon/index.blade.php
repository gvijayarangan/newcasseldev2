@include('layouts.app')
@extends('CreateRescon')
@section('content')

    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/rescontact/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Resident Contact</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Resident Contact Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">

            <th>Contact First Name</th>
            <th>Contact Middle Name</th>
            <th>Contact Last Name</th>
            <th>Relationship</th>
            <th>Cellphone</th>
            <th>Email</th>

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

                <td>{{ $createrescon->con_fname}}</td>
                <td>{{ $createrescon->con_mname}}</td>
                <td>{{ $createrescon->con_lname}}</td>
                <td>{{ $createrescon->con_relationship}}</td>
                <td>{{ $createrescon->con_cellphone}}</td>
                <td>{{ $createrescon->con_email}}</td>

                <td>{{ $createrescon->con_gender}}</td>
                <td>{{ $createrescon->con_res_id}}</td>
                <td><a href="{{url('rescontact',$createrescon->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{url('rescontact/update', $createrescon->id)}}" class="btn btn-warning">Modify</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['rescontact.destroy', $createrescon->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection