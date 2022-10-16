<aside id="wt-sidebar" class="wt-sidebar">

    {!! Form::open(['url' => url('search-results'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']) !!}

        <input type="hidden" value="{{$type}}" name="type">

        <div class="wt-widget wt-effectiveholder wt-startsearch">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.seach_by_geo_loc') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <div class="wt-formtheme wt-formsearch">

                    <fieldset>

                        <div class="form-group">

                            <input id="pac-input" type="text" name="addr" class="form-control" placeholder="{{ trans('lang.geo_loc') }}" value="{{$address}}">

                        </div>

                    </fieldset>

                </div>

            </div>

        </div>

        <div class="wt-widget wt-effectiveholder wt-startsearch">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.start_search') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <div class="wt-formtheme wt-formsearch">

                    <fieldset>

                        <div class="form-group">

                            <input type="text" name="s" class="form-control" placeholder="{{ trans('lang.ph_search_jobs') }}" value="{{$keyword}}">

                        </div>

                    </fieldset>

                </div>

            </div>

        </div>

        {{-- <div class="wt-widget wt-widgetrange">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.price_range') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <div class="wt-formtheme wt-formsearch">

                    <fieldset>

                        <div class="wt-amountbox">

                            <input type="text" :value="'{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}'+start+'-{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}'+end" id="wt-consultationfeeamount" readonly="">

                        </div>

                        <a-slider 

                            id="wt-pricerange"

                            class="wt-productrangeslider wt-themerangeslider"

                            range

                            :min="0" 

                            :max="max_value"

                            :reverse="reverse"

                            @change="onChange" 

                            :default-value="[start, end]"

                            ref="priceRange"

                            v-if="show_price_slider"

                        />

                    </fieldset>

                    <input type="hidden" name="minprice" :value="start">

                    <input type="hidden" name="maxprice" :value="end">

                </div>

            </div>

        </div> --}}

        <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.cats') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <fieldset>

                    <div class="form-group">

                        <input type="text" class="form-control filter-records" placeholder="{{ trans('lang.ph_search_cat') }}">

                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>

                    </div>

                </fieldset>

                <fieldset>

                    @if (!empty($categories))

                        <div class="wt-checkboxholder wt-verticalscrollbar">

                            @foreach ($categories as $category)

                                @php $checked = ( !empty($_GET['category']) && in_array($category->slug, $_GET['category'] )) ? 'checked' : ''; @endphp

                                <span class="wt-checkbox">

                                    <input id="cat-{{{ $category->slug }}}" type="checkbox" name="category[]" value="{{{ $category->slug }}}" {{$checked}} >

                                    <label for="cat-{{{ $category->slug }}}"> {{{ $category->title }}}</label>

                                </span>

                            @endforeach

                        </div>

                    @endif

                </fieldset>

            </div>

        </div>

        <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.locations') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <fieldset>

                    <div class="form-group">

                        <input type="text" class="form-control filter-records" placeholder="{{ trans('lang.ph_search_locations') }}">

                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>

                    </div>

                </fieldset>

                <fieldset>

                    @if (!empty($locations))

                        <div class="wt-checkboxholder wt-verticalscrollbar">

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

                                <span class="wt-checkbox">

                                    <input id="location-{{{ $location->slug }}}" type="checkbox" name="locations[]" value="{{{$location->slug}}}" {{$checked}} >

                                    <label for="location-{{{ $location->slug }}}"> {{-- <img src="{{{asset(Helper::getLocationFlag($location->flag))}}}" alt="{{ trans('lang.img') }}"> --}} {{{ $location->title }}}</label>

                                </span>

                            @endforeach

                        </div>

                    @endif

                </fieldset>

            </div>

        </div>

        <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.skills') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <fieldset>

                    @if (!empty($skills))

                        <div class="wt-checkboxholder wt-verticalscrollbar">

                            @foreach ($skills as $key => $skill)

                                @php $checked = (!empty($_GET['skills']) && in_array($skill->slug, $_GET['skills'])) ? 'checked' : '' @endphp

                                <span class="wt-checkbox">

                                    <input id="skill-{{{ $key }}}" type="checkbox" name="skills[]" value="{{{$skill->slug}}}" {{$checked}} >

                                    <label for="skill-{{{ $key }}}">{{{ $skill->title }}}</label>

                                </span>

                            @endforeach

                        </div>

                    @endif

                </fieldset>

            </div>

        </div>

        <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.project_length') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <fieldset>

                    @if (!empty($project_length))

                        <div class="wt-checkboxholder">

                            @foreach ($project_length as $key => $length)

                                @php $checked = ( !empty($_GET['project_lengths']) && in_array($length, $_GET['project_lengths'])) ? 'checked' : '' @endphp

                                <span class="wt-checkbox">

                                    <input id="{{{ $key }}}" type="checkbox" name="project_lengths[]" value="{{{$key}}}" {{$checked}}>

                                    <label for="{{{ $key }}}">{{{ $length }}}</label>

                                </span>

                            @endforeach

                        </div>

                    @endif

                </fieldset>

            </div>

        </div>

        {{-- <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgettitle">

                <h2>{{ trans('lang.langs') }}</h2>

            </div>

            <div class="wt-widgetcontent">

                <fieldset>

                    <div class="form-group">

                        <input type="text" class="form-control filter-records" placeholder="{{ trans('lang.ph_search_langs') }}">

                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>

                    </div>

                </fieldset>

                <fieldset>

                    @if (!empty($languages))

                        <div class="wt-checkboxholder wt-verticalscrollbar">

                            @foreach ($languages as $language)

                                @php $checked = ( !empty($_GET['languages']) && in_array($language->slug, $_GET['languages'])) ? 'checked' : '' @endphp

                                <span class="wt-checkbox">

                                    <input id="language-{{{ $language->slug }}}" type="checkbox" name="languages[]" value="{{{$language->slug}}}" {{$checked}} >

                                    <label for="language-{{{ $language->slug }}}">{{{ $language->title }}}</label>

                                </span>

                            @endforeach

                        </div>

                    @endif

                </fieldset>

            </div>

        </div> --}}

        <div class="wt-widget wt-effectiveholder">

            <div class="wt-widgetcontent">

                <div class="wt-applyfilters">

                    <span>{{ trans('lang.apply_filter') }}<br> {{ trans('lang.changes_by_you') }}</span>

                    {!! Form::submit(trans('lang.btn_apply_filters'), ['class' => 'wt-btn']) !!}

                </div>

            </div>

        </div>

    {!! Form::close() !!}

</aside>

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