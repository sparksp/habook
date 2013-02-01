<?php

class Health_Controller extends Base_Controller {

    public $restful = true;
    public $layout = 'layout';

    public function get_index()
    {
        $this->layout->nest('content', 'health.select');
    }

    public function get_u18()
    {
        $this->layout->content = View::make('health.form');
    }

    public function post_u18()
    {
        if ( ! HealthForm::is_valid() )
        {
            return Redirect::back()->with_input()->with_errors( HealthForm::$validation );
        }

        echo 'ok';
    }


    public function get_o18()
    {
        HealthForm::$adult = true;
        $this->layout->content = View::make('health.form');
    }

    public function post_o18()
    {
        HealthForm::$adult = true;

        if ( ! HealthForm::is_valid() )
        {
            return Redirect::back()->with_input()->with_errors( HealthForm::$validation );
        }

        echo 'ok';
    }

}
