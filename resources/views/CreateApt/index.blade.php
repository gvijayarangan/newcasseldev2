@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/apartment/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>Apartment Information</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($createapts) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">

                                    <thead>
                                    <tr>
                                        <th>Center Name</th>
                                        <th>Apartment Floor Number</th>
                                        <th>Apartment Number</th>
                                        <th style="width: 200px;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach ($createapts as $createapt)

                                        <tr>

                                            <td>{{ $createapt->centerName}}</td>
                                            <td>{{ $createapt->apt_floornumber}}</td>
                                            <td>{{ $createapt->apt_number}}</td>


                                            <td><a href="{{url('apartment',$createapt->id)}}" class="btn btn-primary">View</a>
                                                <a href="{{url('apartment/update', $createapt->id)}}"
                                                   class="btn btn-warning">Modify</a>
                                        {{--        <a href="{{url('apartment/destroy',$createapt->id)}}"onclick='return confirm("Are you sure?")'
                                                   class="btn btn-danger">Delete</a>--}}



                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No User Records found</h4></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

