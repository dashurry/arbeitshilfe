@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('css')
<style>
.wt-header .wt-navigation > ul > li > a{color: #767676 !important;}
</style>
@endsection
@section('content')
<style>
    .wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
</style>
    <section class="wt-haslayout wt-dbsectionspace" id="easin-chat">
        <easin-chat/>
    </section>

@endsection

@push('scripts')

    <script src="{{ asset('js/emojionearea.min.js') }}"></script>

    <script src="{{ asset('js/linkify.min.js') }}"></script>

    <script src="{{ asset('js/linkify-jquery.min.js') }}"></script>

@endpush

