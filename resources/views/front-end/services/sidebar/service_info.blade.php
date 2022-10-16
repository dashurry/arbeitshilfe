<div class="wt-userrating wt-userratingvtwo card">

    <div class="wt-ratingtitle">

       <h3>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service->price}}}</h3>

       <span>{{trans('lang.starting_from')}}</span>

    </div>

    <div class="wt-rating-info">

       <ul class="wt-service-info">

          <li>

             <span class="d-flex align-items-center"><i class="material-symbols-outlined iconcolor1">date_range</i>

             <strong>{{{$delivery_time->title}}}</strong> &nbsp;{{ trans('lang.delivery_time') }}</span>

          </li>

          <li>

             <span class="d-flex align-items-center">
               <i class="material-symbols-outlined iconcolor2">search</i>
               <strong>{{{$service->views}}}</strong>&nbsp;{{ trans('lang.views') }}</span>

          </li>

          <li>

             <span class="d-flex align-items-center">
               <i class="material-symbols-outlined iconcolor3">shopping_bag</i>
               <strong>{{{Helper::getServiceCount($service->id, 'completed')}}}</strong>&nbsp;{{ trans('lang.sales') }}</span>

          </li>

          <li>

             <span class="d-flex align-items-center">
               <i class="material-symbols-outlined iconcolor4">schedule</i>
               <strong>{{{$response_time->title}}}</strong>&nbsp;{{ trans('lang.response_time') }}</span>

          </li>

       </ul>

       <div class="wt-ratingcontent">

          <p><em>*</em> {{ trans('lang.service_note') }}</p>

          {{-- <a href="javascript:;" class="wt-btn" v-on:click.prevent="hireFreelancer('{{{$service->id}}}', '{{{trans('lang.hire_service_title')}}}', '{{{trans('lang.hire_service_text')}}}', '{{$mode}}')">{{ trans('lang.buy_now') }} </a> --}}
          <a href="javascript:;" class="btn btn-success mt-3 lift shadow-none" v-on:click.prevent="hireFreelancer('{{{$service->id}}}', '{{{trans('lang.hire_service_title')}}}', '{{{trans('lang.hire_service_text')}}}', '{{$mode}}')">{{ trans('lang.buy_now') }} </a>

       </div>

    </div>

 </div>