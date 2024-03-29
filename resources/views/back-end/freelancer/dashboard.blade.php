@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master') 
@section('content')
  <!-- Page Content -->
  <section id="dashboard">
    @if (Session::has('message')) 
        <div class="flash_msg">
            <flash_messages :message_class="'success'" :time='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
        </div> 
        @php session()->forget('message'); @endphp 
    @endif
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
        <div class="card">
          <div class="card-body text-center">
            <a href="{{{ route('message') }}}">
              <figure class="m-2">
                <i class="material-symbols-outlined text-white p-2 rounded-circle bg-primary">sms</i>
                <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.new_msgs') }}</p>
              </figure>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
        <div class="card">
          <div class="card-body text-center">
            <a href="{{url('freelancer/saved-items')}}">
              <figure class="m-2">
                <i class="material-symbols-outlined text-white p-2 rounded-circle bg-warning">favorite</i>
                <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.view_saved_items') }}</p>
              </figure>
            </a>
          </div>
        </div>
      </div>
      @if ($access_type == 'jobs' || $access_type== 'both')
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
        <div class="card">
          <div class="card-body text-center">
            <a href="{{{ url('freelancer/jobs/hired') }}}">
              <figure class="m-2">
                <i class="material-symbols-outlined text-white p-2 rounded-circle bg-info">settings</i>
                <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_projects') }}</p>
              </figure>
            </a>
          </div>
        </div>
      </div>
      @endif
      @if ($access_type == 'services' || $access_type== 'both')
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
        <div class="card">
          <div class="card-body text-center">
            <a href="{{{ url('freelancer/services/hired') }}}">
              <figure class="m-2">
                <i class="material-symbols-outlined text-white p-2 rounded-circle bg-info">history</i>
                <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_services') }}</p>
              </figure>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
        <div class="card">
          <div class="card-body text-center">
            <a href="{{{ url('freelancer/services/posted') }}}">
              <figure class="m-2">
                <i class="material-symbols-outlined text-white p-2 rounded-circle bg-primary">work_outline</i>
                <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_published_services') }}</p>
              </figure>
            </a>
          </div>
        </div>
      </div>
      @endif
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">
        <div class="wt-dashboardbox  wt-ongoingproject la-ongoing-projects">
          <div class="wt-dashboardboxtitle wt-titlewithsearch">
            <h2>{{ trans('lang.past_earnings') }}</h2>
          </div> 
          @php $pastearing_check = ''; if (Schema::hasTable('services') && Schema::hasTable('service_user')) { $pastearing_check = Helper::getFreelancerServices('completed', Auth::user()->id, 'completed')->count() > 0; } @endphp @if ((!empty($completed_projects_history) && $completed_projects_history->count() > 0) || $pastearing_check) @php $commision = \App\SiteManagement::getMetaValue('commision'); $admin_commission = !empty($commision[0]['commision']) ? $commision[0]['commision'] : 0; @endphp <div class="wt-dashboardboxcontent wt-hiredfreelance">
            <table class="wt-tablecategories">
              <thead>
                <tr>
                  <th>{{trans('lang.project_title')}}</th>
                  <th>{{trans('lang.date')}}</th>
                  <th>{{trans('lang.earnings')}}</th>
                </tr>
              </thead> @if ($access_type == 'jobs' || $access_type== 'both') 
              @if (!empty($completed_projects_history) && $completed_projects_history->count() > 0) 
              <tbody> @foreach ($completed_projects_history as $projects) 
                @php 
                $project = \App\Proposal::find($projects->id); $user_name = Helper::getUsername($project->job->user_id); $amount = !empty($project->amount) ? $project->amount - ($project->amount / 100) * $admin_commission : 0; 
                @endphp 
                <tr class="wt-earning-contents">
                  <td class="wt-earnig-single" data-th="Project Title">
                    <span class="bt-content">{{{ $project->job->title }}}</span>
                  </td>
                  <td data-th="Date">
                    <span class="bt-content">{{$project->updated_at}}</span>
                  </td>
                  <td data-th="Earnings">
                    <span class="bt-content">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$amount}}}</span>
                  </td>
                </tr> 
                @endforeach 
            </tbody> 
            @endif 
            @endif 
            @if ($access_type == 'services' || $access_type == 'both') @if (Helper::getFreelancerServices('completed', Auth::user()->id)->count() > 0) 
            <tbody> 
                @foreach (Helper::getFreelancerServices('completed', Auth::user()->id) as $service) 
                @php 
                $freelancer = Helper::getServiceSeller($service->id); $user_name = !empty($freelancer) ? Helper::getUsername($freelancer->seller_id) : ''; $amount = !empty($service->price) ? $service->price - ($service->price / 100) * $admin_commission : 0; 
                @endphp 
                <tr class="wt-earning-contents">
                  <td class="wt-earnig-single" data-th="Project Title">
                    <span class="bt-content">{{{ $service->title }}}</span>
                  </td>
                  <td data-th="Date">
                    <span class="bt-content">{{$service->updated_at}}</span>
                  </td>
                  <td data-th="Earnings">
                    <span class="bt-content">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$amount}}}</span>
                  </td>
                </tr> 
                @endforeach 
            </tbody> 
            @endif 
            @endif
            </table>
          </div> 
          @else 
          @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) @include('extend.errors.no-record') 
          @else 
          @include('errors.no-record') 
          @endif 
          @endif
        </div>
      </div>
    </div>
  </section> @endsection