@extends('layouts.admin.master')

@section('title')
    E-labclub | اضافه قسم
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>اضافه قسم</h3>
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
                        <h5>اضافه قسم</h5>
                    </div>
                    <form class="form theme-form" action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">اضافه قسم</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text"
                                            placeholder="اسم القسم" name="name" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlRecovery">مده الضمان</label>
                                        <input class="form-control" id="exampleFormControlRecovery" type="text"
                                            placeholder="مده الضمان" name="recovery" />
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


    {{-- @push('scripts') --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script> --}}

        {{-- <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script> --}}
        {{-- <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#permation').click(function() {
                var id = $('#permation').val();
                // console.log(id);
                if (id == '') {} else {
                    $.ajax({
                        type: 'POST',
                        url: '/admin/categoryajax/' + id,

                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function(data) {
                            var adminAppend = '';
                            for (let index = 0; index < data.length; index++) {
                                const element = data[index];
                                // console.log(element.name);
                                adminAppend += `<option value="${element.id}">${element.name}</option>`;
                            }
                            $('#admin').empty().append(adminAppend)

                        },

                    });
                }
            });
        </script> --}}
    {{-- @endpush --}}
@endsection
