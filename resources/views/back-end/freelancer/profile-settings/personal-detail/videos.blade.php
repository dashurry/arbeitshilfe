<div>

    <h2>{{{ trans('lang.videos') }}}</h2>

</div>

<div>

        @if (!empty($videos))

            @php $counter = 0 @endphp

            @foreach ($videos as $video_key => $mem_value)
            
                    <div class="form-group media align-items-center">

                        <div class="media-body">

                            {!! Form::text('video['.$counter.'][url]', e($mem_value['url']),['class' => 'form-control', 'placeholder' => trans('lang.video_url')] ) !!}

                        </div>

                            @if ($video_key == 0 )

                                <span class="badge badge-primary shadow-none ml-3" @click="addVideo"><i class="material-symbols-outlined">add</i></span> 

                            @else

                                <span class="badge badge-danger shadow-none ml-3" data-check="{{{$counter}}}"><i class="material-symbols-outlined">delete</i></span>

                            @endif

                    </div>

                @php $counter++; @endphp

            @endforeach

        @else

            <div>

                <div class="form-group media align-items-center">

                    <div class="media-body">

                        {!! Form::text('video[0][url]', null, ['class' => 'form-control', 'placeholder' => trans('lang.video_url')])!!}

                    </div>

                        <span class="badge badge-primary shadow-none ml-3" @click="addVideo"><i class="material-symbols-outlined">add</i></span>

                </div>

            </div>

        @endif

            <div v-for="(video, index) in videos" v-cloak>

                <div>

                    <div class="form-group media align-items-center">

                        <div class="media-body">

                            <input v-bind:name="'video['+[video.count]+'][url]'" type="text" class="form-control" v-model="video.url" placeholder="{{trans('lang.video_url')}}">

                        </div>

                            <span class="badge badge-danger shadow-none ml-3" @click="removeVideo(index)"><i class="material-symbols-outlined">delete</i></span>

                    </div>

                </div>

            </div>

</div>

