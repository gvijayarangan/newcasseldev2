@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="edit-resident" class="btn btn-primary"><i
                                        class="fa fa-btn fa-file-o"></i>Back
                            </button>
                        </form>
                    </div>
                    <div class="panel-heading text-center"> Update Resident Contact Information</div>
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

                            {!! Html::decode(Form::label('con_fname', '<span style="color: red;">*</span>Contact First Name:')) !!}
                            {!! Form::text('con_fname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('con_mname', 'Contact Middle Name:') !!}
                            {!! Form::text('con_mname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">

                            {!! Html::decode(Form::label('con_lname', '<span style="color: red;">*</span>Contact Last Name:')) !!}
                            {!! Form::text('con_lname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">

                            {!! Html::decode(Form::label('con_relationship', '<span style="color: red;">*</span>Relationship:')) !!}
                            {!! Form::text('con_relationship',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('con_cellphone', 'Cellphone:') !!}
                            {!! Form::text('con_cellphone',null,['id' => 'mobile','class'=>'form-control']) !!}
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

                            {!! Html::decode(Form::Label('con_gender', '<span style="color: red;">*</span>Gender:')) !!}
                            {{ Form::select('con_gender', [
                                'Female' => 'Female',
                                'Male' => 'Male'], old('con_gender'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">

                            {!! Html::decode(Form::label('con_res_id', '<span style="color: red;">*</span>ResidentName:', ['class' => 'col-md-3 control-label'])) !!}
                            <div style="padding-left: 15px">
                                {{ Form::select('con_res_id[]', $residentscon, $residentscon_existing,
                                array('id' => 'residents[]', 'multiple'=>'multiple', 'style' =>'width:75%')),['class'=>'col-md-4 form-control','required' => 'required']}}
                            </div>
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

        $(document).ready(function () {
            $('#mobile').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#mobile').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct phone number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });
    </script>
@stop