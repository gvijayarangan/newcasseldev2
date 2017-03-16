@include('layouts.app')
@extends('CreateCntr')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/center/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Center</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Center Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">


                            {{Form::open(['action' =>'CenterController@search','method'=>'GET']) }}
                            {{Form::input('search','q',null,['placeholder'=>'Search'])}}
                            {{ Form::submit('Search', array('class' => 'btn')) }}
                            {{Form::close() }}

                            {{--    <h1>New Cassel Apartment Information </h1>
                                <a href="{{url('/apartment/create')}}" class="btn btn-success">Create Apartment</a>--}}

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="bg-info">
                                    <th>Center Name</th>
                                    <th>Center Address1</th>
                                    <th>Center Address2</th>
                                    <th>Center City</th>
                                    <th>Center State</th>
                                    <th>Center Zip</th>
                                    <th>Center Phone</th>
                                    <th>Center Fax</th>


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
                                @foreach ($createcntrs as $createcntr)
                                    <tr>
                                        <td>{{ $createcntr->cntr_name}}</td>
                                        <td>{{ $createcntr->cntr_add1}}</td>
                                        <td>{{ $createcntr->cntr_add2}}</td>
                                        <td>{{ $createcntr->cntr_city}}</td>
                                        <td>{{ $createcntr->cntr_state}}</td>
                                        <td>{{ $createcntr->cntr_zip}}</td>
                                        <td>{{ $createcntr->cntr_phone}}</td>
                                        <td>{{ $createcntr->cntr_fax}}</td>

                                        <td><a href="{{url('center',$createcntr->id)}}" class="btn btn-primary">View</a></td>
                                        <td><a href="{{url('center/update', $createcntr->id)}}" class="btn btn-warning">Modify</a></td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['center.destroy', $createcntr->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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