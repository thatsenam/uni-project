{{-- Header --}}
<div id="kt_header" class="header mb-10 {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">


            <div class="d-flex align-items-center flex-wrap mr-1">


                <h5 class="text-dark font-weight-bold my-2 mr-5">
                    @yield('title', $page_title ?? '')

                </h5>

            </div>


        </div>
        </div>
        @if (config('layout.header.self.display'))

            @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('layout.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('layout.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}

        @else
            <div></div>
        @endif

        @include('layout.partials.extras._topbar')
    </div>
</div>
