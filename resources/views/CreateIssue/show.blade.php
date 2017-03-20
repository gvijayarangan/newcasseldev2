@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Issue Type Information</div>
                    <div class="panel-body">


        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Issue Type Name:</td>
                <td><?php echo ($post['issue_typename']); ?></td>
            </tr>
            <tr>
                <td>Issue Description:</td>

                <td><?php echo ($post['issue_description']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
                    </div>
                </div>
            </div>
        </div>


@stop