@include('layouts.app')
@extends('CreateApt')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/apartment/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Apartment</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Apartment Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">



                            {{--    <h1>New Cassel Apartment Information </h1>
                                <a href="{{url('/apartment/create')}}" class="btn btn-success">Create Apartment</a>--}}

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="bg-info">

                                    <th>Apartment Floor Number</th>
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
                                @foreach ($createapts as $createapt)
                                    <tr>

                                        <td>{{ $createapt->apt_floornumber}}</td>
                                        <td>{{ $createapt->apt_number}}</td>

                                        <td>{{ $createapt->centerName}}</td>
                                        <td><a href="{{url('apartment',$createapt->id)}}" class="btn btn-primary">View</a></td>
                                        <td><a href="{{url('apartment/update', $createapt->id)}}" class="btn btn-warning">Modify</a></td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['apartment.destroy', $createapt->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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