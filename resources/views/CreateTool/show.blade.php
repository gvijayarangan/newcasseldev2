@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="edit-resident" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Back</button>
                        </form>
                    </div>
                    <div class="panel-heading text-center" > Tools Information</div>
                    <div class="panel-body">


        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Tool Name:</td>
                <td><?php echo ($post['tool_name']); ?></td>
            </tr>
            <tr>
                <td>Tool Description:</td>
                <td><?php echo ($post['tool_comment']); ?></td>
            </tr>
            </tbody>
        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop