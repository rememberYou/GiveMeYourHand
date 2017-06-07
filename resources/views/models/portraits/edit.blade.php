@extends('layouts.app')

@section('title', '| Edit Portrait')

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

	<div class="title wow fadeIn">
	    @component('components.backend.widgets.title')
	        @slot('icon')
	            fa-user-circle-o
	        @endslot
                Portraits
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
		    {!! Form::model($portrait, ['route' => ['portraits.update', $portrait->id],
						'method' => 'PUT', 'files' => true]) !!}

		    <h2 class="text-center design-title fg-grapefruit wow fadeIn">Edit Panel</h2>

		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::label('picture', 'Upload a Picture', ['class' => 'wow fadeInLeft']) }}
			    {{ Form::file('picture') }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('firstname', null, ['class' => 'input pass',
							      'placeholder' => 'First name (e.g: John) *',
							      'required' => '',
							      'minlength' => '3',
							      'maxlength' => '30']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('name', null, ['class' => 'input pass',
							 'placeholder' => 'Name (e.g: Doe) *',
							 'required' => '',
							 'minlength' => '2',
							 'maxlength' => '70']) }}
			</div>
		    </div>

		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('status', null, ['class' => 'input pass',
							   'placeholder' => 'Status (e.g: Psychologist) *',
							   'required' => '',
							   'minlength' => '3',
							   'maxlength' => '30']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('facebook', null, ['class' => 'input pass',
							     'placeholder' => 'Facebook',
							     'parsley-required' => 'true',
							     'minlength' => '3',
							     'maxlength' => '191']) }}
			</div>
		    </div>

		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('linkedin', null, ['class' => 'input pass',
							     'placeholder' => 'Linkedin',
							     'parsley-required' => 'true',
							     'minlength' => '3',
							     'maxlength' => '191']) }}
			</div>
		    </div>
		   
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('email', null, ['class' => 'input pass',
							  'placeholder' => 'E-Mail Address *',
							  'required' => '',
							  'minlength' => '3',
							  'maxlength' => '191']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, ['class' => 'input pass',
							 'placeholder' => 'Slug (e.g: portrait-john-doe) *',
							 'required' => '',
							 'maxlength' => '255']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="text-center">
			    {{ Form::label('content', 'Content', ['class' => 'wow fadeInLeft']) }}
			    {{ Form::textarea('content', null, ['class' => 'form-control textarea',
								'required' => '',
								'minlength' => '10',
								'maxlength' => '150']) }}
			</div>
		    </div>
		    
		    <input type="submit" value="Edit it!" class="btn-input bg-grapefruit bs-dark-grapefruit wow fadeInDown"/>

		    <div class="form-group wow fadeInLeft">
			<div class="text-center">
			    <span class="span-login">or {!! Html::linkRoute('portraits.index', 'Cancel', null) !!}</span>
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
