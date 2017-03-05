@include('layouts.app')
@extends('CreateRes')
@section('content')

    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/resident/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Resident</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Resident Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>PCCID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Home Phone</th>
            <th>Cellphone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Apartment Number</th>
            <th>Center Name</th>
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
        @foreach ($createres as $createres)
            <tr>
                <td>{{ $createres-> res_pccid }}</td>
                <td>{{ $createres-> res_fname }}</td>
                <td>{{ $createres-> res_lname }}</td>
                <td>{{ $createres-> res_Homephone }}</td>
                <td>{{ $createres-> res_cellphone }}</td>
                <td>{{ $createres-> res_email }}</td>
                <td>{{ $createres-> res_status }}</td>
                <td>{{ $createres-> res_apt_id }}</td>
                <td>{{ $createres-> res_cntr_id }}</td>
                <td><a href="{{url('resident',$createres->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{url('resident/update',$createres->id)}}" class="btn btn-warning">Modify</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['resident.destroy', $createres->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
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
@endsection