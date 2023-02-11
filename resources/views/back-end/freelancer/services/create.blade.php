@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="services">

            {{-- Loader --}}
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>

            {{-- Form --}}    
            {!! Form::open(['url' => '', 'id' => 'post_service_form',  '@submit.prevent'=>'submitService']) !!}

                {{-- Form Title --}}
                <div class="border-bottom p-4">
                    <h2>{{ trans('lang.post_service') }}</h2>
                </div>

                {{-- Service Titel --}}
                <div class="form-group row mt-4">
                    <label for="inputEmail" class="col-md-4 col-form-label">Gib deinem Auftrag einen aussagekräftigen Titel</label>
                    <div class="col-md-8">
                        <input type="text" name="title" id="inputEmail" class="form-control" placeholder="{{ trans('lang.service_title') }}" v-model="title">
                    </div>
                </div>

                {{-- Service Budget --}}
                <div class="form-group row mt-4">
                    <label for="inputEmail" class="col-md-4 col-form-label">Wie viel soll der Auftrag kosten?
                        <p class="text-muted mt-1">
                            <em>Gib einen Bereich für dein Budget an oder lege ein fixes Budget fest. 
                            Tipp: Bei einer Preisspanne ist die Chance für mehr Angebote grösser.</em>
                        </p>
                    </label>
                    <div class="col-md-8">
                        {!! Form::number('service_price', null, array('class' => 'form-control', 'placeholder' => trans('lang.service_price'), 'v-model'=>'price')) !!}
                    </div>
                </div>

                {{-- Service Duration --}}
                <div class="form-group row mt-4">
                    <label for="inputEmail" class="col-md-4 col-form-label">Datum wählen
                        <p class="text-muted mt-1">
                            <em>Hier kannst du wählen, wie lange dein Auftrag dauern wird, bis er abgeschlossen ist.</em>
                        </p>
                    </label>
                    <div class="col-md-8">
                        {!! Form::select('delivery_time', $delivery_time, null,array('class' => 'form-control', 'placeholder' => trans('lang.select_delivery_time'), 'v-model'=>'delivery_time')) !!}
                    </div>
                </div>

                {{-- Service Description --}}
                <div class="form-group row mt-4">
                    <label for="inputEmail" class="col-md-4 col-form-label">Was soll für dich erledigt werden?
                        <p class="text-muted mt-1">
                            <em>Beschreibe möglichst genau für welche Art von Dienstleistung du Hilfe suchst.</em>
                        </p>
                    </label>
                    <div class="col-md-8">
                        {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_desc')]) !!}
                        <p class="text-muted">
                            <em>
                                <small>Der Austausch von privaten Daten wie E-Mail-Adresse oder Telefonnummer ist nicht erlaubt. 
                                        Nach erfolgreicher Buchung können im Chat die privaten Daten ausgetauscht werden.
                                </small>
                            </em>
                        </p>
                    </div>
                </div>

                {{-- Service Location Title --}}
                <div class="form-group row mt-4 mb-4">
                    <h2>{{ trans('lang.your_loc') }}</h2>
                </div>
                

                {{-- Service Location --}}
                <div class="form-group form-group-half pr-2">
                    <label>{{ trans('lang.select_locations') }}</label>
                    {!! Form::select('locations', $locations, null, array("required" => true, 'class' => 'form-control', 'placeholder' => trans('lang.select_locations'))) !!}

                </div>

                {{-- Service Address --}}
                <div class="form-group form-group-half">
                    <label>{{ trans('lang.your_address') }}</label>
                    {!! Form::text( 'address', null, ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}

                </div>

                {{-- Service Map --}}
                <div class="form-group">
                    @include('includes.map')
                </div>

                {{-- Service Latitude --}}
                <div class="form-group form-group-half d-none">
                    {!! Form::text( 'longitude', null, ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]) !!}
                </div>

                {{-- Service Longitude --}}
                <div class="form-group form-group-half d-none">
                    {!! Form::text( 'latitude', null, ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]) !!}
                </div>

                {{-- Service Attachments --}}
                <div class="form-group row mt-4 mb-4 align-items-center">
                    <h2>{{ trans('lang.attachments') }}</h2>
                    <div class="col-md-8">
                        {{-- Vue.js component to render a toggle switch --}}
                        <switch_button v-model="show_attachments">{{{ trans('lang.attachments_note') }}}</switch_button>
                        <input type="hidden" :value="show_attachments" name="show_attachments">
                    </div>
                </div>
                <!-- Service Drag and drop file upload -->
                <div class="form-group row mt-4 mb-4 align-items-center">
                    <label for="inputEmail" class="col-md-4 col-form-label">Dateien hochladen
                        <p class="text-muted mt-1">
                            <em>Hier kannst du Dateien, Bilder oder Videos hochladen.</em>
                        </p>
                    </label>
                    <div class="col-md-8">
                        <image-attachments :temp_url="'{{url('service/upload-temp-image')}}'" :type="'image'"></image-attachments>
                        <div class="form-group input-preview">
                            <ul class="wt-attachfile dropzone-previews">
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Submit Form --}}
                <div class="row justify-content-center">
                    {!! Form::submit(trans('lang.post_service'), ['class' => 'btn btn-success shadow-none lift', 'id'=>'submit-service']) !!}
                </div>

            {!! form::close(); !!}
        </div>
    </div>
</div>

@endsection

