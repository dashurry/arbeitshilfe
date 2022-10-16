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
option[value=""] {
  display: none;
}
option {
  color: #313889;
  font-style: normal;
}
.wt-userformvtwo .form-group select{
    font-style: normal;
    color: #313889;
}
</style>

<div class="wt-haslayout wt-dbsectionspace">

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder" id="services">

                <div class="preloader-section" v-if="loading" v-cloak>

                    <div class="preloader-holder">

                        <div class="loader"></div>

                    </div>

                </div>

                        <div class="wt-haslayout wt-post-job-wrap">

                            {!! Form::open(['url' => '', 'class' =>'wt-haslayout', 'id' => 'update_service_form',  '@submit.prevent'=>'updateService("'.$service->id.'")']) !!}

                                <div class="wt-dashboardbox">

                                    <div class="wt-dashboardboxtitle">

                                        <h2>{{ trans('lang.update_service') }}</h2>

                                    </div>

                                    <div class="wt-dashboardboxcontent">

                                        <div class="wt-jobdescription wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>Gib deinem Dienst einen aussagekräftigen Titel
                                                    {{-- {{ trans('lang.service_desc') }} --}}
                                                </h2>
                                                

                                            </div>

                                            <div class="wt-formtheme wt-userform wt-userformvtwo">

                                                <fieldset>

                                                    <div class="form-group">

                                                        {!! Form::text('title', e($service->title), array('class' => 'form-control', 'placeholder' => trans('lang.service_title'))) !!}

                                                    </div>

                                                </fieldset>

                                            </div>

                                        </div>

                                        <div class="wt-jobdescription wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>Wie viel soll der Dienst kosten?
                                                    {{-- {{ trans('lang.service_desc') }} --}}
                                                </h2>
                                                <p class="text-muted mt-1"><em>Gib einen Bereich für dein Budget an oder lege ein fixes Budget fest. 
                                                    Tipp: Bei einer Preisspanne ist die Chance für mehr Angebote grösser.</em></p>

                                            </div>

                                            <div class="wt-formtheme wt-userform wt-userformvtwo">

                                                <fieldset>
                                                    
                                                    <div class="form-group form-group-half">

                                                        {!! Form::number('service_price', e($service->price), array('class' => 'form-control', 'placeholder' => trans('lang.service_price'))) !!}

                                                    </div>

                                                </fieldset>

                                            </div>

                                        </div>

                                        <div class="wt-jobdescription wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>Datum wählen
                                                    {{-- {{ trans('lang.service_desc') }} --}}
                                                </h2>
                                                <p class="text-muted mt-1"><em>Hier kannst du wählen, ob dein Dienst innerhalb einer bestimmten Zeit erledigt wird.</em></p>

                                            </div>

                                            <div class="wt-formtheme wt-userform wt-userformvtwo">

                                                <fieldset>
                                                    
                                                    <div class="form-group form-group-half wt-formwithlabel">

                                                            {!! Form::select('delivery_time', $delivery_time, e($service->delivery_time_id), array('class' => 'form-control', 'placeholder' => trans('lang.select_delivery_time'))) !!}

                                                    </div>

                                                </fieldset>

                                            </div>

                                        </div>

                                        <div class="wt-jobcategories wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>Wähle eine Kategorie aus
                                                    {{-- {{ trans('lang.service_cats') }} --}}
                                                </h2>

                                            </div>

                                            <div class="wt-divtheme wt-userform wt-userformvtwo">

                                                <div class="form-group">

                                                    <span class="wt-select">

                                                        {!! Form::select('categories[]', $categories, $service->categories, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_service_cats'))) !!}

                                                    </span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="wt-languages-holder wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>{{ trans('lang.service_response_time') }}</h2>

                                            </div>

                                            <div class="wt-divtheme wt-userform wt-userformvtwo">

                                                <div class="form-group">

                                                    {!! Form::select('response_time', $response_time, e($service->response_time_id), array('class' => 'form-control', 'placeholder' => trans('lang.select_response_time'))) !!}

                                                </div>

                                            </div>

                                        </div>

                                        

                                        {{-- <div class="form-group form-group-half wt-formwithlabel">

                                            <div class="wt-tabscontenttitle">

                                                <h2>{{ trans('lang.english_level') }}</h2>

                                            </div>

                                            <div class="wt-divtheme wt-userform wt-userformvtwo">

                                                <div class="form-group">

                                                    <span class="wt-select">

                                                        {!! Form::select('english_level', $english_levels, e($service->english_level), array('class' => '', 'placeholder' => trans('lang.select_english_level'))) !!}

                                                    </span>

                                                </div>

                                            </div>

                                        </div> --}}

                                        <div class="wt-jobdetails wt-tabsinfo d-flex">

                                            <div class="col-md-4 wt-tabscontenttitle">

                                                <h2>{{ trans('lang.service_desc') }}</h2>
                                                <p class="text-muted mt-1"><em>Beschreibe möglichst genau welche Art von Dienstleistung du anbittest.</em></p>

                                            </div>

                                            <div class="wt-formtheme wt-userform wt-userformvtwo">

                                                {!! Form::textarea('description', e($service->description), ['class' => 'form-control', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.service_desc')]) !!}

                                            </div>

                                        </div>

                                        <div class="wt-joblocation wt-tabsinfo">

                                            <div class="wt-tabscontenttitle">

                                                <h2>{{ trans('lang.your_loc') }}</h2>

                                            </div>

                                            <div class="wt-formtheme wt-userform">

                                                <fieldset>

                                                    <div class="form-group form-group-half">

                                                        {!! Form::select('locations', $locations, e($service->location_id), array('class' => 'form-control', 'placeholder' => trans('lang.select_locations'))) !!}

                                                    </div>

                                                    <div class="form-group form-group-half">

                                                        {!! Form::text( 'address', e($service->address), ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}

                                                    </div>

                                                    <div class="form-group wt-formmap">

                                                        @include('includes.map')

                                                    </div>

                                                    <div class="form-group form-group-half d-none">

                                                        {!! Form::text( 'longitude', e($service->longitude), ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]) !!}

                                                    </div>

                                                    <div class="form-group form-group-half d-none">

                                                        {!! Form::text( 'latitude', e($service->latitude), ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]) !!}

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

                                        @if (!empty($freelancer))

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

                                                                    @if (!empty($attachments))

                                                                        @php $count = 0; @endphp

                                                                        @foreach ($attachments as $key => $attachment)

                                                                        <li id="attachment-item-{{$key}}">

                                                                            <span>{{{Helper::formateFileName($attachment)}}}</span>

                                                                            <em>

                                                                                @if (Storage::disk('local')->exists('uploads/services/'.$freelancer->user_id.'/'.$attachment))

                                                                                    {{ trans('lang.file_size') }} {{{Helper::bytesToHuman(Storage::size('uploads/services/'.$freelancer->user_id.'/'.$attachment))}}}

                                                                                @endif

                                                                                <a href="{{{route('getfile', ['type'=>'services','attachment'=>$attachment,'id'=>$freelancer->user_id])}}}"><i class="lnr lnr-download"></i></a>

                                                                                <a href="#" v-on:click.prevent="deleteAttachment('attachment-item-{{$key}}')"><i class="lnr lnr-cross"></i></a>

                                                                            </em>

                                                                            <input type="hidden" value="{{{$attachment}}}" class="" name="attachments[{{$key}}]">

                                                                        </li>

                                                                        @php $count++; @endphp

                                                                        @endforeach

                                                                    @endif

                                                                </ul>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @endif

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

</div>

@endsection

