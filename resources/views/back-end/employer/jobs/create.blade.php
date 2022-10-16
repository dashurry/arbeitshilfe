@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {

    color: #767676 !important;

}

    .wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {

    color: #767676;

}
    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {
    color: #767676 !important;
}
    .wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {
    color: #767676;
}
body h2{
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
    color: #313889;
}
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
.vdpComponent.vdpWithInput>input {
    font-style: italic;
    color: #6c757d;
}
/* .form-control{
    border: 1px solid #313889;
    color: #313889;
    
} */
/* .chosen-choices {
    border: 1px solid #313889 !important;
} */
.form-control::placeholder {
  color: #6c757d  !important;
  font-style: italic
}
select:required:invalid {
  color: #6c757d ;
  font-style: italic;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: #313889;
  font-style: normal;
}
input[type="number"]::placeholder{
    color:#6c757d ; 
}
</style>

<div class="wt-haslayout wt-dbsectionspace">

    <div class="row justify-content-center">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder" id="post_job">

            @if (Session::has('payment_message'))

                @php $response = Session::get('payment_message') @endphp

                <div class="flash_msg">

                    <flash_messages :message_class="'{{{$response['code']}}}'" :time ='5' :message="'{{{ $response['message'] }}}'" v-cloak></flash_messages>

                </div>

            @endif

            @if (session()->has('type'))

                @php session()->forget('type'); @endphp

            @endif

            <div class="preloader-section" v-if="loading" v-cloak>

                <div class="preloader-holder">

                    <div class="loader"></div>

                </div>

            </div>
                    <div class="wt-haslayout wt-post-job-wrap">

                        {!! Form::open(['url' => url('job/post-job'), 'class' =>'post-job-form wt-haslayout', 'id' => 'post_job_form',  '@submit.prevent'=>'submitJob']) !!}

                            <div class="wt-dashboardbox">

                                {{-- <div class="wt-dashboardboxtitle"> --}}
                                <div>

                                    <h2>{{ trans('lang.post_job') }}</h2>

                                </div>

                                <div class="wt-dashboardboxcontent">

                                    <div class="wt-tabscontenttitle">

                                        {{-- <h2>{{ trans('lang.job_desc') }}</h2> --}}

                                    </div>


                                    <div class="wt-jobdescription wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Gib deinem Auftrag einen aussagekräftigen Titel
                                                {{-- {{ trans('lang.service_desc') }} --}}
                                            </h2>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group">

                                                    <input type="text" name="title" class="form-control" placeholder="{{ trans('lang.job_title') }}" v-model="title">    

                                                </div>

                                            </fieldset>

                                        </div>
                                    </div>

                                    <div class="wt-jobdescription wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>{{ trans('lang.select_job_duration') }}</h2>

                                            <p class="text-muted mt-1">
                                                <em>Hier kannst du wählen, ob dein Auftrag innerhalb einer bestimmten Zeit erledigt werden soll.</em>
                                            </p>
                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group">

                                                    {{-- {!! Form::select('job_duration', $job_duration, null, array('class' => 'form-control', 'placeholder' => trans('lang.select_job_duration'), 'v-model'=>'job_duration')) !!}  --}}
                                                    <select class="form-control" name="job_duration" v-model="job_duration" onchange=" this.dataset.chosen = this.value; ">
                                                        <option value="" selected disabled hidden>{{ trans('lang.select_job_duration') }}</option>
                                                        @foreach($job_duration as $i=>$key)
                                                            <option value="{{ $i }}">{{ $key }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>

                                    <div class="wt-jobdescription wt-tabsinfo d-flex">
                                        <div class="col-md-4 wt-tabscontenttitle">
                                            <h2>
                                                {{-- {{ trans('lang.project_cost') }} --}}
                                                Wie viel soll der Auftrag kosten?
                                            </h2>
                                            <p class="text-muted mt-1"><em>Gib einen Bereich für dein Budget an oder lege ein fixes Budget fest. 
                                                Tipp: Bei einer Preisspanne ist die Chance für mehr Angebote grösser.</em></p>
                                        </div>
                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">
                                            <fieldset>

                                                <div class="form-group">

                                                    <label><input @change="changeBudgetType('open')" type="radio" name="budgetType" value="open" :checked="budgetType=='open'?true:false"> &nbsp; Kein Preis</label>
                                                    <label><input @change="changeBudgetType('fixed')" type="radio" name="budgetType" value="fixed" :checked="budgetType=='fixed'?true:false"> &nbsp; Fixes Budget</label>
                                                    <input v-if="budgetType=='fixed'" type="number" name="project_cost" class="form-control" placeholder="{{ trans("lang.project_cost") }}">

                                                </div>

                                            </fieldset>
                                        </div>
                                    </div>


                                    <div class="wt-jobdescription wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Datum wählen</h2>
                                            <p class="text-muted mt-1"><em>Hier kannst du wählen, ob dein Auftrag vor oder an einem bestimmten Tag erledigt werden soll.</em></p>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group">

                                                    <job-expiry
                                                    
                                                        :ph_expiry_date="trans('lang.project_expiry')"

                                                        :weekdays="'{{json_encode($weekdays)}}'"

                                                        :months="'{{json_encode($months)}}'">

                                                    </job-expiry>

                                                </div>

                                            </fieldset>

                                        </div>
                                    </div>

                                    {{-- <div class="wt-formtheme wt-userform wt-userformvtwo la-job-details-form">

                                        <div class="row">

                                            <div class="form-group form-group-half wt-formwithlabel">

                                                <span class="wt-select">

                                                    {!! Form::select('project_levels', $project_levels, null, array('class' => '', 'placeholder' => trans('lang.select_project_level'), 'v-model'=>'project_level')) !!}

                                                </span>

                                            </div>

                                            <div class="form-group form-group-half wt-formwithlabel">

                                                <span class="wt-select">

                                                    {!! Form::select('freelancer_type', $freelancer_level, null, array('placeholder' => trans('lang.select_freelancer_level'), 'class' => '', 'v-model'=>'freelancer_level')) !!}

                                                </span>

                                            </div>

                                            <div class="form-group form-group-half wt-formwithlabel">

                                                <span class="wt-select">

                                                    {!! Form::select('english_level', $english_levels, null, array('class' => '', 'placeholder' => trans('lang.select_english_level'), 'v-model'=>'english_level')) !!}

                                                </span>

                                            </div>

                                            <job-expiry 

                                                :ph_expiry_date="trans('lang.project_expiry')"

                                                :weekdays="'{{json_encode($weekdays)}}'"

                                                :months="'{{json_encode($months)}}'">

                                            </job-expiry>

                                        </div>

                                    </div> --}}

                                    




                                    <div class="wt-jobcategories wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Wähle eine Kategorie aus
                                                {{-- {{ trans('lang.job_cats') }} --}}
                                            </h2>

                                        </div>

                                        <div class="col-md-8 wt-divtheme wt-userform wt-userformvtwo">

                                            <div class="form-group">

                                                <span class="wt-select">

                                                    {!! Form::select('categories[]', $categories, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_job_cats'))) !!}

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                    {{-- <div class="wt-languages-holder wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.langs') }}</h2>

                                        </div>

                                        <div class="wt-divtheme wt-userform wt-userformvtwo">

                                            <div class="form-group">

                                                <span class="wt-select">

                                                    {!! Form::select('languages[]', $languages, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_lang'))) !!}

                                                </span>

                                            </div>

                                        </div>

                                    </div>
                                    
                                    <div class="wt-jobskills wt-jobskills-holder wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.skills_req') }}</h2>

                                        </div>

                                        <job_skills :placeholder="'skills already selected'"></job_skills>

                                    </div> --}}

                                    <div class="wt-jobdetails wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Was soll für dich erledigt werden?
                                                {{-- {{ trans('lang.job_dtl') }} --}}
                                            </h2>
                                            <p class="text-muted mt-1"><em>Beschreibe möglichst genau für welche Art von Dienstleistung du Hilfe suchst.</em></p>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'width:100%; height: 250px;'
                                            , 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_dtl_note')]) !!}

                                            <p class="text-muted"><em><small>Der Austausch von privaten Daten wie E-Mail-Adresse oder Telefonnummer ist nicht erlaubt. Nach erfolgreicher Buchung können im Chat die privaten Daten ausgetauscht werden.</small></em></p>

                                        </div>

                                    </div>

                                    

                                    <div class="wt-joblocation wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>Standort wählen
                                                {{-- {{ trans('lang.your_loc') }} --}}
                                            </h2>

                                        </div>

                                        <div class="wt-formtheme wt-userform">

                                            <div class="row">

                                                <div class="col-sm-12 col-md-6 mb-4">

                                                    <label>{{ trans('lang.select_locations') }}</label>
                                                    {!! Form::select('locations', $locations, null, array("required" => true, 'class' => 'form-control', 'placeholder' => trans('lang.select_locations')))   !!}

                                                </div>

                                                <div class="col-sm-12 col-md-6 mb-4" style="">

                                                    <label>{{ trans('lang.your_address') }}</label>
                                                    {!! Form::text( 'address', null, ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}

                                                </div>

                                                <div class="col-12 mb-4 wt-formmap">

                                                    @include('includes.map')

                                                </div>

                                                <div class="col-sm-12 col-md-6 mb-4 d-none">
                                                    <label>{{ trans('lang.enter_logitude') }}</label>
                                                    {!! Form::text( 'longitude', null, ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]) !!}

                                                </div>

                                                <div class="col-sm-12 col-md-6 mb-4 d-none">
                                                    <label>{{ trans('lang.enter_latitude') }}</label>
                                                    {!! Form::text( 'latitude', null, ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]) !!}

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    {{-- <div class="wt-featuredholder wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.is_featured') }}</h2>

                                            <div class="wt-rightarea">

                                                <div class="wt-on-off float-right">

                                                    <switch_button v-model="is_featured">{{{ trans('lang.is_featured') }}}</switch_button>

                                                    <input type="hidden" :value="is_featured" name="is_featured">

                                                </div>

                                            </div>

                                        </div>

                                    </div> --}}

                                    <div class="wt-attachmentsholder">

                                        <div class="lara-attachment-files">

                                            <div class="wt-tabscontenttitle">

                                                <h2>{{ trans('lang.attachments') }}</h2>

                                                <div class="wt-rightarea">

                                                    <div class="wt-on-off float-right">

                                                        <switch_button v-model="show_attachments">{{{ trans('lang.attachments_note') }}}</switch_button>

                                                        <input type="hidden" :value="show_attachments" name="show_attachments">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="wt-tabscontenttitle col-md-4">
                                                
                                                    <h2>Dateien hochladen</h2>

                                                    <p class="text-muted mt-1"><em>Hier kannst du Dateien, Bilder oder Videos hochladen.</em></p>

                                                </div>

                                                <div class="col-md-8">

                                                    <!-- Drag and drop file upload -->

                                                    <job_attachments :temp_url="'{{url('job/upload-temp-image')}}'"></job_attachments>

                                                    <div class="form-group input-preview">

                                                        <ul class="wt-attachfile dropzone-previews">



                                                        </ul>

                                                    </div>

                                                </div>
                                        
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- <div class="wt-updatall">

                                <i class="ti-announcement"></i>

                                <span>{{{ trans('lang.save_changes_note') }}}</span>

                                {!! Form::submit(trans('lang.post_job'), ['class' => 'btn btn-primary float-right', 'id'=>'submit-profile']) !!}

                            </div> --}}
                            <div class="row justify-content-center">
                                {!! Form::submit(trans('lang.post_job'), ['class' => 'wt-btn shadow-none lift', 'id'=>'submit-profile']) !!}
                            </div>

                        {!! form::close(); !!}

                    </div>

        </div>

    </div>

</div>
@section('bootstrap_script')

    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

@stop

@endsection
