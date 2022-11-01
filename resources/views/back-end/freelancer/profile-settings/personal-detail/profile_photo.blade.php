<div>
    <div>

        <h2>{{{ trans('lang.profile_photo') }}}</h2>

    </div>

    <div class="wt-settingscontent">

        @if (!empty($avater))

            @php $image = '/uploads/users/'.Auth::user()->id.'/'.$avater; @endphp

            <div class="wt-userform">

                <div v-if="this.uploaded_image">

                    <upload-image 

                        :id="'avater_id'" 

                        :img_ref="'avater_ref'" 

                        :url="'{{url('freelancer/upload-temp-image')}}'"

                        :name="'hidden_avater_image'"

                        >

                    </upload-image>

                </div>

                <div class="card" v-else>

                    <img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_photo') }}}">

                    <div class="card-body">

                        <h6 class="card-title">{{{$avater}}}</h6>

                        <p class="card-text d-flex justify-content-between">{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="material-symbols-outlined text-decoration-none text-danger" v-on:click.prevent="removeImage('hidden_avater')">close</a></p>

                    </div>

                </div>

                <input type="hidden" name="hidden_avater_image" id="hidden_avater" value="{{{$avater}}}"> 

            </div>

        @else

            <div class="wt-formtheme wt-userform">

                <upload-image 

                    :id="'avater_id'" 

                    :img_ref="'avater_ref'" 

                    :url="'{{url('freelancer/upload-temp-image')}}'"

                    :name="'hidden_avater_image'"

                    >

                </upload-image>

                <input type="hidden" name="hidden_avater_image" id="hidden_avater" value=""> 

            </div>

        @endif

    </div>

</div>

