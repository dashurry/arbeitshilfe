{{-- <div class="wt-tabscontenttitle"> --}}
<div>
    <h2>{{trans('lang.your_loc')}}</h2>

</div>

<div class="wt-formtheme">

    <div class="row">

        <div class="col-sm-12 col-md-6 mb-4">

            <span class="wt-select">
                <label>{{ trans('lang.select_location') }}</label>
                {!! Form::select('location', $locations, Auth::user()->location_id ,array('class' => 'form-control', 'placeholder' => trans('lang.select_location'))) !!}

            </span>

        </div>

        <div class="col-sm-12 col-md-6 mb-4">
            <label>{{ trans('lang.your_address') }}</label>
            {!! Form::text( 'address', e($address), ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}

        </div>

        <div class="col-12 mb-4 wt-formmap">

            @include('includes.map')

        </div>

        <div class="col-sm-12 col-md-6 mb-4 d-none">
            <label>{{ trans('lang.enter_logitude') }}</label>
            {!! Form::text( 'longitude', e($longitude), ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')] ) !!}

        </div>

        <div class="col-sm-12 col-md-6 mb-4 d-none">
            <label>{{ trans('lang.enter_latitude') }}</label>
            {!! Form::text( 'latitude', e($latitude), ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')] ) !!}

        </div>

    </div>

</div>