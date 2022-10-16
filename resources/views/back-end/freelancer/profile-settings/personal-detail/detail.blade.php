{{-- <div class="wt-tabscontenttitle"> --}}
<div>

    <h2>{{{ trans('lang.your_details') }}}</h2>

</div>

<div class="wt-formtheme">

    <div class="row">

        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('lang.ph_select_gender') }}</label>
            {!! Form::select( 'gender', ['male' => 'Männlich', 'female' => 'Weiblich'], e($gender), ['placeholder' => trans('lang.ph_select_gender'), 'class' => 'form-control'] ) !!}

        </div>

        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('lang.ph_first_name') }}</label>
            {!! Form::text( 'first_name', e(Auth::user()->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')] ) !!}

        </div>

        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('lang.ph_last_name') }}</label>
            {!! Form::text( 'last_name', e(Auth::user()->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')] ) !!}

        </div>

        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('lang.ph_service_hoyrly_rate') }}</label>
            {!! Form::number( 'hourly_rate', e($hourly_rate), ['class' =>'form-control', 'placeholder' => trans('lang.ph_service_hoyrly_rate')] ) !!}

        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('Telefonnummer') }}</label>
            {!! Form::number( 'phone', e($phone), ['class' =>'form-control', 'placeholder' => trans('Telefonnummer')] ) !!}

        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <label>Geburtsdatum*</label>
            <input type="date" name="dateOfBirth" class="form-control" value="{{ \Carbon\Carbon::parse($dateOfBirth )->format('Y-m-d') }}">
        </div>

        <div class="col-md-6 mb-4">
            <label>{{ trans('lang.ph_add_tagline') }}</label>
            {!! Form::text( 'tagline', e($tagline), ['class' =>'form-control', 'placeholder' => trans('lang.ph_add_tagline')] ) !!}
        </div>

        <div class="col-md-12 mb-4">
            <label>{{ trans('lang.ph_desc') }}</label>
            {!! Form::textarea( 'description', e($description), ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc')] ) !!}

        </div>

    </div>

</div>