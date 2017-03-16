@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Resident Information</div>
                    <div class="panel-body">
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
                <td><?php echo ($post['res_homephone']); ?></td>
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
                <td>Apartment Number:</td>
                <td><?php echo ($aprtment_name); ?></td>
            </tr>
            <tr>
                <td>Center Name:</td>
                <td><?php echo ($cntr_name); ?></td>
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
                </div>
            </div>
        </div>
    </div>
@stop
