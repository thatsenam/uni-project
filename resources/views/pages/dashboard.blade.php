{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row ">
        <div class="col">
            <div class="card">
                <a class="card-body" href="{{ route('categories.category.index') }}">Categories</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="card-body" href="{{ route('asset_categories.asset_category.index') }}">Asset Categories</a>
            </div>
        </div>
    </div>



@endsection

{{-- Scripts Section --}}
@section('scripts')

    <script>
        $(document).ready(function () {
            $('table').dataTable();
        });
    </script>

    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>

    <script>
        var avatar5 = new KTImageInput('kt_image_5');

        avatar5.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Awesome!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar5.on('change', function (imageInput) {
            // swal.fire({
            //     title: 'Image successfully changed !',
            //     type: 'success',
            //     buttonsStyling: false,
            //     confirmButtonText: 'Awesome!',
            //     confirmButtonClass: 'btn btn-primary font-weight-bold'
            // });
        });

        avatar5.on('remove', function (imageInput) {
            // swal.fire({
            //     title: 'Image successfully removed !',
            //     type: 'error',
            //     buttonsStyling: false,
            //     confirmButtonText: 'Got it!',
            //     confirmButtonClass: 'btn btn-primary font-weight-bold'
            // });
        });
    </script>
@endsection
