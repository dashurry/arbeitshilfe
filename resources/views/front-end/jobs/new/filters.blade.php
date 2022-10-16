<div class="filters-column col-lg-4 col-md-12 col-sm-12">
    <div class="inner-column">
        <div class="filters-outer">
            <button type="button" class="theme-btn close-filters">X</button>
            
            {!! Form::open(['url' => url('search-results'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']) !!}

            <input type="hidden" value="{{$type}}" name="type">


            <!-- Filter Block -->
            <div class="filter-block">
                <h4>{{ trans('lang.seach_by_geo_loc') }}</h4>
                <div class="form-group">
                    <input type="text" name="addr" placeholder="{{ trans('lang.geo_loc') }}" id="pac-input">
                    <i class="icon fas fa-map-marker-alt"></i>
                </div>
            </div>

            <!-- Filter Block -->
            <div class="filter-block">
                <h4>{{ trans('lang.start_search') }}</h4>
                <div class="form-group">
                    <input type="text" name="s" placeholder="{{ trans('lang.ph_search_jobs') }}" value="{{$keyword}}">
                    <i class="icon fas fa-search"></i>
                </div>
            </div>


            <!-- Switchbox Outer -->
            <div class="switchbox-outer">
                <h4>{{ trans('lang.cats') }}</h4>
                <ul class="switchbox">
                    @foreach ($categories as $category)

                        @php $checked = ( !empty($_GET['category']) && in_array($category->slug, $_GET['category'] )) ? 'checked' : ''; @endphp

                        <li>
                            <label class="switch">
                                <input type="checkbox" {{$checked}} id="cat-{{{ $category->slug }}}" name="category[]">
                                <span class="slider round"></span>
                                <span class="title">{{ $category->title }}</span>
                            </label>
                        </li>

                    @endforeach
                   
                </ul>
            </div>

            <!-- Checkboxes Ouer -->
            <div class="checkbox-outer">
                <h4>{{ trans('lang.locations') }}</h4>
                <ul class="checkboxes">
                    @foreach ($locations as $location)

                        @php 

                            $checked = '';

                            if (!empty($_GET['locations'])) {

                                if (is_array($_GET['locations']) && in_array($location->slug, $_GET['locations'])) {

                                    $checked = 'checked';

                                } elseif ( $location->slug == $_GET['locations']) {

                                    $checked = 'checked';     

                                }

                            } 

                        @endphp
                        <li>
                            <input id="location-{{{ $location->slug }}}" type="checkbox" name="locations[]" value="{{{$location->slug}}}" {{$checked}}>
                            <label for="location-{{{ $location->slug }}}">{{ $location->title }}</label>                            
                        </li>

                    @endforeach

                </ul>
            </div>

            <!-- Checkboxes Ouer -->
            <div class="checkbox-outer">
                <h4>{{ trans('lang.skills') }}</h4>
                <ul class="checkboxes">
                    @foreach ($skills as $key => $skill)

                        @php $checked = (!empty($_GET['skills']) && in_array($skill->slug, $_GET['skills'])) ? 'checked' : '' @endphp

                        <li>
                            <input id="skill-{{{ $key }}}" type="checkbox" name="skills[]" value="{{{$skill->slug}}}" {{$checked}}>
                            <label for="skill-{{{ $key }}}">{{{ $skill->title }}}</label>                            
                        </li>

                    @endforeach

                </ul>
            </div>

            <!-- Checkboxes Ouer -->
            <div class="checkbox-outer">
                <h4>{{ trans('lang.project_length') }}</h4>
                <ul class="checkboxes">
                    @foreach ($project_length as $key => $length)

                        @php $checked = ( !empty($_GET['project_lengths']) && in_array($length, $_GET['project_lengths'])) ? 'checked' : '' @endphp
                        <li>
                            <input id="{{{ $key }}}" type="checkbox" name="project_lengths[]" value="{{{$key}}}" {{$checked}}>
                            <label for="{{{ $key }}}">{{{ $length }}}</label>                            
                        </li>

                    @endforeach

                </ul>
            </div>

            <div class="filter-block">
                <div class="form-group">
                    <div class="wt-applyfilters">

                        <span>{{ trans('lang.apply_filter') }}<br> {{ trans('lang.changes_by_you') }}</span>
    
                        {!! Form::submit(trans('lang.btn_apply_filters'), ['class' => 'wt-btn bg-success']) !!}
    
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('scripts')

    <script id="apiScript" async defer></script>

    <script>

        var url='https://maps.googleapis.com/maps/api/js?key=' + Map_key + '&libraries=places&callback=initMap'

        document.getElementById('apiScript').src = url;

    </script>

    <script>

        function initMap() {

            var input = document.getElementById('pac-input');

            var autocomplete = new google.maps.places.Autocomplete(input);

    

            // Set the data fields to return when the user selects a place.

            autocomplete.setFields(

                ['address_components', 'geometry', 'icon', 'name']

            );

        }

    </script>

@endpush