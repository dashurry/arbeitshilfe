@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

    .wt-main {
        /* background: #ffffff; */
        margin-bottom: 0rem;
    }
    
</style>

    <div class="wt-haslayout wt-delete-account wt-dbsectionspace" id="profile_settings">

        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">

                            @if (Session::has('message'))

                        <div class="flash_msg">

                            <flash_messages :message_class="'success'" :time='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>

                        </div>

                        @elseif (Session::has('error'))

                        <div class="flash_msg">

                            <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>

                        </div>

                    @endif

                    <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">

                        @if (file_exists(resource_path('views/extend/back-end/settings/tabs.blade.php'))) 

                            @include('extend.back-end.settings.tabs')

                        @else 

                            @include('back-end.settings.tabs')

                        @endif

                        <div class="wt-tabscontent tab-content">

                            <div class="wt-yourdetails wt-tabsinfo">

                                {{-- <div class="wt-tabscontenttitle"> --}}
                                <div>

                                    <h2>{{{ trans('lang.delete_account') }}}</h2>

                                </div>

                                <div class="wt-formtheme wt-userform">

                                    {!! Form::open(['url' => url('profile/settings/delete-user'),'@submit.prevent' => 'deleteAccount($event)', 'id' => 'delete_acc_form' ])!!}

                                        <div class="row">

                                            <div class="col-sm-12 col-md-6 mb-4">

                                                {!! Form::password('old_password', ['class' => 'form-control','placeholder' => trans('lang.ph_oldpass')]) !!}

                                            </div>

                                            <div class="col-sm-12 col-md-6 mb-4">

                                                {!! Form::password('retype_password', ['class' => 'form-control','placeholder' => trans('lang.ph_retype_pass')]) !!}

                                            </div>

                                            <div class="col-12 mb-4">
                                                {{-- {!! Form::select('delete_reason', Helper::getDeleteAccReason(), null, array('class'=>'form-control', 'placeholder' => trans('lang.select_reason'))) !!} --}}
                                                @php
                                                    $delete_reason = Helper::getDeleteAccReason();
                                                @endphp
                                                <select class="form-control" name="delete_reason" onchange=" this.dataset.chosen = this.value; ">
                                                    <option value="" selected disabled>{{ trans('lang.select_reason') }}</option>
                                                    @foreach($delete_reason as $i=>$key)
                                                        <option value="{{ $key }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <textarea name="delete_description" class="form-control" placeholder="{{{ trans('lang.ph_desc_optional') }}}"></textarea>
                                            </div>

                                            <div class="col-md-6">

                                                {!! Form::submit(trans('lang.btn_delete_account'), ['class' => 'btn btn-primary lift']) !!}

                                            </div>

                                        </div>

                                    {!! Form::close() !!}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

