@extends('layouts.app')

@section('title', '| Services')

@section('content')

    @if (Auth::user()->isAdmin())
        @include('partials.nav.admin._nav-admin-simplify')
    @else (Auth::user()->isStaff())
        @include('partials.nav.staff._nav-staff-simplify')
    @endif

    <div class="container">

	<div class="title wow fadeIn" style="visibility: visible; animation-name: fadeIn">
	    @component('components.backend.widgets.title')
	    @slot('icon')
	    fa-folder
	    @endslot
            Services
            @endcomponent
	</div>

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div> 
	</div>
	
        <div class="row">
            @foreach($services as $service)
		<div class="col-md-4 text-center wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s"
		     style="visibility: visible; animation-name: fadeIn">    
		    @component('components.backend.services.show')
                    @slot('title')
                            {{ $service->title }}
                        @endslot

                        @slot('color')
                            {{ $service->color }}
                        @endslot

                        @slot('icon')
                    {{ $service->icon }}
                    @endslot

	            {!! $service->content !!}

		    @slot('route')
                    {{ route('services.show', $service->id) }}
		        @endslot
		    @endcomponent
		</div> <!-- ./col -->
	    @endforeach
	</div> <!-- ./row -->
	@component('components.backend.widgets.nav-page')
	    @slot('links')
	        {!! $services->links(); !!}
	    @endslot

	    @slot('route')
                {{ route('services.create') }}
	    @endslot
	
	    @slot('btnTitle')
	        Service
	@endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
