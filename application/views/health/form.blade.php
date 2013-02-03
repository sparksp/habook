
{{ Form::horizontal_open() . Form::token() }}

    <h2>{{__('health.personal-details')}}</h2>

    @if ($errors->all())
    <div class="alert alert-block alert-error">
        <strong>{{__('health.oops')}}</strong>
        {{__('health.please_try_again')}}
    </div>
    @endif

    <?php echo Form::control_group(
        Form::label('surname', __('health.surname')),
        Form::text('surname', HealthForm::old('surname')),
        'surname'.$errors->first('surname', ' error'),
        $errors->first('surname', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('firstname', __('health.firstname')),
        Form::text('firstname', HealthForm::old('firstname')),
        'firstname'.$errors->first('firstname', ' error'),
        $errors->first('firstname', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('email', __('health.email')),
        Form::email('email', HealthForm::old('email')),
        'email'.$errors->first('email', ' error'),
        $errors->first('email', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('gender', __('health.gender')),
        Form::select('gender', HealthForm::genders(), HealthForm::old('gender')),
        'gender'.$errors->first('gender', ' error'),
        $errors->first('gender', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('address', __('health.address')),
        Form::textarea('address', HealthForm::old('address'), array('rows' => 3)).'<br>'.
        Form::small_text('postcode', HealthForm::old('postcode'), array('placeholder' => __('health.postcode'), 'style' => 'text-transform: uppercase', 'maxlength' => 8)),
        'address'.$errors->first('address', ' error').$errors->first('postcode', ' error'),
        $errors->first('address', '<p class="help-block">:message</p>') ?:
        $errors->first('postcode', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('telephone', __('health.telephone')),
        Form::medium_telephone('telephone', HealthForm::old('telephone')),
        'telephone'.$errors->first('telephone', ' error'),
        $errors->first('telephone', '<p class="help-block">:message</p>')
    ) ?>

@if (HealthForm::$adult)
    <?php echo Form::control_group(
        Form::label('mobile', __('health.mobile')),
        Form::medium_telephone('mobile', HealthForm::old('mobile')),
        'mobile'.$errors->first('mobile', ' error'),
        $errors->first('mobile', '<p class="help-block">:message</p>')
    ) ?>
@endif

    <?php echo Form::control_group(
        Form::label('date_of_birth[day]', __('health.date_of_birth')),
        HealthForm::date_select('date_of_birth'),
        'date_of_birth'.$errors->first('date_of_birth', ' error'),
        $errors->first('date_of_birth', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('unit_name', __('health.unit_name')),
        Form::text('unit_name', HealthForm::old('unit_name')),
        'unit_name'.$errors->first('unit_name', ' error'),
        $errors->first('unit_name', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('team_name', __('health.team_name')),
        Form::text('team_name', HealthForm::old('team_name')),
        'team_name'.$errors->first('team_name', ' error'),
        $errors->first('team_name', '<p class="help-block">:message</p>')
    ) ?>

@if (HealthForm::$adult)
    <?php echo Form::control_group(
        Form::label('crb_number', __('health.crb_number')),
        Form::text('crb_number', HealthForm::old('crb_number'), array('maxlength' => 12)),
        'crb_number'.$errors->first('crb_number', ' error'),
        $errors->first('crb_number', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('crb_issue_date', __('health.crb_issue_date')),
        HealthForm::date_select('crb_issue_date', 0, -10),
        'crb_issue_date'.$errors->first('crb_issue_date', ' error'),
        $errors->first('crb_issue_date', '<p class="help-block">:message</p>')
    ) ?>

    <div class="control-group">
        <p class="controls">{{__('health.crb_instructions')}}</p>
    </div>

    <div class="control-group is_leader{{ $errors->first('is_leader', ' error') }}">
        {{ Form::label('is_leader', __('health.is_leader')) }}
        <div class="controls">
            {{ Form::mini_select('is_leader', HealthForm::yesno(), HealthForm::old('is_leader')) }}

            {{ $errors->first('is_leader', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group first_aid{{ $errors->first('first_aid', ' error') }}">
        {{ Form::label('first_aid', __('health.first_aid')) }}
        <div class="controls">
            {{ Form::mini_select('first_aid', HealthForm::yesno(), HealthForm::old('first_aid')) }}

            {{ Form::label('first_aid_details', __('health.if_yes_give_details')) }}
            {{ Form::xlarge_text('first_aid_details', HealthForm::old('first_aid_details')) }}

            {{ $errors->first('first_aid', '<p class="help-block">:message</p>') }}
        </div>
    </div>

@endif

    <h2>{{__('health.home-contact')}}</h2>

    <div class="row"><div class="primary-contact-block span6">

        <h3>{{__('health.primary-contact')}}</h3>

        <?php echo Form::control_group(
            Form::label('primary_contact_name', __('health.contact_name')),
            Form::text('primary_contact_name', HealthForm::old('primary_contact_name')),
            'contact_name'.$errors->first('primary_contact_name', ' error'),
            $errors->first('primary_contact_name', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('primary_contact_relationship', __('health.contact_relationship')),
            Form::text('primary_contact_relationship', HealthForm::old('primary_contact_relationship')),
            'contact_relationship'.$errors->first('primary_contact_relationship', ' error'),
            $errors->first('primary_contact_relationship', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('primary_contact_address', __('health.contact_address')),
            Form::textarea('primary_contact_address', HealthForm::old('primary_contact_address'), array('rows' => 3)).'<br>'.
            Form::small_text('primary_contact_postcode', HealthForm::old('primary_contact_postcode'), array('placeholder' => __('health.contact_postcode'), 'style' => 'text-transform: uppercase', 'maxlength' => 8)),
            'contact_address'.$errors->first('primary_contact_address', ' error').$errors->first('primary_contact_postcode', ' error'),
            $errors->first('primary_contact_address', '<p class="help-block">:message</p>') ?:
            $errors->first('primary_contact_postcode', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('primary_contact_day_telephone', __('health.contact_day_telephone')),
            Form::medium_telephone('primary_contact_day_telephone', HealthForm::old('primary_contact_day_telephone')),
            'telephone'.$errors->first('primary_contact_day_telephone', ' error'),
            $errors->first('primary_contact_day_telephone', '<p class="help-block">:message</p>')
        ) ?>
        <?php echo Form::control_group(
            Form::label('primary_contact_evening_telephone', __('health.contact_evening_telephone')),
            Form::medium_telephone('primary_contact_evening_telephone', HealthForm::old('primary_contact_evening_telephone')),
            'telephone'.$errors->first('primary_contact_evening_telephone', ' error'),
            $errors->first('primary_contact_evening_telephone', '<p class="help-block">:message</p>')
        ) ?>
        <?php echo Form::control_group(
            Form::label('primary_contact_mobile', __('health.contact_mobile')),
            Form::medium_telephone('primary_contact_mobile', HealthForm::old('primary_contact_mobile')),
            'mobile'.$errors->first('primary_contact_mobile', ' error'),
            $errors->first('primary_contact_mobile', '<p class="help-block">:message</p>')
        ) ?>

    </div><div class="secondary-contact-block span6">

        <h3>{{__('health.secondary-contact')}}</h3>

        <?php echo Form::control_group(
            Form::label('secondary_contact_name', __('health.contact_name')),
            Form::text('secondary_contact_name', HealthForm::old('secondary_contact_name')),
            'contact_name'.$errors->first('secondary_contact_name', ' error'),
            $errors->first('secondary_contact_name', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('secondary_contact_relationship', __('health.contact_relationship')),
            Form::text('secondary_contact_relationship', HealthForm::old('secondary_contact_relationship')),
            'contact_relationship'.$errors->first('secondary_contact_relationship', ' error'),
            $errors->first('secondary_contact_relationship', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('secondary_contact_address', __('health.contact_address')),
            Form::textarea('secondary_contact_address', HealthForm::old('secondary_contact_address'), array('rows' => 3)).'<br>'.
            Form::small_text('secondary_contact_postcode', HealthForm::old('secondary_contact_postcode'), array('placeholder' => __('health.contact_postcode'), 'style' => 'text-transform: uppercase', 'maxlength' => 8)),
            'address contact_address'.$errors->first('secondary_contact_address', ' error').$errors->first('secondary_contact_postcode', ' error'),
            $errors->first('secondary_contact_address', '<p class="help-block">:message</p>') ?:
            $errors->first('secondary_contact_postcode', '<p class="help-block">:message</p>')
        ) ?>

        <?php echo Form::control_group(
            Form::label('secondary_contact_day_telephone', __('health.contact_day_telephone')),
            Form::medium_telephone('secondary_contact_day_telephone', HealthForm::old('secondary_contact_day_telephone')),
            'telephone'.$errors->first('secondary_contact_day_telephone', ' error'),
            $errors->first('secondary_contact_day_telephone', '<p class="help-block">:message</p>')
        ) ?>
        <?php echo Form::control_group(
            Form::label('secondary_contact_evening_telephone', __('health.contact_evening_telephone')),
            Form::medium_telephone('secondary_contact_evening_telephone', HealthForm::old('secondary_contact_evening_telephone')),
            'telephone'.$errors->first('secondary_contact_evening_telephone', ' error'),
            $errors->first('secondary_contact_evening_telephone', '<p class="help-block">:message</p>')
        ) ?>
        <?php echo Form::control_group(
            Form::label('secondary_contact_mobile', __('health.contact_mobile')),
            Form::medium_telephone('secondary_contact_mobile', HealthForm::old('secondary_contact_mobile')),
            'mobile'.$errors->first('secondary_contact_mobile', ' error'),
            $errors->first('secondary_contact_mobile', '<p class="help-block">:message</p>')
        ) ?>

    </div></div>

    <h2>{{__('health.medical_details')}}</h2>
    <p>{{__('health.medical_include_extra')}}</p>

    <?php echo Form::control_group(
        Form::label('doctor_name', __('health.doctor_name')),
        Form::text('doctor_name', HealthForm::old('doctor_name')),
        'doctor_name'.$errors->first('doctor_name', ' error'),
        $errors->first('doctor_name', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('doctor_telephone', __('health.doctor_telephone')),
        Form::medium_telephone('doctor_telephone', HealthForm::old('doctor_telephone')),
        'doctor_telephone'.$errors->first('doctor_telephone', ' error'),
        $errors->first('doctor_telephone', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('doctor_address', __('health.doctor_address')),
        Form::textarea('doctor_address', HealthForm::old('doctor_address'), array('rows' => 3)).'<br>'.
        Form::small_text('doctor_postcode', HealthForm::old('doctor_postcode'), array('placeholder' => __('health.doctor_postcode'), 'style' => 'text-transform: uppercase', 'maxlength' => 8)),
        'doctor_address'.$errors->first('doctor_address', ' error').$errors->first('doctor_postcode', ' error'),
        $errors->first('doctor_address', '<p class="help-block">:message</p>') ?:
        $errors->first('doctor_postcode', '<p class="help-block">:message</p>')
    ) ?>

    <div class="control-group medical_illness{{ $errors->first('medical_illness', ' error') }}">
        {{ Form::label('medical_illness', __('health.medical_illness')) }}
        <div class="controls">
            {{ Form::mini_select('medical_illness', HealthForm::yesno(), HealthForm::old('medical_illness')) }}

            {{ Form::label('medical_illness_details', __('health.if_yes_give_details')) }}
            {{ Form::xlarge_text('medical_illness_details', HealthForm::old('medical_illness_details')) }}

            {{ $errors->first('medical_illness', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group medical_allergy{{ $errors->first('medical_allergy', ' error') }}">
        {{ Form::label('medical_allergy', __('health.medical_allergy')) }}
        <div class="controls">
            {{ Form::mini_select('medical_allergy', HealthForm::yesno(), HealthForm::old('medical_allergy')) }}

            {{ Form::label('medical_allergy_details', __('health.if_yes_give_details')) }}
            {{ Form::xlarge_text('medical_allergy_details', HealthForm::old('medical_allergy_details')) }}

            {{ $errors->first('medical_allergy', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group medical_dietary{{ $errors->first('medical_dietary', ' error') }}">
        {{ Form::label('medical_dietary', __('health.medical_dietary')) }}
        <div class="controls">
            {{ Form::mini_select('medical_dietary', HealthForm::yesno(), HealthForm::old('medical_dietary')) }}

            {{ Form::label('medical_dietary_details', __('health.if_yes_give_details')) }}
            {{ Form::xlarge_text('medical_dietary_details', HealthForm::old('medical_dietary_details')) }}

            {{ $errors->first('medical_dietary', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group medical_tetnus_date{{ $errors->first('medical_tetnus_date', ' error') }}">
        {{ Form::label('medical_tetnus_date[day]', __('health.medical_tetnus_date')) }}
        <div class="controls">
            {{ HealthForm::date_select('medical_tetnus_date', 0) }}
        
            {{ $errors->first('medical_tetnus_date', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group contact_lens{{ $errors->first('medical_contact_lens', ' error') }}">
        {{ Form::label('medical_contact_lens', __('health.medical_contact_lens')) }}

        <div class="controls">
            {{ Form::mini_select('medical_contact_lens', HealthForm::yesno(), HealthForm::old('medical_contact_lens')) }}

            {{ $errors->first('medical_contact_lens', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="control-group medical_treatment{{ $errors->first('medical_treatment', ' error') }}">
        {{ Form::label('medical_treatment', __('health.medical_treatment')) }}
        <div class="controls">
            {{ Form::mini_select('medical_treatment', HealthForm::yesno(), HealthForm::old('medical_treatment')) }}

            {{ Form::label('medical_treatment_details', __('health.if_yes_give_details')) }}
            {{ Form::xlarge_text('medical_treatment_details', HealthForm::old('medical_treatment_details')) }}

            {{ $errors->first('medical_treatment', '<p class="help-block">:message</p>') }}
        </div>
    </div>

    <div class="row">
    <div class="control-group medication{{ $errors->first('medication', ' error') }} span6">
        {{ Form::label('medication', __('health.medication')) }}
        <div class="controls">
            {{ Form::xlarge_textarea('medication', HealthForm::old('medication'), array('rows' => 4)) }}

            {{ $errors->first('medication', '<p class="help-block">:message</p>') }}
        </div>
    </div>
@if (! HealthForm::$adult)
    <div class="span6">
        <h4 style="font-size: 100%; padding: 0; margin: 0 0 5px">{{__('health.medication_note')}}</h4>
        <p style="line-height: 1.6">{{__('health.medication_note_detail')}}</p>
    </div>
@endif
    </div>

    <h3>{{ __('health.hospital-consultant') }}</h3>

    <?php echo Form::control_group(
        Form::label('consultant_surname', __('health.consultant_surname')),
        Form::text('consultant_surname', HealthForm::old('consultant_surname')),
        'consultant_surname'.$errors->first('consultant_surname', ' error'),
        $errors->first('consultant_surname', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('consultant_firstname', __('health.consultant_firstname')),
        Form::text('consultant_firstname', HealthForm::old('consultant_firstname')),
        'consultant_firstname'.$errors->first('consultant_firstname', ' error'),
        $errors->first('consultant_firstname', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('consultant_hospital', __('health.consultant_hospital')),
        Form::xlarge_text('consultant_hospital', HealthForm::old('consultant_hospital')),
        'consultant_hospital'.$errors->first('consultant_hospital', ' error'),
        $errors->first('consultant_hospital', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('consultant_telephone', __('health.consultant_telephone')),
        Form::telephone('consultant_telephone', HealthForm::old('consultant_telephone')),
        'consultant_telephone'.$errors->first('consultant_telephone', ' error'),
        $errors->first('consultant_telephone', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('patient_number', __('health.patient_number')),
        Form::text('patient_number', HealthForm::old('patient_number')),
        'patient_number'.$errors->first('patient_number', ' error'),
        $errors->first('patient_number', '<p class="help-block">:message</p>')
    ) ?>



    <h2>{{__('health.permission')}}</h2>
    <p>{{__('health.permission_detail')}}</p>
    <p><strong>{{__('health.changes_detail')}}</strong></p>

    <h3>{{__('health.publicity')}}</h3>
    <p>{{__('health.publicity_detail')}}</p>

    <h3>{{__('health.cancellation')}}</h3>
    <p>{{__('health.cancellation_detail')}}</p>


    <h3>{{__('health.consent')}}</h3>
    <p>{{__('health.consent_detail')}}</p>
    

    <div class="form-inline"><div class="control-group consent{{ $errors->first('consent', ' error') }}">
        {{ Form::label('consent', __('health.understand')) }}
        {{ Form::mini_select('consent', HealthForm::yesno(), HealthForm::old('consent')) }}
        {{ $errors->first('consent', '<span class="help-inline">:message</span>') }}
    </div></div>

    <?php echo Form::actions(array(
        Button::primary_submit(__('health.submit')),
    )) ?>

{{ Form::close() }}
