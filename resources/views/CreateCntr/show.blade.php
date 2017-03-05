@include('layouts.app')
@extends('CreateCntr')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Center Information</div>
                    <div class="panel-body">


        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Center Name:</td>
                <td><?php echo ($post['cntr_name']); ?></td>
            </tr>
            <tr>
                <td>Center Address1:</td>
                <td><?php echo ($post['cntr_add1']); ?></td>
            </tr>
            <tr>
                <td>Center Address2:</td>
                <td><?php echo ($post['cntr_add2']); ?></td>
            </tr>

            <tr>
                <td>Center City:</td>
                <td><?php echo ($post['cntr_city']); ?></td>
            </tr>

            <tr>
                <td>Center State:</td>
                <td><?php echo ($post['cntr_state']); ?></td>
            </tr>
            <tr>
                <td>Center Zip:</td>
                <td><?php echo ($post['cntr_zip']); ?></td>
            </tr>

            <tr>
                <td>Center Phone:</td>
                <td><?php echo ($post['cntr_phone']); ?></td>
            </tr>
            <tr>
                <td>Center Fax:</td>
                <td><?php echo ($post['cntr_fax']); ?></td>
            </tr>
            <tr>
                <td>Center Comments:</td>
                <td><?php echo ($post['cntr_comments']); ?></td>
            </tr>



            </tbody>
        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop