@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>
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
/* .form-control {
    border: 1px solid #313889;
    color: #313889;
    
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

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder" id="services">

            <div class="preloader-section" v-if="loading" v-cloak>

                <div class="preloader-holder">

                    <div class="loader"></div>

                </div>

            </div>

            
                    <div class="wt-haslayout wt-post-job-wrap">

                        {!! Form::open(['url' => '', 'class' =>'wt-haslayout', 'id' => 'post_service_form',  '@submit.prevent'=>'submitService']) !!}

                            <div class="wt-dashboardbox">

                                <div class="wt-dashboardboxtitle">

                                    <h2>{{ trans('lang.post_service') }}</h2>

                                </div>

                                <div class="wt-dashboardboxcontent">

                                    <div class="wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Gib deinem Auftrag einen aussagekräftigen Titel
                                                {{-- {{ trans('lang.service_desc') }} --}}
                                            </h2>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group">

                                                    <input type="text" name="title" class="form-control" placeholder="{{ trans('lang.service_title') }}" v-model="title">

                                                </div>

                                            </fieldset>

                                        </div>

                                    </div>

                                    <div class="wt-jobdescription wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Wie viel soll der Auftrag kosten?
                                                {{-- {{ trans('lang.service_desc') }} --}}
                                            </h2>
                                            <p class="text-muted mt-1"><em>Gib einen Bereich für dein Budget an oder lege ein fixes Budget fest. 
                                                Tipp: Bei einer Preisspanne ist die Chance für mehr Angebote grösser.</em></p>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group form-group-half">

                                                    {!! Form::number('service_price', null, array('class' => 'form-control', 'placeholder' => trans('lang.service_price'), 'v-model'=>'price')) !!}

                                                </div>

                                            </fieldset>

                                        </div>

                                    </div>

                                    <div class="wt-jobdescription wt-tabsinfo d-flex">

                                        <div class="col-md-4 wt-tabscontenttitle">

                                            <h2>Datum wählen
                                                {{-- {{ trans('lang.service_desc') }} --}}
                                            </h2>
                                            <p class="text-muted mt-1"><em>Hier kannst du wählen, ob dein Auftrag vor oder an einem bestimmten Tag erledigt werden soll.</em></p>

                                        </div>

                                        <div class="col-md-8 wt-formtheme wt-userform wt-userformvtwo">

                                            <fieldset>

                                                <div class="form-group form-group-half wt-formwithlabel">

                                                    {{-- {!! Form::select('delivery_time', $delivery_time, null, 
                                                    array('class' => 'form-control', 'placeholder' => trans('lang.select_delivery_time'), 'v-model'=>'delivery_time')) !!} --}}
                                                    
                                                    <select class="form-control" name="delivery_time" v-model="delivery_time" onchange=" this.dataset.chosen = this.value; ">
                                                        
                                                        <option value="" selected disabled hidden>{{ trans('lang.select_delivery_time') }}</option>
                                                            
                                                            @foreach ($delivery_time as $time)
                                                                
                                                                <option value="{{ $time->id }}">{{ $time->title }}</option>
                                                                
                                                            @endforeach

                                                    </select>

                                                    
            
                                                </div>

                                            </fieldset>

                                        </div>

                                    </div>

                                    {{-- <div class="wt-languages-holder wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.service_response_time') }}</h2>

                                        </div>

                                        <div class="wt-divtheme wt-userform wt-userformvtwo">

                                            <div class="form-group">

                                                {!! Form::select('response_time', $response_time, null, array('class' => 'form-control', 'placeholder' => trans('lang.select_response_time'), 'v-model'=>'response_time')) !!}


                                            </div>

                                        </div>

                                    </div> --}}

                                    {{-- <div class="wt-languages-holder wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.service_response_time') }}</h2>

                                        </div>

                                        <div class="wt-divtheme wt-userform wt-userformvtwo">

                                            <div class="form-group">

                                                {!! Form::select('response_time', $response_time, null, array('class' => 'form-control', 'placeholder' => trans('lang.select_response_time'), 'v-model'=>'response_time')) !!}


                                            </div>

                                        </div>

                                    </div> --}}

                                    {{-- <div class="form-group form-group-half wt-formwithlabel">

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

                                    </div> --}}

                                    {{-- <div class="form-group form-group-half wt-formwithlabel">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.english_level') }}</h2>

                                        </div>

                                        <div class="wt-divtheme wt-userform wt-userformvtwo">

                                            <div class="form-group">

                                                <span class="wt-select">

                                                    {!! Form::select('english_level', $english_levels, null, array('class' => '', 'placeholder' => trans('lang.select_english_level'), 'v-model'=>'english_level')) !!}

                                                </span>

                                            </div>

                                        </div>

                                    </div> --}}

                                    <div class="wt-jobdetails wt-tabsinfo d-flex">

                                        <div class="wt-tabscontenttitle col-md-4">

                                            <h2>Was soll für dich erledigt werden?
                                                {{-- {{ trans('lang.service_desc') }} --}}
                                            </h2>
                                            <p class="text-muted mt-1"><em>Beschreibe möglichst genau für welche Art von Dienstleistung du Hilfe suchst.</em></p>

                                        </div>

                                        <div class="wt-formtheme wt-userform wt-userformvtwo col-md-8">

                                            {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'width:100%; height: 250px;'
                                            ,'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_desc')]) !!}

                                            <p class="text-muted"><em><small>Der Austausch von privaten Daten wie E-Mail-Adresse oder Telefonnummer ist nicht erlaubt. Nach erfolgreicher Buchung können im Chat die privaten Daten ausgetauscht werden.</small></em></p>

                                        </div>

                                    </div>

                                    <div class="wt-joblocation wt-tabsinfo">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.your_loc') }}</h2>

                                        </div>

                                        <div class="wt-formtheme wt-userform">

                                            <fieldset>

                                                <div class="form-group form-group-half">
                                                    <label>{{ trans('lang.select_locations') }}</label>
                                                    {!! Form::select('locations', $locations, null, array("required" => true, 'class' => 'form-control', 'placeholder' => trans('lang.select_locations'))) !!}

                                                </div>

                                                <div class="form-group form-group-half">
                                                    <label>{{ trans('lang.your_address') }}</label>
                                                    {!! Form::text( 'address', null, ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}

                                                </div>

                                                <div class="form-group wt-formmap">

                                                    @include('includes.map')

                                                </div>

                                                <div class="form-group form-group-half d-none">

                                                    {!! Form::text( 'longitude', null, ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]) !!}

                                                </div>

                                                <div class="form-group form-group-half d-none">

                                                    {!! Form::text( 'latitude', null, ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]) !!}

                                                </div>

                                            </fieldset>

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
                                                    
                                                    <image-attachments :temp_url="'{{url('service/upload-temp-image')}}'" :type="'image'"></image-attachments>

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

                                {!! Form::submit(trans('lang.post_service'), ['class' => 'btn btn-primary float-right', 'id'=>'submit-service']) !!}

                            </div> --}}
                            <div class="row justify-content-center">
                                {!! Form::submit(trans('lang.post_service'), ['class' => 'wt-btn shadow-none lift', 'id'=>'submit-service']) !!}
                            </div>

                        {!! form::close(); !!}

                    </div>
                

        </div>

    </div>

</div>

@endsection

