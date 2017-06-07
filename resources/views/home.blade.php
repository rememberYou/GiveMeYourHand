@extends('layouts.app')

@section('content')

    @if (Auth::check())
        @if (Auth::user()->isAdmin())
            @include('partials.nav.admin._nav-admin')
        @elseif (Auth::user()->isStaff())
            @include('partials.nav.staff._nav-staff')
        @else
            @include('partials.nav.user._nav')
        @endif
    @else
        @include('partials.nav.user._nav')
    @endif

    @include('partials._banner')

    <div class="container">

	<!-- Services -->
	<section id="services" class="design-div">
	    <div class="container">
		@include('partials._services', ['services' => $services])
	    </div>
	</section>

	<!-- About -->
	<section id="about" class="design-div">
	    <div class="container">
		@include('partials._about', ['portraits' => $portraits,
		'statistics' => $statistics])
	    </div>
	</section>

	<!-- Offers -->
	<section id="offers" class="design-div">
	    <div class="container">
		@include('partials._offers')
	    </div>
	</section>

	<!-- Contact -->
	<section id="contact" class="design-div">
	    <div class="container">
		@include('partials._contact')
	    </div>
	</section>
    </div> <!-- ./container -->
@endsection

@section('scripts')
    <!-- Parsley's JavaScript plugins -->
    {!! Html::script('js/jqBootstrapValidation.js') !!}

    {!! Html::script('js/contact_me.js') !!}

    {!! Html::script('js/my-contact.js') !!}
@endsection
