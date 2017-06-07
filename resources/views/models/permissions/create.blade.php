@extends('layouts.app')

@section('title', '| New Permission')

@section('stylesheets')
    <!-- TinyMCE -->
    @include('partials._tinymce')
    
    <!-- Parsley CSS -->
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    @include('partials.nav.admin._nav-admin-simplify')

    <div class="container">
	<div class="title wow fadeIn">
	    @component('components.backend.widgets.title')
	        @slot('icon')
	            fa-shield
	        @endslot
                Permissions
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
		    {!! Form::open(['route' => 'permissions.store', 'data-parsley-validate' => '']) !!}

		    <h2 class="text-center design-title fg-emerald wow fadeIn">Creation Panel</h2>

		    <div class="form-group">
			<div class="col-md-12 text-center">
			    {{ Form::text('name', null, ['class' => 'input pass',
							 'placeholder' => 'Name (e.g: advanced) *',
							 'required' => '',
							 'minlength' => '2',
							 'maxlength' => '30']) }}
			</div>
		    </div>
		    
                    <div class="form-group">
			{{ Form::select('level', [
			    '1' => '1',
			    '2' => '2',
			    '3' => '3',
			    '4' => '4',
			    '5' => '5',
			    '6' => '6',
			    '7' => '7',
			    '8' => '8',
			    '9' => '9',
			    '10' => '10'])
			}}
                    </div>
		    
	            <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, ['class' => 'input pass',
							 'placeholder' => 'Slug (e.g: give-me-everything) *',
							 'required' => '',
							 'minlength' => '2',
							 'maxlength' => '255']) }}
			</div>
		    </div>

		    <input type="submit" value="Create it!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"/>

		    <div class="form-group wow fadeInLeft">
			<div class="text-center">
			    <span class="span-login">or {!! Html::linkRoute('permissions.index', 'Cancel', null) !!}</span>
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
