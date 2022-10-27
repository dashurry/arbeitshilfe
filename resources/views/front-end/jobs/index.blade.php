
@php
    use App\Profile;
    $savedJobs = Profile::where("user_id",auth()->user()->id)->first()->saved_jobs;
    $savedJobs = unserialize($savedJobs);
@endphp

@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 

'extend.front-end.master':

 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )

@section('title'){{ $job_list_meta_title }} @stop

@section('description', $job_list_meta_desc)

@section('content')
    {{-- New codes ## --}}

    {{-- Breadcumb --}}
    @if (Session::has('payment_message'))

        @php $response = Session::get('payment_message') @endphp
        <div class="flash_msg">

            <flash_messages :message_class="'{{{$response['code']}}}'" :time ='5' :message="'{{{ $response['message'] }}}'" v-cloak></flash_messages>

        </div>
    @endif
    <section class="text-center mt-5 mb-5">
        <div class="container">
            <div>
                <h1 class="display-3">Aufträge Entdecken</h1>
                <ul class="d-flex justify-content-center">
                    <li><a href="/" class="mr-2 text-dark">Home </a> /</li>
                    <li class="ml-2">Jobs</li>
                </ul> 
            </div>
        </div>
    </section>

    <section id="jobFilter" class="ls-section bg-white pt-5 pb-5">
        <jobfilter-section 
        :categories="{{ json_encode($categories) }}"
        :locations="{{ json_encode($locations) }}"
        :skills="{{ json_encode($skills) }}"
        :project_length="{{ json_encode($project_length) }}"
        :jobs="{{ json_encode($jobs) }}"
        :my_saved_jobs="{{ json_encode($saved_jobs) }}"
        ></jobfilter-section>
    </section>
    
    {{-- End --}}

    @endsection

