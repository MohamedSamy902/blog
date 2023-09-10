@extends('layouts.admin.master')

@section('title')
    E-labclub | تعديل الصلاحيه
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>اضافه صلاحيه</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">الصلاحيات</a></li>
        <li class="breadcrumb-item active">اضافه صلاحيه</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>اضافه صلاحيه</h5>

                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('patch')

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="validationCustom01">الصلاحيه</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" value="{{ $role->name }}" />
                                </div>

                            </div>

                            <div class="row g-3">
                                @foreach ($permission as $value)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <div class="checkbox p-0">
                                                <input class="form-check-input" id="{{ $value->id }}" type="checkbox"
                                                    name="permission[]" value="{{ $value->id }}"
                                                    {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }} />
                                                <label class="form-check-label"
                                                    for="{{ $value->id }}">{{ $value->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-primary" type="submit">حفظ</button>
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
