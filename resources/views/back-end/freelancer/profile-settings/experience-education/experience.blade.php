<freelancer_experience 

    :server_errors="'Bitte füllen Sie alle notwendige Pflichtfelder aus. '" 

    ph_job_title="{{ trans('lang.ph_job_title') }}" 

    ph_company_title="{{trans('lang.ph_company_title')}}"

    ph_job_desc="{{ trans('lang.ph_job_desc') }}"

    :ph_start_date="'{{ trans('lang.ph_start_date') }}'"

    :ph_end_date="'{{ trans('lang.ph_end_date') }}'"

    :weekdays="'{{json_encode($weekdays)}}'"

    :months="'{{json_encode($months)}}'">

</freelancer_experience>