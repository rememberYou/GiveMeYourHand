@extends('layouts.app')

@section('title', '| View Service')

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
            <div class="col-md-4 col-md-offset-4 text-center wow fadeIn"
		 style="visibility: visible; animation-name: fadeIn">
		@component('components.backend.services.show')
                    @slot('title')
                        {{ $service->title }}
                    @endslot

                    @slot('color')
                        {{ $service->color }}
                    @endslot

                    @slot('icon')
                        {{ $service->icon }}
                    @endslot

	            {!! $service->content !!}

 		    @slot('route')
                        {{ route('services.show', $service->id) }}
		    @endslot
		@endcomponent                
	    </div>
	    <div class="col-md-6 col-md-offset-3">
	        <div class="well wow fadeInUp"
		     style="visibility: visible; animation-name: fadeInUp">
                    @component('components.backend.widgets.url')
                        {{ route('services.edit', $service->slug) }}
                    @endcomponent

                    @component('components.backend.widgets.info')
                        @slot('dateCreation')
                            {{ $service->created_at }}
                        @endslot

                        @slot('dateUpdated')
                            {{ $service->updated_at }}
                        @endslot
                    @endcomponent

		    <div class="row">
		        <div class="col-sm-6">
			    {!! Html::linkRoute('services.edit', 'Edit', [$service->id], ['class' => 'btn btn-warning btn-block']) !!}
		        </div>

		        <div class="col-sm-6 form-group">
			    {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'DELETE']) !!}
                                {{ Form::button('<i class="fa fa-times"></i>Delete',
					    ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) }}
			    {!! Form::close() !!}
		        </div>
		    </div>

		    <div class="row">
                        <div class="col-sm-12">
			    {{ Html::linkRoute('services.index', 'All Services', [], ['class' => 'btn btn-default btn-block']) }}
		        </div>
		    </div>
	        </div> <!-- ./well -->
	    </div> <!-- ./col -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
