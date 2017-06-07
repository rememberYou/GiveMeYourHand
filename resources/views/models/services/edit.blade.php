@extends('layouts.app')

@section('title', '| Edit Service')

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
	            fa-folder
	        @endslot
                    Services
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
		    {!! Form::model($service, ['route' => ['services.update', $service->id],
					       'data-parsley-validate' => '',
					       'method' => 'PUT']) !!}

		    <h2 class="text-center design-title fg-grapefruit wow fadeIn">Edit Panel</h2>

		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('icon', null, ['class' => 'input pass',
							 'placeholder' => 'Icon (e.g: fa-home) *',
							 'required' => '',
							 'minlength' => '3',
							 'maxlength' => '30']) }}
			</div>
		    </div>		    
		    		    
		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::label('color', 'Color', ['class' => 'wow fadeInLeft']) }}
			    {{ Form::select('color', ['red' => 'red',
						      'green' => 'green',
						      'blue' => 'blue']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('title', null, ['class' => 'input pass',
							  'placeholder' => 'Title *',
							  'required' => '',
							  'minlength' => '3',
							  'maxlength' => '30']) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, ['class' => 'input pass',
							 'placeholder' => 'Slug (e.g: service-test) *',
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
			    <span class="span-login">or {!! Html::linkRoute('services.index', 'Cancel', null) !!}</span>
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
