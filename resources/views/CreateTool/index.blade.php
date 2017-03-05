@include('layouts.app')
@extends('CreateTool')
@section('content')

    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/tool/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Tools</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Tools Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">

            <th>Tool Name</th>

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
        @foreach ($createtool as $createtool)
            <tr>

                <td>{{ $createtool->tool_name}}</td>
                {{--<td>{{ $createtool->tool_comment}}</td>--}}
                <td><a href="{{url('tool',$createtool->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{url('tool/update', $createtool->id)}}" class="btn btn-warning">Modify</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['tool.destroy', $createtool->id],'onsubmit' => 'return ConfirmDelete()']) !!}
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