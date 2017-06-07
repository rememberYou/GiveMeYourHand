@extends('layouts.app')

@section('title', '| View Statistic')

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
	            fa-gift
	        @endslot
                Offers
            @endcomponent
	</div>	

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>

        <div class="row">
	    <div class="col-md-4 col-md-offset-4 text-center">
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
	</div>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <div class="well wow fadeUp" style="visibility: visible; animation-name: fadeUp">
		    @component('components.backend.widgets.url')
		    {{ route('offers.edit', $offer->slug) }}
		    @endcomponent

		    @component('components.backend.widgets.info')
		    @slot('dateCreation')
		    {{ $offer->created_at }}
		    @endslot

		    @slot('dateUpdated')
		    {{ $offer->updated_at }}
		    @endslot
		    @endcomponent

		    <div class="row">
		        <div class="col-sm-6">
			    {!! Html::linkRoute('offers.edit', 'Edit', [$offer->id], ['class' => 'btn btn-warning btn-block']) !!}
		        </div>

		        <div class="col-sm-6 form-group">
			    {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method' => 'DELETE']) !!}
			    {{ Form::button('<i class="fa fa-times"></i>Delete',
					    ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) }}
			    {!! Form::close() !!}
		        </div>
		    </div>

		    <div class="row">
                        <div class="col-sm-12">
			    {{ Html::linkRoute('offers.index', 'All Services', [], ['class' => 'btn btn-default btn-block']) }}
		        </div>
		    </div>
	        </div> <!-- ./well -->
	    </div> <!-- ./col -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
