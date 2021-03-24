{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    <div class="d-flex flex-column-fluid mt-27">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')

        </div>
    </div>
@endif
