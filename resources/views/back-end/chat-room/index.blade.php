@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('css')
@endsection
@section('content')

    <section id="easin-chat">
        <easin-chat/>
    </section>

@endsection

@push('scripts')

    <script src="{{ asset('js/emojionearea.min.js') }}"></script>

    <script src="{{ asset('js/linkify.min.js') }}"></script>

    <script src="{{ asset('js/linkify-jquery.min.js') }}"></script>

@endpush

