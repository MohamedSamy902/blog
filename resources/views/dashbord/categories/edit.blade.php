@extends('layouts.admin.master')

@section('title')
    E-labclub | تعديل القسم
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>تعديل قسم</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الاقسام</a></li>
        <li class="breadcrumb-item active">اضافه قسم</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>تعديل قسم</h5>
                    </div>
                    <form class="form theme-form" action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Category Name En</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            required=""
                                            value="{{ old('name') ? old('name') : $category->getTranslation('name', 'en') }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom02">Category Name Ar</label>
                                        <input class="form-control" id="validationCustom02" type="text" name="name_ar"
                                            required=""
                                            value="{{ old('name_ar') ? old('name_ar') : $category->getTranslation('name', 'ar') }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
