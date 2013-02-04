
    <h2>{{__('health.personal-details')}}</h2>

    <dl>
    	<dt>{{__('health.surname')}}</dt>
		<dd>{{e( $health->surname )}}</dd>

		<dt>{{__('health.firstname')}}</dt>
		<dd>{{e( $health->firstname )}}</dd>

		<dt>{{__('health.email')}}</dt>
		<dd>{{e( $health->email )}}</dd>

		<dt>{{__('health.gender')}}</dt>
		<dd>{{e( $health->gender )}}</dd>

		<dt>{{__('health.address')}}</dt>
		<dd>{{e( $health->address .' '. $health->postcode )}}</dt>

		<dt>{{__('health.telephone')}}</dt>
		<dd>{{e( $health->telephone )}}</dd>

@if ($health->mobile)
		<dt>{{__('health.mobile')}}</dt>
		<dd>{{e( $health->mobile )}}</dd>
@endif

		{{-- TODO: Format --}}
		<dt>{{__('health.date_of_birth')}}</dt>
		<dd>{{e( $health->date_of_birth )}}</dd>

		<dt>{{__('health.unit_name')}}</dt>
		<dd>{{e( $health->unit_name )}}</dd>

		<dt>{{__('health.team_name')}}</dt>
		<dd>{{e( $health->team_name )}}</dd>

@if ($health->crb_number)
		<dt>{{__('health.crb_number')}}</dt>
		<dd>{{e( $health->crb_number )}}</dd>

		<dt>{{__('health.crb_issue_date')}}</dt>
		<dd>{{e( $health->crb_issue_date )}}</dd>
@endif

@if ($health->is_leader)
		<dt>{{__('health.is_leader')}}</dt>
		<dd>Yes</dd>
@endif

@if ($health->first_aid)
		<dt>{{__('health.first_aid')}}</dt>
		<dd>{{e( $health->first_aid_details )}}</dd>
@endif

    <h2>{{__('health.home-contact')}}</h2>

    <div class="row"><div class="primary-contact-block span6">

        <h3>{{__('health.primary-contact')}}</h3>

        <dt>{{__('health.contact_name')}}</dt>
        <dd>{{e( $health->primary_contact_name )}}</dd>

        <dt>{{__('health.contact_relationship')}}</dt>
        <dd>{{e( $health->primary_contact_relationship)}}</dd>

        <dt>{{__('health.contact_address')}}</dt>
        <dd>{{e( $health->primary_contact_address .' '. $health->primary_contact_postcode )}}</dd>

        <dt>{{__('health.contact_day_telephone')}}</dt>
        <dd>{{e( $health->primary_contact_day_telephone )}}</dd>

        <dt>{{__('health.contact_evening_telephone')}}</dt>
        <dd>{{e( $health->primary_contact_evening_telephone )}}</dd>

        <dt>{{__('health.contact_mobile')}}</dt>
        <dd>{{e( $health->primary_contact_mobile )}}</dd>

    </div><div class="secondary-contact-block span6">

        <h3>{{__('health.secondary-contact')}}</h3>

        <dt>{{__('health.contact_name')}}</dt>
        <dd>{{e( $health->secondary_contact_name )}}</dd>

        <dt>{{__('health.contact_relationship')}}</dt>
        <dd>{{e( $health->secondary_contact_relationship )}}</dd>

        <dt>{{__('health.contact_address')}}</dt>
        <dd>{{e( $health->secondary_contact_address .' '. $health->secondary_contact_postcode )}}</dd>

        <dt>{{__('health.contact_day_telephone')}}</dt>
        <dd>{{e( $health->secondary_contact_day_telephone )}}</dd>

        <dt>{{__('health.contact_evening_telephone')}}</dt>
        <dd>{{e( $health->secondary_contact_evening_telephone )}}</dd>

        <dt>{{__('health.contact_mobile')}}</dt>
        <dd>{{e( $health->secondary_contact_mobile )}}</dd>

    </div></div>

    <h2>{{__('health.medical_details')}}</h2>
    <p>{{__('health.medical_include_extra')}}</p>

        <dt>{{__('health.doctor_name')}}</dt>
        <dd>{{e( $health->doctor_name )}}</dd>

        <dt>{{__('health.doctor_telephone')}}</dt>
        <dd>{{e( $health->doctor_telephone )}}</dd>

        <dt>{{__('health.doctor_address')}}</dt>
        <dd>{{e( $health->doctor_address .' '. $health->doctor_postcode )}}</dd>

        <dt>{{__('health.medical_illness')}}</dt>
        <dd>{{ $health->medical_illness ? e( $health->medical_illness_details ) : '<em>None</em>' }}</dd>

        <dt>{{__('health.medical_allergy')}}</dt>
        <dd>{{ $health->medical_allergy ? e( $health->medical_allergy_details ) : '<em>None</em>' }}</dd>

        <dt>{{__('health.medical_dietary')}}</dt>
        <dd>{{ $health->medical_dietary ? e( $health->medical_dietary_details ) : '<em>None</em>' }}</dd>

        <dt>{{__('health.medical_tetnus_date')}}</dt>
        <dd>{{ $health->medical_tetnus_date != '0000-00-00' ? $health->medical_tetnus_date : '<em>Unknown</em>' }}</dd>

        <dt>{{__('health.medical_contact_lens')}}</dt>
        <dd>{{ $health->medical_contact_lens ? 'Yes' : '<em>No</em>' }}</dd>

        <dt>{{__('health.medical_treatment')}}</dt>
        <dd>{{ $health->medical_treatment ? e( $health->medical_treatment_details ) : '<em>None</em>' }}</dd>

        <dt>{{ Form::label('medication', __('health.medication')) }}</dt>
        <dd>{{ $health->medication ? e( $health->medication ) : '<em>None</em>' }}</dd>

    <h3>{{ __('health.hospital-consultant') }}</h3>

        <dt>{{__('health.consultant_surname')}}</dt>
        <dd>{{e( $health->consultant_surname ) ?: '<em>None</em>'}}</dd>

        <dt>{{__('health.consultant_firstname')}}</dt>
        <dd>{{e( $health->consultant_firstname ) ?: '<em>None</em>'}}</dd>

        <dt>{{__('health.consultant_hospital')}}</dt>
        <dd>{{e( $health->consultant_hospital ) ?: '<em>None</em>'}}</dd>

        <dt>{{__('health.consultant_telephone')}}</dt>
        <dd>{{e( $health->consultant_telephone ) ?: '<em>None</em>'}}</dd>

        <dt>{{__('health.patient_number')}}</dt>
        <dd>{{e( $health->patient_number ) ?: '<em>None</em>'}}</dd>

    <h2>{{__('health.permission')}}</h2>
    <p>{{__('health.permission_detail')}}</p>
    <p><strong>{{__('health.changes_detail')}}</strong></p>

    <h3>{{__('health.publicity')}}</h3>
    <p>{{__('health.publicity_detail')}}</p>

    <h3>{{__('health.cancellation')}}</h3>
    <p>{{__('health.cancellation_detail')}}</p>


    <h3>{{__('health.consent')}}</h3>
    <p>{{__('health.consent_detail')}}</p>
    
