@extends('layouts.app')

@section('content')

    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/Supply/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Supply</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Supply Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">

                            {{Form::open(['action' =>'SupplyController@search','method'=>'GET']) }}
                            {{Form::input('search','q',null,['placeholder'=>'Search Supply Name'])}}
                            {{ Form::submit('Search', array('class' => 'btn')) }}
                            {{Form::close() }}

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">

            <th>Supply Name</th>
            <th>Unit_Price</th>

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

                <td>{{ $createsupp->sup_name}}</td>
                <td>$ {{ $createsupp->sup_unitprice}}</td>

                <td><a href="{{url('Supply',$createsupp->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{url('Supply/update', $createsupp->id)}}" class="btn btn-warning">Modify</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['Supply.destroy', $createsupp->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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