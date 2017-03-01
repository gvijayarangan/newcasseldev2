@include('layouts.app')
@extends('CreateComarea')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>NCRC Common Area/System </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Common Area/System ID</td>
                <td><?php echo ($post['id']); ?></td>
            </tr>
            <tr>
                <td>Common Area/System Name*</td>
                <td><?php echo ($post['ca_name']); ?></td>
            </tr>
            <tr>
                <td>Comments </td>
                <td><?php echo ($post['ca_comments']); ?></td>
            </tr>
            <tr>
                <td>Center ID</td>
                <td><?php echo ($post['cntr_id']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
