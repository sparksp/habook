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

        $record = $this->prepare_input();
        $health = Health::create($record);

        return Redirect::to_action('health@show', array($health->id, $health->hash));
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

        $record = $this->prepare_input();
        $health = Health::create($record);

        return Redirect::to_action('health@show', array($health->id, $health->hash));
    }

    public function get_show($id, $hash)
    {
        $health = Health::find($id);


        if ( ! $health or ($health->hash != $hash))
        {
            return Response::error(404);
        }

        $this->layout->content = View::make('health.review', compact('health'));
    }

    protected function prepare_input()
    {
        $input = Input::all();
        $output = array();

        $dates = array('date_of_birth', 'crb_issue_date', 'medical_tetnus_date');
        $yesno = array('is_leader', 'first_aid', 'medical_illness', 'medical_allergy', 'medical_dietary', 'medical_contact_lens', 'medical_treatment');
        $string = array('surname', 'firstname', 'email', 'gender', 'address', 'postcode', 'telephone', 'mobile', 'unit_name', 'team_name', 'crb_number',
            'first_aid_details', 'primary_contact_name', 'primary_contact_relationship', 'primary_contact_address', 'primary_contact_postcode',
            'primary_contact_day_telephone', 'primary_contact_evening_telephone', 'primary_contact_mobile', 'secondary_contact_name',
            'secondary_contact_relationship', 'secondary_contact_address', 'secondary_contact_postcode', 'secondary_contact_day_telephone',
            'secondary_contact_evening_telephone', 'secondary_contact_mobile', 'doctor_name', 'doctor_telephone', 'doctor_address', 'doctor_postcode',
            'medical_illness_details', 'medical_allergy_details', 'medical_dietary_details', 'medical_treatment_details', 'medication',
            'consultant_surname', 'consultant_firstname', 'consultant_hospital', 'consultant_telephone', 'patient_number',
        );

        foreach ($input as $name => $value)
        {
            if (in_array($name, $dates))
            {
                $output[$name] = $this->prepare_date($value);
            }
            else if (in_array($name, $yesno))
            {
                $output[$name] = $this->prepare_yesno($value);
            }
            else if (in_array($name, $string))
            {
                $output[$name] = empty($value) ? '' : (string) $value;
                $output[$name] = preg_replace('/[\r\n]+/', ", ", $output[$name]);
            }
        }

        return $output;
    }

    protected function prepare_date($date)
    {

        if (empty($date) or empty($date['day']) or empty($date['month']) or empty($date['year']))
        {
            return ''; // bad or empty date
        }

        return sprintf('%04d-%02d-%02d', $date['year'], $date['month'], $date['day']);
    }

    protected function prepare_yesno($yesno)
    {
        return $yesno == 'yes';
    }

}
