@extends('layouts.admin.master')

@section('title')
    E-labclub | الاقسام
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>الاقسام</h3>
        @endslot
        <li class="breadcrumb-item active">الاقسام</li>
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
                                        <th>Name</th>
                                        <th>Controller</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>

                                            <td>
                                                @can('edit-category')
                                                    <a class="btn btn-outline-primary-2x"
                                                        href="{{ route('categories.edit', $category->id) }}">تعديل</a>
                                                @endcan
                                                {{-- @can('delete-category')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger-2x', 'style' => 'border-width: 2px !important;border-color: #d22d3d !important;color: #d22d3d !important;background-color: transparent !important;']) !!}
                                                    {!! Form::close() !!}
                                                @endcan --}}

                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" id="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button onclick="confirmDelete(event)" type="submit">Delete</button> --}}
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-delete">Delete</button>

                                                    <!-- delete button -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                        {{-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this item?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @push('scripts')
        <script>
            var myModal = document.getElementById('confirm-delete')
            var myInput = document.getElementById('delete-form')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })

            myModal.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn-danger')) {
                    document.getElementById('delete-form').submit() // submit the form
                }
            })
        </script>
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
        {{-- <script>
            $('#confirm-delete').on('shown.bs.modal', function() {
                $('#delete-form').trigger('focus')
            })

            $('#confirm-delete').on('click', '.btn-danger', function() {
                $('#delete-form').submit();
            });
        </script> --}}
        <script>
            function confirmDelete(event) {
                event.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this record.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });


                // .then((willDelete) => {
                //     if (willDelete) {
                //         document.getElementById('delete-form').submit();
                //     } else {
                //         swal("Your record is safe!");
                //     }
                // });
            }
        </script>

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
