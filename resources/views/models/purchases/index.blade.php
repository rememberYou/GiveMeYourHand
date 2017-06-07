@extends('layouts.app')

@section('content')

    @if (Auth::check())
        @if (Auth::user()->isAdmin())
            @include('partials.nav.admin._nav-admin-simplify')
        @elseif (Auth::user()->isStaff())
            @include('partials.nav.staff._nav-staff-simplify')
        @else
            @include('partials.nav.user._nav-simplify')
        @endif
    @else
        @include('partials.nav.user._nav-simplify')
    @endif

    <section id="offers-page" class="design-div">
	<div class="container">
            <div class="row">
		<div class="col-md-12">
                    <div class="text-center wow fadeIn">
			<h2 class="title text-center">Offers</h2>
                    </div>
		</div>
            </div>
            <div class="row">
		<div class="col-md-8 col-md-offset-2">
                    <p class="lead wow fadeIn">
			If you are satisfied with our services and wish to extend these, you
			can find all our offers that will allow us to help you to carry out
			your projects by appointments through calling and video calling on
			Skype or WhatsApp.
                    </p>
		</div>
            </div>
            <h2 class="lead text-center wow fadeIn">Selection of the gift:</h2>
            <div class="offers-panels wow fadeIn" data-wow-delay=".1s">
		<div class="row">
		    @foreach($offers as $offer)
			<div class="col-lg-4 text-center">
			    @component('components.frontend.offers.show')
                                @slot('title')
                                    {{ $offer->title }}
                                @endslot

                                {!! $offer->content !!}

                                @slot('price')
                                    {{ $offer->price }}
                                @endslot
			    @endcomponent
			</div>
		    @endforeach
		</div>
		<div class="form-group">
                    <div class="col-md-12 text-center">
			<a href="/home" class="my-btn">
			    <i class="fa fa-home" aria-hidden="true"></i>Back home
			</a>
		    </div>
		</div>
            </div>
    </section>
@endsection
