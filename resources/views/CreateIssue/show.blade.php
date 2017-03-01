@include('layouts.app')
@extends('CreateIssue')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h3>New Cassel Retirement Center Issue Information </h3>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Issue ID:</td>
                <td><?php echo ($post['id']); ?></td>
            </tr>
            <tr>
                <td>Issue Type Name:</td>
                <td><?php echo ($post['issue_typename']); ?></td>
            </tr>
            <tr>
<<<<<<< HEAD
                <td>Issue Comments:</td>
=======
                <td>Issue Description:</td>
>>>>>>> origin/master
                <td><?php echo ($post['issue_description']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>

@stop