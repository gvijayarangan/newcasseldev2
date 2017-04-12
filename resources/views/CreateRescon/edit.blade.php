@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="edit-resident" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Back</button>
                        </form>
                    </div>
                    <div class="panel-heading text-center" > Update Resident Contact Information</div>
                    <div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($createrescontacts, ['method' => 'PATCH','route'=>['rescontact.update', $createrescontacts->id]]) !!}
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::label('con_fname', 'Contact First Name:') !!}
        {!! Form::text('con_fname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_mname', 'Contact Middle Name:') !!}
        {!! Form::text('con_mname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::label('con_lname', 'Contact Last Name:') !!}
        {!! Form::text('con_lname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::label('con_relationship', 'Relationship:') !!}
        {!! Form::text('con_relationship',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_cellphone', 'Cellphone:') !!}
        {!! Form::text('con_cellphone',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_email', 'Email:') !!}
        {!! Form::text('con_email',null,['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('con_comment', 'Comments:') !!}
            {!! Form::textarea('con_comment',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::Label('con_gender', 'Gender') !!}
        {{ Form::select('con_gender', [
            'Female' => 'Female',
            'Male' => 'Male'], old('con_gender'), ['class' => 'form-control']) }}
    </div>
  {{--  <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!!Form::label('con_res_id', 'Resident Name:') !!}
        {{ Form::select('con_res_id', $residentscon,'default', array('id' => 'residents', 'multiple'=>'multiple', 'style' =>'width:75%')) }}
    </div>--}}

        <div class="form-group">

            {!! Form::label('con_res_id', 'ResidentName:', ['class' => 'col-md-3 control-label']) !!}
            <div.panel-heading style="padding-left: 15px">
                {{ Form::select('con_res_id[]', $residentscon, $residentscon_existing,
                array('id' => 'residents', 'multiple'=>'multiple', 'style' =>'width:75%')) }}
            </div.panel-heading>
        </div>
    <div class="form-group">
        {!! Form::submit('Update Information', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $("#residents").select2({
            placeholder: "Please Select",
            tags: true
        })
    </script>
@stop