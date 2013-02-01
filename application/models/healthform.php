<?php

class HealthForm extends FormBaseModel\Base {

    public static $rules = array(
        'surname' => 'required',
        'firstname' => 'required',
        'email' => 'required|email',
        'gender' => 'required|in:female,male',
        'address' => 'required',
        'postcode' => 'required|min:5|max:10',
        'telephone' => 'required',
        // 'dateofbirth' => 'todo',
        'unit_name' => 'required',
        'team_name' => 'required',
        // Primary Contact
        'primary_contact_name' => 'required',
        'primary_contact_relationship' => 'required',
        'primary_contact_address' => 'required',
        'primary_contact_postcode' => 'required',
        'primary_contact_daytelephone' => 'required',
        'primary_contact_nighttelephone' => 'required',
        // 'primary_contact_mobile' => 'required',

        // Secondary Contact
        'secondary_contact_name' => 'required',
        'secondary_contact_relationship' => 'required',
        'secondary_contact_address' => 'required',
        'secondary_contact_postcode' => 'required',
        'secondary_contact_daytelephone' => 'required',
        'secondary_contact_nighttelephone' => 'required',
        // 'secondary_contact_mobile' => 'required',

        // Medical Details
        'doctor_name' => 'required',
        'doctor_telephone' => 'required',
        'doctor_address' => 'required',
        'doctor_postcode' => 'required',

        'medical_illness' => 'required|in:yes,no',
        'medical_illness_details' => '', // required when medical_illness,yes

        'medical_allergy' => 'required|in:yes,no',
        'medical_allergy_details' => '', // requried when medical_allergy,yes

        'medical_dietary' => 'required|in:yes,no',
        'medical_dietary_details' => '', // required when medical_dietary,yes

        'medical_tetnus_date' => '', // optional
        'medical_contact_lens' => 'required|in:yes,no',

        'medical_treatment' => 'required|in:yes,no',
        'medical_treatment_deatils' => '', // required when medical_treatment,yes

        'medication' => '',

        // Hospital Consultant (optional)
        'consultant_surname' => '',
        'consultant_firstname' => '',
        'consultant_hospital' => '',
        'consultant_telephone' => '',
        'patient_number' => '',

        'parent_name' => 'required',
        'parent_guardian' => 'required|in:parent,guardian',
        'parent_email' => 'required|email',


        // if $adult
        // 'mobile' => 'required',

    );

    public static $adult = false;

    public static function genders()
    {
        return array(
            '' => '',
            'female' => __('health.female'),
            'male' => __('health.male'),
        );
    }

    /**
     * @return array of days
     */
    public static function days()
    {
        $days = range(1, 31);
        return array_combine($days, $days);
    }

    /**
     * @return array of months
     */
    public static function months()
    {
        $options = array();
        foreach (range(1, 12) as $month)
        {
            $options[$month] = Date('F', mktime(0, 0, 0, $month));
        }
        return $options;
    }

    /**
     * @return array of years
     */
    public static function years($from = -10)
    {
        $years = range(date('Y') + $from, date('Y') - 80);
        return array_combine($years, $years);
    }

    public static function date_select($name, $from = -10)
    {
        $old = self::old($name);

        $blank = array('' => '');
        return
            Form::mini_select("{$name}[day]", $blank + self::days(), array_get($old, 'day', '')).' / '.
            Form::medium_select("{$name}[month]", $blank + self::months(), array_get($old, 'month', '')).' / '.
            Form::small_select("{$name}[year]", $blank + self::years($from), array_get($old, 'year', ''));

    }

    public static function yesno()
    {
        return array(
            '' => '',
            'no' => __('health.no'),
            'yes' => __('health.yes'),
        );
    }

    public static function parent_guardian()
    {
        return array(
            '' => '',
            'guardian' => __('health.guardian'),
            'parent' => __('health.parent'),
        );
    }

}
