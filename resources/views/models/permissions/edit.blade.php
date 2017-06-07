@extends('layouts.app')

@section('title', '| Edit Permission')

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
                <div class="design-box log-width edit">
		    {!! Form::model($permission, ['route' => ['permissions.update', $permission->id],
						  'data-parsley-validate' => '',
						  'method' => 'PUT']) !!}

		    <h2 class="text-center design-title fg-grapefruit wow fadeIn">Edit Panel</h2>

		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('name', null, ['class' => 'input pass',
							 'placeholder' => 'Name *',
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
							 'placeholder' => 'Slug (e.g: psychologist) *',
							 'required' => '',
							 'minlength' => '3',
							 'maxlength' => '255']) }}
			</div>
		    </div>

		    <input type="submit" value="Edit it!" class="btn-input bg-grapefruit bs-dark-grapefruit wow fadeInDown"/>

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
