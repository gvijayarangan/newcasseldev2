@include('layouts.app')
@extends('CreateRes')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>NCRC Resident Information </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Resident ID</td>
                <td><?php echo ($post['id']); ?></td>
            </tr>
            <tr>
                <td>PCCID</td>
                <td><?php echo ($post['res_pccid']); ?></td>
            </tr>
            <tr>
                <td>First Name </td>
                <td><?php echo ($post['res_fname']); ?></td>
            </tr>
            <tr>
                <td>Middle Name </td>
                <td><?php echo ($post['res_mname']); ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo ($post['res_lname']); ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo ($post['res_gender']); ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo ($post['res_Homephone']); ?></td>
            </tr>
            <tr>
                <td>Cellphone</td>
                <td><?php echo ($post['res_cellphone']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo ($post['res_email']); ?></td>
            </tr>
            <tr>
                <td>Comment</td>
                <td><?php echo ($post['res_comment']); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo ($post['res_status']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
