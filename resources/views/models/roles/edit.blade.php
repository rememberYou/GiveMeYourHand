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

	<div class="title wow fadeIn">
	    @component('components.backend.widgets.title')
	        @slot('icon')
	            fa-users
	        @endslot
                Roles
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
		    {!! Form::model($role, ['route' => ['roles.update', $role->id],
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
			<div class="col-md-12 text-center">
			    {{ Form::label('permission', 'Permission', ['class' => 'wow fadeInLeft']) }}
			    {{ Form::select('permission_id', $permissions) }}
			</div>
		    </div>
		    
		    <div class="form-group">
			<div class="col-md-12">
			    {{ Form::text('slug', null, array('class' => 'input pass', 'placeholder' => 'Slug (e.g: psychologist)',
							      'required' => '', 'maxlength' => '255')) }}
			</div>
		    </div>
		    
		    <input type="submit" value="Edit it!" class="btn-input bg-grapefruit bs-dark-grapefruit wow fadeInDown"/>

		    <div class="form-group wow fadeInLeft">
			<div class="text-center">
			    <span class="span-login">or {!! Html::linkRoute('roles.index', 'Cancel', null) !!}</span>
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
