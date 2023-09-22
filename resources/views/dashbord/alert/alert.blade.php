@if (session('success'))
    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

        <script>
            swal("{{ session('success') }}", {
                position: 'center',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endpush
@elseif(session('error'))
    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

        <script>
            swal("{{ session('error') }}", {
                position: 'center',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endpush
@endif
@if ($errors->any())
    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

        <script>
            swal("{{ session('success') }}", {
                position: 'center',
                icon: 'error',

                @foreach ($errors->all() as $error)
                    text : '{!! $error !!}',
                @endforeach
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endpush
@endif
