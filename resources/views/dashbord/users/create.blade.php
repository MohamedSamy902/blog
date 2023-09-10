@extends('layouts.admin.master')

@section('title')
    {{ __('user.user_add') }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3></h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('user.user') }}</a></li>
        <li class="breadcrumb-item active">{{ __('user.user_add') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('users.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.username') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="username" placeholder="ex: Mohamed Samy" value="{{ old('username') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="ex: Mohamed Samy" value="{{ old('name') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03">{{ __('master.mobile') }}</label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        placeholder="رقم الهاتف" required="" value="{{ old('mobile') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04">{{ __('master.email') }}</label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        placeholder="ex: mohamedsamy@mail.com" required=""
                                        value="{{ old('email') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06">{{ __('role.role') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="roles_name">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" @selected($user->roles_name == $role )>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05">{{ __('master.password') }}</label>
                                    <input class="form-control" id="validationCustom05" type="text" name="password"
                                        placeholder="***********" required="" value="{{ old('password') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>


                            <button class="btn btn-primary" type="submit">{{ __('master.save') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endpush
@endsection
