@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 

'extend.front-end.master':

 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )

@section('content')

    @php $breadcrumbs = Breadcrumbs::generate('createProposal', $job->slug); @endphp

    @if (file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php')))

        @include('extend.front-end.includes.inner-banner', 

            ['title' => trans('lang.job_proposal'), 'inner_banner' => '', 'show_banner' => 'true' ]

        )

    @else 

        @include('front-end.includes.inner-banner', 

            ['title' =>  trans('lang.job_proposal'), 'inner_banner' => '', 'show_banner' => 'true' ]

        )

    @endif

<style>
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
body h2{
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
    color: #313889;
}
option[value=""] {
  display: none;
}
.wt-tabscontenttitle h2{
    margin: 0;
    display: block;
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
}
</style>

    <div id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">

        <div class="wt-haslayout wt-main-section">

            <div class="container-fluid">

                <div class="row justify-content-md-center">

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left">

                    </div> 

                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 push-lg-2" id="jobs">

                        <div class="preloader-section" v-if="loading" v-cloak>

                            <div class="preloader-holder">

                                <div class="loader"></div>

                            </div>

                        </div>

                        <div class="wt-jobalertsholder la-jobalerts-holder">

                            <ul class="wt-jobalerts">

                                @if ($submitted_proposals_count > 0)

                                    <li class="alert alert-danger alert-dismissible fade show">

                                        <span>{{{ trans('lang.proposal_already_submitted') }}}</span>

                                        <a href="javascript:void(0)" class="wt-alertbtn danger close" data-dismiss="alert" aria-label="Close">Verstanden</a>

                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close">

                                            <i class="material-symbols-outlined">close</i>

                                        </a>

                                    </li>

                                @endif

                                @if ($job->status != 'posted')

                                    <li class="alert alert-danger alert-dismissible fade show">

                                        <span>{{{ trans('lang.hired_freelancer_note') }}}</span>

                                        <a href="javascript:void(0)" class="wt-alertbtn danger close" data-dismiss="alert" aria-label="Close">Verstanden</a>

                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close">

                                            <i class="material-symbols-outlined">close</i>

                                        </a>

                                    </li>

                                @endif

                                @if (!empty($check_skill_req))

                                    <li class="alert alert-primary alert-dismissible fade show">

                                        <span><em>{{trans('lang.info')}}: </em> {{{ trans('lang.skill_req_freelancer_note') }}}</span>

                                        <a href="javascript:void(0)" class="wt-alertbtn primary close" data-dismiss="alert" aria-label="Close">Verstanden</a>

                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-symbols-outlined">close</i>
                                        </a>

                                    </li>

                                @endif

                                @if ($remaining_proposals <= $submitted_proposals)

                                    <li class="alert alert-warning alert-dismissible fade show d-flex justify-content-between align-items-center">

                                        <span><em>{{trans('lang.info')}}: </em>  Sie haben alle Punkte für die Bewerbung um eine neue Stelle verbraucht</span>

                                        <a href="javascript:void(0)" class="wt-alertbtn primary close" data-dismiss="alert" aria-label="Close">Verstanden</a>

                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-symbols-outlined">close</i>
                                        </a>

                                    </li>

                                @endif



                            </ul>

                        </div>

                        <div class="wt-proposalholder">

                            @if (!empty($job->is_featured) && $job->is_featured === 'true')

                                <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{{ trans('lang.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                            @endif

                            <div class="wt-proposalhead">

                                @if (!empty($job->title))

                                    <h1>{{{ $job->title }}}</h1>

                                @endif

                                <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">

                                    {{-- @if (!empty($job->price))

                                        <li>

                                            <span class="d-flex align-items-center">

                                                   <i class="wt-viewjobdollar mr-2">{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i>
                                                    {{{ $job->price }}}

                                            </span>

                                        </li>

                                    @endif --}}

                                    @if (!empty($job->location->title))

                                        <li>
                                            <span class="d-flex align-items-center">
                                            <i class="material-symbols-outlined">home_pin</i>
                                            {{-- <img src="{{{asset(Helper::getLocationFlag($job->location->flag))}}}" alt="{{ trans('lang.img') }}"> --}}
                                             {{{ $job->location->title }}}
                                            </span>
                                        </li>

                                    @endif

                                    {{-- @if (!empty($job->project_type))

                                        @php $project_type  = Helper::getProjectTypeList($job->project_type); @endphp

                                        <li><span class="wt-clicksavefolder"><img class="wt-job-icon" src="{{asset('images/job-icons/job-type.png')}}"> {{ trans('lang.type') }} {{{ $project_type }}}</span></li>

                                    @endif --}}

                                    @if (!empty($job->duration))

                                        <li>
                                            <span class="wt-dashboradclock d-flex align-items-center">
                                                {{-- <img class="wt-job-icon" src="{{asset('images/job-icons/job-duration.png')}}"> {{ trans('lang.duration') }} --}}
                                                <i class="material-symbols-outlined">date_range</i>
                                                 {{{ Helper::getJobDurationList($job->duration) }}}
                                            </span>
                                        </li>

                                    @endif

                                </ul>

                            </div>

                        </div>

                        <div class="wt-proposalamount-holder">

                            <div class="wt-title pb-0 mb-0">

                                <h2>{{{ trans('lang.proposal_amount') }}}</h2>

                            </div>

                            {!! Form::open(['url' => url('proposal/submit-proposal'), 'class' =>'wt-haslayout', 'id' => 'send-propsal',  '@submit.prevent'=>'submitJobProposal('.$job->id.', '.Auth::user()->id.')']) !!}

                                <div class="wt-proposalamount accordion bg-transparent">

                                    <div class="form-group">
                                        
                                        {{-- <span class="d-flex">
                                            <i class="mr-2">{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i>
                                        </span> --}}

                                        {!! Form::input('text', 'amount', null, ['class' => 'form-control', 'min' => 1, 'placeholder' => trans('lang.ph_proposal_amount'), 'data-type'=> 'currency', 'v-model'=>'proposal.amountString', 'v-on:keyup' => "calculate_amount('$commision')" ])!!}

                                        <a href="javascript:void(0);" class="collapsed d-flex justify-content-center" id="headingOne" data-toggle="collapse"

                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                            <i class="material-symbols-outlined m-2"></i>

                                        </a>

                                        <p class="text-muted mt-1">
                                            <em>{{{ trans('lang.amount_note') }}}</em>
                                        </p>

                                    </div>

                                    <ul class="wt-totalamount collapse show" id="collapseOne" aria-labelledby="headingOne">

                                        <li v-cloak>

                                            <h3>CHF
                                                {{-- ( <i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> ) --}}
                                                 <em>- @{{this.proposal.deduction}}</em>
                                            </h3>

                                            <span class="d-flex align-items-center">

                                                <strong>“ {{{ trans('lang.worketic') }}} ”</strong>

                                                 {{{ trans('lang.service_fee') }}}

                                                <i class="material-symbols-outlined template-content tipso_style" data-tipso="Plus Member">error</i>

                                            </span>

                                        </li>

                                        <li v-cloak>

                                            <h3>CHF
                                                {{-- ( <i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> ) --}}
                                                 <em>- @{{this.proposal.total}}</em>
                                            </h3>

                                            <span class="d-flex align-items-center">

                                                {{{ trans('lang.receiving_amount') }}} 
                                                {{-- <strong>“ {{{ trans('lang.receiving_amount') }}} ”</strong> --}}

                                                {{-- {{{ trans('lang.fee_deduction') }}} --}}

                                                <i class="material-symbols-outlined template-content tipso_style" data-tipso="Plus Member">error</i>

                                            </span>

                                        </li>

                                    </ul>

                                </div>

                                <div class="wt-formtheme wt-formproposal">

                                    <fieldset>

                                        <div class="form-group">

                                            <span class="wt-select">

                                                {!! Form::select('completion_time', $job_completion_time, null, array('class' => 'form-control', 'v-model'=>'proposal.completion_time', 'onchange' => 'this.dataset.chosen = this.value;', 'placeholder' => trans('lang.ph_job_completion_time') )) !!}

                                            </span>

                                        </div>

                                        <div class="form-group">

                                            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => '', 'placeholder' =>  trans('lang.ph_cover_letter') , 'v-model'=>'proposal.description']) !!}

                                        </div>

                                    </fieldset>
                                    
                                    <div class="wt-attachments wt-attachmentsvtwo wt-attachmentsholder lara-proposal-attachment">

                                        <div class="lara-attachment-files">

                                            {{-- <div class="wt-title">

                                                <h3>{{{ trans('lang.upload_file') }}}</h3>

                                            </div> --}}

                                            <div class="wt-tabscontenttitle">
                                                
                                                <h2>Dateien hochladen</h2>

                                                <p class="text-muted mt-1"><em>Hier kannst du Dateien, Bilder oder Videos hochladen.</em></p>

                                            </div>

                                            <job_attachments :temp_url="'{{url('proposal/upload-temp-image')}}'"></job_attachments>

                                            <div class="form-group input-preview">

                                                <ul class="wt-attachfile dropzone-previews">



                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="wt-btnarea">
                                        
                                        {!! Form::submit(trans('lang.btn_send'), ['class' => 'wt-btn lift shadow-none']) !!}

                                    </div>

                                </div>

                            {!! form::close(); !!}

                        </div>

                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">

                        <aside id="wt-sidebar" class="wt-sidebar">

                            <div class="wt-proposalsr d-flex flex-column">
                        
                                <div class="wt-proposalsrcontent">
                        
                                    <span class="wt-proposalsicon">

                                        <i class="material-symbols-outlined">keyboard_double_arrow_down</i>

                                        <i class="material-symbols-outlined fa-1x">attach_money</i>

                                    </span>
                        
                                    <div class="wt-title">
                        
                                        <h3>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }} {{{ $job->price }}}</h3>
                        
                                        <span>{{ trans('lang.client_budget') }}</span>
                        
                                    </div>
                        
                                </div>

                            </div>
                        
                        </aside>

                    </div>

                </div>

            </div>

        </div>

    </div>
 @endsection
 
@push('scripts')
    <script>

    $("input[data-type='currency']").on({
        keyup: function() {
        formatCurrency($(this));
        },
        blur: function() { 
        formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends CHF to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");
        
    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
        right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "CHF " + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "CHF " + input_val;
        
        // final formatting
        if (blur === "blur") {
        input_val += ".00";
        }
    }
    
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }

    </script>
@endpush


