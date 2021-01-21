{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    test works

    @foreach($records as $record)
        <p> {{ $record }}</p>
    @endforeach
    {{ $records->links() }}


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
