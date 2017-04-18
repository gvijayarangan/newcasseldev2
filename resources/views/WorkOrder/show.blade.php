@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Contact WorkOrder Information</div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr class="bg-info">
                            <tr>
                                <td>Work Order ID:</td>
                                <td><?php echo ($post['id']); ?></td>
                            </tr>
                            <tr>
                                <td>Requestor:</td>
                                <td><?php echo ($post['requestor_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Created Time:</td>
                                <td><?php echo ($post['order_date_created']); ?></td>
                            </tr>

                            <tr>
                                <td>Center Name:</td>
                                <td><?php echo ($post['cntr_id']); ?></td>
                            </tr>

                            <tr>
                                <td>Apartment Number:</td>
                                <td><?php echo ($post['apt_id']); ?></td>
                            </tr>
                            <tr>
                                <td>Common Area:</td>
                                <td><?php echo ($post['ca_id']); ?></td>
                            </tr>

                            <tr>
                                <td>Resident Name:</td>
                                <td><?php echo ($post['resident_id']); ?></td>
                            </tr>
                            <tr>
                                <td>Issue Type:</td>
                                <td><?php echo ($post['issue_type']); ?></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td><?php echo ($post['order_status']); ?></td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop