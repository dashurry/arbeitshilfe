<div class="d-flex justify-content-center">
    
    <div class="w-100">

        <ul class="nav nav-tabs"> 

                <li class="nav-item">

                    <a class="{{{ \Request::route()->getName()==='personalDetail'? 'bg-white ': '' }}} nav-link lift" href="{{{ route('personalDetail') }}}">{{{ trans('lang.personal_detail') }}}</a>

                </li>

                <li class="nav-item">

                    <a class="{{{ \Request::route()->getName()==='experienceEducation'? 'bg-white': '' }}} nav-link lift" href="{{{ route('experienceEducation') }}}">{{{ trans('lang.experience_education') }}}</a>

                </li>

                <li class="nav-item">

                    <a class="{{{ \Request::route()->getName()==='projectAwards'? 'bg-white': '' }}} nav-link lift" href="{{{ route('projectAwards') }}}">{{{ trans('lang.project_awards') }}}</a>

                </li>
        </ul>

    </div>

</div>
