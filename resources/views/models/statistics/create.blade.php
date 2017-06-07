@extends('layouts.app')

@section('title', '| New Statistic')

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
	            fa-bar-chart
	        @endslot
                Statistics
            @endcomponent
	</div>	       

	<div class="row">
	    <div class="col-md-8 col-md-offset-2 text-center">
		@include('partials._message')
	    </div>
	</div>
	
	<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="design-box log-width classic">
		    {!! Form::open(['route' => 'statistics.store', 'data-parsley-validate' => '']) !!}

		    <h2 class="text-center design-title fg-emerald wow fadeIn"
			       style="visibility: visible; animation-name: fadeInLeft">Creation Panel</h2>

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
			    {{ Form::text('name', null, ['class' => 'input pass',
							 'placeholder' => 'Name *',
							 'required' => '',
							 'minlength' => '2',
							 'maxlength' => '30']) }}
			</div>
		    </div>
		    		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('number', null, ['class' => 'input pass',
							   'placeholder' => 'Number *',
							   'required' => '',							   
							   'data-parsley-type' => 'digits',
							   'maxlength' => '9']) }}
			</div>
		    </div>
		    		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, ['class' => 'input pass',
							 'placeholder' => 'Slug (e.g: statistic-test) *',
							 'required' => '',
							 'minlength' => '3',
							 'maxlength' => '255']) }}
			</div>
		    </div>
		    
		    <input type="submit" value="Create it!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"
			   style="visibility: visible; animation-name: fadeInDown"/>

		    <div class="form-group wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft">
			<div class="text-center">
			    <span class="span-login">or {!! Html::linkRoute('statistics.index', 'Cancel', null) !!}</span>
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
