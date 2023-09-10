@extends('layouts.admin.master')

@section('title')
    Bookmarks
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Bookmarks</h3>
        @endslot
        <li class="breadcrumb-item">Apps</li>
        <li class="breadcrumb-item active">Bookmarks</li>
    @endcomponent



    @push('scripts')
        <script src="{{ asset('assets/js/bookmark/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/bookmark/custom.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endpush
@endsection
