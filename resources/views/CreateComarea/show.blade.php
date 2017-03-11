@include('layouts.app')
@extends('CreateComarea')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Common Area Information</div>
                    <div class="panel-body">

        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Center Name</td>
                <td><?php echo ($post['cntr_id']); ?></td>
            </tr>
            <tr>
                <td>Common Area/System Name*</td>
                <td><?php echo ($post['ca_name']); ?></td>
            </tr>
            <tr>
                <td>Comments </td>
                <td><?php echo ($post['ca_comments']); ?></td>
            </tr>
            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop