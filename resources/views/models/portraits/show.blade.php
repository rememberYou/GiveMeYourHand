@extends('layouts.app')

@section('title', '| View Portrait')

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
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>
	
        <div class="row">
	    <div class="col-md-4 col-md-offset-4 team text-center wow fadeIn">
		@component('components.frontend.portraits.show')
		    @slot('picture')
		        {{ $portrait->picture }}
		    @endslot

		    @slot('firstname')
		        {{ $portrait->firstname }}
		    @endslot

		    @slot('name')
		        {{ $portrait->name }}
		    @endslot

		    @slot('status')
		        {{ $portrait->status }}
		    @endslot

		    {!! $portrait->content !!}

		    @slot('facebook')
		        {{ $portrait->facebook }}
		    @endslot

		    @slot('linkedin')
	                {{ $portrait->linkedin }}
	            @endslot

                    @slot('email')
	                {{ $portrait->email }}
	            @endslot
		@endcomponent
	    </div>
        </div>
	
        <div class="row">
	    <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-0 col-md-6 col-md-offset-3">
	        <div class="well wow fadeInUp">
		    @component('components.backend.widgets.url')
		        {{ route('portraits.edit', $portrait->slug) }}
		    @endcomponent

		    @component('components.backend.widgets.info')
		        @slot('dateCreation')
                            {{ $portrait->created_at }}
		        @endslot

		        @slot('dateUpdated')
                            {{ $portrait->updated_at }}
		        @endslot
		    @endcomponent

		    <div class="row">
		        <div class="col-md-6 col-xs-6">
			    {!! Html::linkRoute('portraits.edit', 'Edit', [$portrait->id], ['class' => 'btn btn-warning btn-block']) !!}
		        </div>
		        <div class="col-md-6 col-xs-6 form-group">
			    {!! Form::open(['route' => ['portraits.destroy', $portrait->id], 'method' => 'DELETE']) !!}
			    {{ Form::button('<i class="fa fa-times"></i>Delete', ['type' => 'submit',
										  'class' => 'btn btn-danger btn-block']) }}
			    {!! Form::close() !!}
		        </div>
		    </div>
		    <div class="row">
                        <div class="col-md-12">
			    {{ Html::linkRoute('portraits.index', 'All Portraits', [], ['class' => 'btn btn-default btn-block']) }}
		        </div>
		    </div> 
	        </div> <!-- ./well -->
	    </div> <!-- ./col -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
