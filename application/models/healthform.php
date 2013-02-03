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
        'date_of_birth' => 'required|date_required|checkdate',
        'unit_name' => 'required',
        'team_name' => 'required',
        // Primary Contact
        'primary_contact_name' => 'required',
        'primary_contact_relationship' => 'required',
        'primary_contact_address' => 'required',
        'primary_contact_postcode' => 'required',
        'primary_contact_day_telephone' => 'required',
        'primary_contact_evening_telephone' => 'required',
        // 'primary_contact_mobile' => 'required',

        // Secondary Contact
        'secondary_contact_name' => 'required',
        'secondary_contact_relationship' => 'required',
        'secondary_contact_address' => 'required',
        'secondary_contact_postcode' => 'required',
        'secondary_contact_day_telephone' => 'required',
        'secondary_contact_evening_telephone' => 'required',
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

        'medical_tetnus_date' => 'checkdate', // optional
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

        'consent' => 'accepted',

        // if $adult
        // 'crb_number' => 'required',
        // 'crb_issue_date' => 'required',
        // 'is_leader' => 'required',
        // 'first_aid' => 'required',

    );

    public static $adult = false;

    public static function before_validation()
    {
        Validator::register('date_required', function($attribute, $value, $parameters)
        {
            return !( empty($value) or empty($value['day']) or empty($value['month']) or empty($value['year']) );
        });
        Validator::register('checkdate', function($attribute, $value, $parameters)
        {
            if ( empty($value) or empty($value['day']) or empty($value['month']) or empty($value['year']) )
            {
                return true; // no date
            }

            $month = intval($value['month']);
            $day   = intval($value['day']);
            $year  = intval($value['year']);

            return checkdate($month, $day, $year);
        });


        if (static::$adult)
        {
            static::$rules += array(
                'crb_number' => 'required|size:12',
                'crb_issue_date' => 'date_required|checkdate',
                'is_leader' => 'required',
                'first_aid' => 'required',
            );
        }
    }

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
    public static function years($from = -10, $to = -80)
    {
        $years = range(date('Y') + $from, date('Y') + $to);
        return array_combine($years, $years);
    }

    public static function date_select($name, $from = -10, $to = -80)
    {
        $old = self::old($name);

        $blank = array('' => '');
        return
            Form::mini_select("{$name}[day]", $blank + self::days(), array_get($old, 'day', '')).' / '.
            Form::medium_select("{$name}[month]", $blank + self::months(), array_get($old, 'month', '')).' / '.
            Form::small_select("{$name}[year]", $blank + self::years($from, $to), array_get($old, 'year', ''));

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
