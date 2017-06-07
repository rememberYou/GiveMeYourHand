@extends('layouts.app')

@section('title', '| Edit Role')

@section('stylesheets')
    <!-- TinyMCE -->
    @include('partials._tinymce')
    
    <!-- Parsley CSS -->
    {!! Html::style('css/parsley.css') !!}
@endsection

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
	    <div class="col-md-8 col-md-offset-2 text-center">
		@include('partials._message')
	    </div>
	</div>

	<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="design-box edit">
		    {!! Form::model($offer, ['route' => ['offers.update', $offer->id],
					     'data-parsley-validate' => '',
					     'method' => 'PUT']) !!}

		    <h2 class="text-center design-title fg-grapefruit wow fadeIn"
			       style="visibility: visible; animation-name: fadeIn">Edit Panel</h2>

		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('title', 'GiveMe™', ['class' => 'input pass',
							       'placeholder' => 'Title (e.g: GiveMeEverything™ *',
							       'required' => '',
							       'minlength' => '7',
							       'maxlength' => '30']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('price', null, ['class' => 'input pass',
							  'placeholder' => 'Price (e.g: 49.99) *',
							  'required' => '',
							  'data-parsley-pattern' => "^[0-9]*\.[0-9]{2}$",
							  'maxlength' => '6']) }}
			</div>
		    </div>

		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, ['class' => 'input pass',
							 'placeholder' => 'Slug (e.g: give-me-everything) *',
							 'required' => '',
							 'minlength' => '10',
							 'maxlength' => '255']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="text-center">
			    {{ Form::label('content', 'Content', ['class' => 'wow fadeInLeft']) }}
			    {{ Form::textarea('content', null, ['class' => 'form-control textarea',
								'required' => '',
								'minlength' => '10',
								'maxlength' => '100']) }}
			</div>
		    </div>
		    
		    <input type="submit" value="Edit it!" class="btn-input bg-grapefruit bs-dark-grapefruit wow fadeInDown"
			   style="visibility: visible; animation-name: fadeInDown"/>

		    <div class="form-group wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft">
                        <div class="text-center">
			    <span class="span-login">or {!! Html::linkRoute('offers.show', 'Cancel', null) !!}</span>
                        </div>
		    </div>
		    {!! Form::close() !!}
		</div> <!-- ./design-box -->
	    </div> <!-- ./col -->
	</div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection

@section('scripts')
    <!-- Parsley's JavaScript plugins -->
    {!! Html::script('js/parsley.min.js') !!}
@endsection
