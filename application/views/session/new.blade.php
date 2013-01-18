
{{ Form::horizontal_open().Form::token() }}

    <h1>{{ __('session.new') }}</h1>

    <?php echo Form::control_group(
        Form::label('email', __('session.email')),
        Form::email('email', NewSessionForm::old('email')),
        'email'.$errors->first('email', ' error'),
        $errors->first('email', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::control_group(
        Form::label('password', __('session.password')),
        Form::password('password'),
        'password'.$errors->first('password', ' error'),
        $errors->first('password', '<p class="help-block">:message</p>')
    ) ?>

    <?php echo Form::actions(array(
        Button::primary_submit(__('session.new')),
    )) ?>

{{ Form::close() }}
