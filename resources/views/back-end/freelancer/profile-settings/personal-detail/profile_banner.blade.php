<div class="wt-location wt-tabsinfo">

    {{-- <div class="wt-tabscontenttitle"> --}}
    <div>

        <h2>{{{ trans('lang.banner_photo') }}}</h2>

    </div>

    <div class="wt-settingscontent">

        @if (!empty($banner))

            @php $image = '/uploads/users/'.Auth::user()->id.'/'.$banner; @endphp

            <div class="wt-userform">

                <div v-if="this.uploaded_banner">

                    <upload-image 

                        :id="'banner_id'" 

                        :img_ref="'banner_ref'" 

                        :url="'{{url('freelancer/upload-temp-image')}}'"

                        :name="'hidden_banner_image'"

                        >

                    </upload-image>

                </div>

                <div class="card" v-else>

                    <img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_photo') }}}">

                    <div class="card-body">

                        <div class="card-title">{{{$banner}}}</div>

                        <p class="card-text d-flex justify-content-between">{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="material-symbols-outlined text-decoration-none text-danger" v-on:click.prevent="removeBanner('hidden_banner')">close</a></p>

                    </div>

                </div>

                <input type="hidden" name="hidden_banner_image" id="hidden_banner" value="{{{$banner}}}"> 

            </div>

        @else

            <div class="wt-formtheme wt-userform">

                <upload-image 

                    :id="'banner_id'" 

                    :img_ref="'banner_ref'" 

                    :url="'{{url('freelancer/upload-temp-image')}}'"

                    :name="'hidden_banner_image'"

                    >

                </upload-image>

                <input type="hidden" name="hidden_banner_image" id="hidden_banner"> 

            </div>

        @endif

    </div>

</div>

