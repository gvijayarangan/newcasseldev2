<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute already exists in the system.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' =>array(
        'apt_floornumber' => 'Apartment Floor Number',
        'apt_number' => 'Apartment Number',
        'apt_comments'=> 'Apartment Commnent',

        'res_pccid' => 'Resident PCCID',
        'res_fname' => 'Resident First Name',
        'res_mname' => 'Resident Middle Name',
        'res_lname'=> 'Resident Last Name',
        'res_gender' => 'Resident Gender',
        'res_Homephone'=> 'Resident Homephone',
        'res_cellphone' => 'Resident Cellphone',
        'res_email' => 'Resident Email',
        'res_status'=> 'Resident Status',
        'res_comment' => 'Resident Comment',
        'con_res_id' => 'Resident Name',
        'res_fullname' => 'Resident Name',

        'con_fname' => 'Resident Contact First Name',
        'con_mname' => 'Resident Contact Middle Name',
        'con_lname' => 'Resident Contact Last Name',
        'con_relationship' => 'Resident Contact Relationship',
        'con_cellphone' => 'Resident Contact Cellphone',
        'con_email' => 'Resident Contact Email',
        'con_comment' => 'Resident Contact Comment',
        'con_gender' => 'Resident Contact Gender',

        'ca_name' => 'Common Area Name',
        'ca_comments' => 'Common Area Comments',

        'cntr_id' => 'Center ID',
        'cntr_name' => 'Center Name',
        'cntr_add1' => 'Center Address1',
        'cntr_add2' => 'Center Address2',
        'cntr_city' => 'Center City',
        'cntr_state' => 'Center State',
        'cntr_zip' => 'Center Zip',
        'cntr_phone' => 'Center Phone',
        'cntr_fax' => 'Center Fax',
        'cntr_comments' => 'Center Comments ',

        'sup_name' => 'Supply Name',
        'sup_unitprice' => 'Supply Unit Price',
        'sup_comment' => 'Supply Comment',

        'tool_name' => 'Tool Name',
        'tool_comment' => 'Tool Comment',

        'issue_typename' => 'Issue Type Name',
        'issue_description' => 'Issue Description',

        'f_name' => 'First Name',
        'l_name' => 'Last Name',
        'email' => 'Email id',
        'cell' => 'Cell phone number',
        'requester' => 'Requestor name',
        'resident_comments' => 'Comments',
        'status' => 'Status',

        'noti_type' => 'Email Notification Type',
        'noti_email_title' => 'Email Notification Title',
        'noti_alert_content' => 'Email Notification Content',
        'noti_status' => 'Email Notification Status',
        'res_con_id' => 'Resident Contact User',
    ),

];
