@include('layouts.app')
@extends('CreateCntr')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h3>New Cassel Retirement Center Information </h3>

    <div class="container">
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

@stop