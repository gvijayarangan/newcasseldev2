@include('layouts.app')
@extends('CreateSupply')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>New Cassel Supplies information page </h1>
    <a href="{{url('/Supply/create')}}" class="btn btn-success">Create Supply</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Supply_ID</th>
            <th>Supply Name</th>
            <th>Unit_Price</th>
            <th>Comments</th>
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

        @foreach ($createsupply as $createsupp)
            <tr>
                <td>{{ $createsupp->id}}</td>
                <td>{{ $createsupp->sup_name}}</td>
                <td>{{ $createsupp->sup_unitprice}}</td>
                <td>{{ $createsupp->sup_comment}}</td>
                <td><a href="{{url('Supply',$createsupp->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{url('Supply/update', $createsupp->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['Supply.destroy', $createsupp->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection