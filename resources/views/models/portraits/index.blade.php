@extends('layouts.app')

@section('title', '| Portraits')

@section('content')

    @if (Auth::user()->isAdmin())
        @include('partials.nav.admin._nav-admin-simplify')
    @else (Auth::user()->isStaff())
        @include('partials.nav.staff._nav-staff-simplify')
    @endif

    <div class="container">

	<div class="title wow fadeIn">
	    @component('components.backend.widgets.title')
	    @slot('icon')
	    fa-user-circle-o
	    @endslot
            Portraits
            @endcomponent
	</div>      

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>
	
	<div class="row">	    
	    @foreach($portraits as $portrait)
		<div class="col-md-3 team portrait text-center wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
                    @component('components.backend.portraits.index')
                        @slot('picture')
                            {{ $portrait->picture }}
                        @endslot

		        @slot('firstname')
	                    {{ $portrait->firstname }}
	                @endslot

		        @slot('name')
	                    {{ $portrait->name }}
	                @endslot

                        @slot('status')
                            {{ $portrait->status }}
                        @endslot

                        {!! $portrait->content !!}

                        @slot('facebook')
                            {{ $portrait->facebook }}
                        @endslot

                        @slot('linkedin')
                            {{ $portrait->linkedin }}
                        @endslot

                        @slot('email')
                            {{ $portrait->email }}
                        @endslot

                        @slot('route')
                            {{ route('portraits.show', $portrait->id) }}
                        @endslot
                    @endcomponent
		</div> <!-- ./col -->
	    @endforeach
	</div> <!-- ./row -->
	@component('components.backend.widgets.nav-page')
	    @slot('links')
	        {!! $portraits->links(); !!}
	    @endslot

	    @slot('route')
                {{ route('portraits.create') }}
	    @endslot
 
	    @slot('btnTitle')
	        Portrait
	    @endslot
	@endcomponent	
    </div> <!-- ./container -->
@endsection
