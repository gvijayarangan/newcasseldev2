@include('layouts.app')
@extends('WorkOrder')
@section('content')
<link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center" > WorkOrder History Information</div>
                <div class="panel-body">

                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr class="bg-info">
                        <tr>
                            <td>Work Order ID:</td>
                            <td><?php echo ($post['id']); ?></td>
                        </tr>
                        <tr>
                            <td>Created By:</td>
                            <td><?php echo ($post['requestor_name']); ?></td>
                        </tr>

                        <tr>
                            <td>Closed By:</td>
                            <td><?php echo ($post['updated_by']); ?></td>
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
                            <td>Center Name:</td>
                            <td><?php echo ($post['cntr_id']); ?></td>
                        </tr>

                        <tr>
                            <td>Status:</td>
                            <td><?php echo ($post['order_status']); ?></td>
                        </tr>
                        <tr>
                            <td>Closed Time:</td>
                            <td><?php echo ($post['updated_at']); ?></td>
                        </tr>




                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@stop