<div class="form-group">
    <label class="col-md-4 control-label">*Roles</label>
    <div class="col-md-4">
        {!! Form::select('rolelist[]', $list_role, null, ['placeholder' => 'Please select', 'id' => 'roles-select-id',
        'class' => 'form-control col-md-4 roles cds-select', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('res_con_id') ? ' has-error' : '' }}">
    @if($CRUD_Action == 'Create')
        {!! Form::label('res_con_id', '*Resident Contact:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('res_con_id', $res_con, null, ['placeholder' => 'Please select','id' => 'resident-con-id', 'class' => 'col-md-6 form-control']) !!}
            @else
                {!! Form::label('res_con_id', '*Resident Contact:', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::select('res_con_id',$res_con, old('res_con_id'), ['placeholder' => 'Please select','id' => 'resident-con-id', 'class' => 'col-md-6 form-control']) !!}

                    @endif
                    @if ($errors->has('res_con_id'))
                        <span class="help-block">
                <strong>{{ $errors->first('res_con_id') }}</strong>
            </span>
                    @endif
                </div>
        </div>

        <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
            {!! Form::label('f_name', '*First Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('f_name', null, ['id' => 'f_name','class' => 'col-md-6 form-control', 'required' => 'required']) !!}
                @if ($errors->has('f_name'))
                    <span class="help-block">
                <strong>{{ $errors->first('f_name') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('m_name') ? ' has-error' : '' }}">
            {!! Form::label('m_name', 'Middle Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('m_name', null, ['id' => 'm_name', 'class' => 'col-md-6 form-control']) !!}
                @if ($errors->has('m_name'))
                    <span class="help-block">
                <strong>{{ $errors->middle('m_name') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
            {!! Form::label('l_name', '*Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('l_name', null, ['id' => 'l_name', 'class' => 'col-md-6 form-control', 'required' => 'required']) !!}
                @if ($errors->has('l_name'))
                    <span class="help-block">
                <strong>{{ $errors->last('l_name') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            @if($CRUD_Action == 'Create')
                {!! Form::label('email', '*E-Mail Address:', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['id' => 'email_id','class' => 'col-md-6 form-control', 'required' => 'required']) !!}
                    @else
                        {!! Form::label('email', '*E-Mail Address:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('email', null, ['id' => 'email_id', 'class' => 'col-md-6 form-control', 'required' => 'required', 'readonly']) !!}
                            @endif

                            @if ($errors->has('email'))
                                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                            @endif
                        </div>
                </div>




                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    {!! Form::label('comment', 'Comment:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::textarea('comment', null, ['class' => 'col-md-6 form-control' ]) !!}
                        @if ($errors->has('comment'))
                            <span class="help-block">
                <strong>{{ $errors->first('comment') }}</strong>
            </span>
                        @endif
                    </div>
                </div>

                {{--
                <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                    {!! Form::label('cell', '*Cell Phone:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::text('cell', null, ['class' => 'col-md-4 form-control', 'required' => 'required']) !!}
                        @if ($errors->has('cell'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cell') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                --}}
                <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                    {!! Form::label('cell', '*Cell Phone:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::number('cell', null, ['id' => 'mobile', 'class' => 'col-md-4 form-control', 'required' => 'required']) !!}
                        @if ($errors->has('cell'))
                            <span class="help-block">
                <strong>{{ $errors->first('cell') }}</strong>
            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('active', '*Status:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-2">
                        {!! Form::select('active', [
                                        '1' => 'Active',
                                        '0' => 'Inactive'], old('active'), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('rec_email', '*Receive Emails:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-2">
                        {{ Form::select('rec_email', [
                            '1' => 'Yes',
                            '0' => 'No'], old('rec_email'), ['class' => 'form-control']) }}
                    </div>
                </div>



                <div class="form-group" style="text-align: center">
                    @if($CRUD_Action == 'Create')
                        {!! Form::button('<i class="fa fa-btn fa-save"></i>Register', ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                        {!! Form::reset('Reset', ['type' => 'reset','value'=>'Clear form', 'class' => 'btn btn-default']) !!}

                        <a class="btn btn-primary"
                           href="{{ route('users.index') }}">
                            Back</a>

                    @else
                        {!! Form::button('<i class="fa fa-btn fa-save"></i>Update', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}

                        {!! Form::button('Cancel', ['type' => 'submit', 'class' => 'btn btn-default', 'onClick' => 'users']) !!}

                        <a class="btn btn-primary"
                           href="{{ route('users.index') }}">
                            Back</a>
                    @endif
                </div>
        </div>
</div>
</div>
</div>


<script>
    $(document).ready(function ($) {
        if ($('#roles-select-id :selected').text() == 'Administrator') {
            $("#resident-con-id").prop("disabled", true);
        }

        if ($('#roles-select-id :selected').text() == 'Engineer') {
            $("#resident-con-id").prop("disabled", true);
        }
        if ($('#roles-select-id :selected').text() == 'Employee') {
            $("#resident-con-id").prop("disabled", true);
        }
        if ($('#roles-select-id :selected').text() == 'Contact') {
            $("#resident-con-id").prop("disabled", false);
            $("#resident-con-id").attr('required', true);
        }
    });

    $("#roles-select-id").change(function () {
        if ($('#roles-select-id :selected').text() == 'Contact') {
            $("#resident-con-id").prop("disabled", false);
            $("#resident-con-id").attr('required', true);
        } else {
            $("#resident-con-id").prop("disabled", true);
        }
    });


    $("#resident-con-id").change(function () {
        data = {option: $(this).val()};
        var role = $("#roles-select-id option:selected").text();
        //console.log("role is " + role);
        if (role == "Contact") {
            $.get("/getContactDetails", data, function (data) {
                //console.log(data);
                $("#f_name").val(data[0].con_fname);
                $("#m_name").val(data[0].con_mname);
                $("#l_name").val(data[0].con_lname);
                $("#email_id").val(data[0].con_email);
                $("#mobile").val(data[0].con_cellphone);
             });
        }

    });

</script>