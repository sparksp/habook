<?php

class Session_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        parent::__construct();

        $this->filter('before', 'csrf')->on('post');
    }

    public function get_index()
    {
        return Redirect::home();
    }

    public function get_new()
    {
        $user = new User;
        NewSessionForm::load($user);

        $this->layout->title = __('session.new');
        $this->layout->content = View::make('session.new');
    }

    public function post_new()
    {
        if ( !NewSessionForm::is_valid() )
        {
            return Redirect::back()
                ->with_input()
                ->with_errors( NewSessionForm::$validation );
        }

        $details = array(
            'username' => Input::get('email'),
            'password' => Input::get('password'),
            'remember' => false,
        );

        if ( ! Auth::attempt( $details ))
        {
            $errors = new Laravel\Messages(array(
                'password' => 'The credentials you entered are incorrect',
            ));
            return Redirect::back()
                ->with_input()
                ->with_errors($errors);
        }

        return Redirect::home();
    }

    public function get_destroy()
    {
        Auth::logout();

        return Redirect::back();
    }

}
