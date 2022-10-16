{{-- <div class="wt-tabscontenttitle"> --}}
<div>

    <h2>{{{ trans('lang.your_details') }}}</h2>

</div>

<div class="row">

    <div class="col-sm-12 col-md-6 mb-4">
        <label class="form-label">{{ trans('lang.ph_first_name') }}</label>
        {!! Form::text( 'first_name', e(Auth::user()->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')] ) !!}
    </div>

    <div class="col-sm-12 col-md-6 mb-4">
        <label class="form-label">{{ trans('lang.ph_last_name') }}</label>
        {!! Form::text( 'last_name', e(Auth::user()->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')] ) !!}
    </div>

    <div class="col-sm-12 col-md-6 mb-4">
        <label class="form-label">{{ trans('lang.ph_add_tagline') }}</label>
        {!! Form::text( 'tagline', e($tagline), ['class' =>'form-control', 'placeholder' => trans('lang.ph_add_tagline')] ) !!}
    </div>

    <div class="col-sm-12 col-md-12 mb-4">
        <label class="form-label">{{ trans('lang.ph_desc') }}</label>
        {!! Form::textarea( 'description', e($description), ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc')] ) !!}
    </div>


</div>