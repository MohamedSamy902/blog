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

    @include('admin.alert.alert')

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
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">اضافه قسم</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text"
                                            placeholder="اسم القسم" name="name" value="{{ $category->name }}" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlRecovery">مده الضمان</label>
                                        <input class="form-control" id="exampleFormControlRecovery" type="text"
                                            placeholder="مده الضمان" name="recovery" value="{{ $category->recovery }}" />
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
