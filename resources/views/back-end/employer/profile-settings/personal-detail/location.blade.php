{{-- <div class="wt-tabscontenttitle"> --}}
<div>
    
    <h2>{{ trans('lang.your_loc') }}</h2>

</div>

<div class="row">

    <div class="col-sm-12 col-md-6 mb-4">
        <label class="form-label">{{ trans('lang.ph_select_location') }}</label>
        {!! Form::select('location', $locations, Auth::user()->location_id ,array('class' => 'form-control', 'placeholder' => trans('lang.ph_select_location'))) !!}
    </div>

    <div class="col-sm-12 col-md-6 mb-4">
        <label class="form-label">{{ trans('lang.ph_your_address') }}</label>
        {!! Form::text( 'address', e($address), ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_your_address')] ) !!}
    </div>

    <div class=" col-12 form-group wt-formmap mb-4">

        @include('includes.map')

    </div>

    <div class="col-sm-12 col-md-6 mb-4 d-none">
        <label class="form-label">{{ trans('lang.ph_enter_logitude') }}</label>
        {!! Form::text( 'longitude', e($longitude), ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_enter_logitude')]) !!}

    </div>

    <div class="col-sm-12 col-md-6 mb-4 d-none">

        <label class="form-label">{{ trans('lang.ph_enter_latitude') }}</label>
        {!! Form::text( 'latitude', e($latitude), ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_enter_latitude')]) !!}

    </div>


</div>