@include('layouts.app')
@extends('CreateRescon')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Resident Contact Information</div>
                    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Contact First Name:</td>
                <td><?php echo ($post['con_fname']); ?></td>
            </tr>
            <tr>
                <td>Contact Middle Name:</td>
                <td><?php echo ($post['con_mname']); ?></td>
            </tr>
            <tr>
                <td>Contact Last Name:</td>
                <td><?php echo ($post['con_lname']); ?></td>
            </tr>
            <tr>
                <td>Relationship:</td>
                <td><?php echo ($post['con_relationship']); ?></td>
            </tr>
            <tr>
                <td>Cellphone:</td>
                <td><?php echo ($post['con_cellphone']); ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo ($post['con_email']); ?></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td><?php echo ($post['con_comment']); ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?php echo ($post['con_gender']); ?></td>
            </tr>
            <tr>
                <td>Resident Name:</td>
                <td><?php echo ($resident_name); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop