@include('layouts.app')
@extends('CreateComarea')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>Create Common Area/System</h1>
    <a href="{{url('/commonarea/create')}}" class="btn btn-success">Create Common Area/System</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Common Area/System Id</th>
            <th>Common Area/System Name</th>
            <th>Comments</th>
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
        @foreach ($createcomarea as $createcomarea)
            <tr>
                <td>{{ $createcomarea-> id }}</td>
                <td>{{ $createcomarea-> ca_name }}</td>
                <td>{{ $createcomarea-> ca_comments }}</td>
                <td>{{ $createcomarea-> cntr_id }}</td>
                <td><a href="{{url('commonarea',$createcomarea->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{url('commonarea/update',$createcomarea->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['commonarea.destroy', $createcomarea->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
