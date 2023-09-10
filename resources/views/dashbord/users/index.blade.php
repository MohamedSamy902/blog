@extends('layouts.admin.master')

@section('title')
    {{ __('user.user') }}
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('user.user') }}</h3>
        @endslot
        <li class="breadcrumb-item active">{{ __('user.user') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="responsive">
                                <thead>
                                    <tr>
                                        <th>{{ __('master.name') }}</th>
                                        <th>{{ __('master.email') }}</th>
                                        <th>{{ __('master.phone') }}</th>
                                        <th>{{ __('role.role') }}</th>
                                        <th>{{ __('master.image') }}</th>

                                        <th>{{ __('master.processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            {{-- <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                            </td> --}}
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->view }}</td>
                                            <td>{{ $user->roles_name }}</td>

                                            <td><img style="max-width: 100px;max-height: 100px;" src="{{ $user->getFirstMediaUrl('user') != null ?  $user->getFirstMediaUrl('user') : asset('assets/images/dashboard/1.png')}}"></td>
                                            <td>
                                                <div style="display: flex;">
                                                    @can('user-edit')
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="{{ route('users.edit', $user->id) }}">{{ __('master.edit') }}</a>
                                                    @endcan

                                                    @can('user-delete')
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input style="border-color: #d22d3d;"
                                                                class="btn btn-outline-danger-2x"
                                                                value="{{ __('master.delete') }}" type="submit">

                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    @endpush
@endsection
