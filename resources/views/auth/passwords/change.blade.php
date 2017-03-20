@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">

                        {{--@include('common.errors')--}}
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/change-password') }}">{!! csrf_field() !!}
                            <div style ='font:21px/34px Arial,tahoma,sans-serif;color:#ff0000'>Password have to be 8 digits and contains at least:</div>
                            <div style ='font:21px/34px Arial,tahoma,sans-serif;color:#ff0000'>*One Upper-case letter</div>
                            <div  style ='font:21px/34px Arial,tahoma,sans-serif;color:#ff0000'>*One Lower-case letter</div>
                            <div  style ='font:21px/34px Arial,tahoma,sans-serif;color:#ff0000'>*One Symbol</div>
                            <div  style ='font:21px/34px Arial,tahoma,sans-serif;color:#ff0000'>*One Number</div>
                                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Old Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="old_password">

                                   @if ($errors->has('old_password'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('old_password') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-save"></i>Save</button>
                                     @include('common.flash')
                                     @include('common.errors')
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         setTimeout( "$('.alert').hide();", 3000);
    </script>
@endsection
