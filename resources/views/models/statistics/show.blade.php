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
	    fa-bar-chart
	    @endslot
            Statistics
            @endcomponent
	</div>	

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>

        <div class="row">
	    <div class="statistical">
		<div class="col-md-4 col-md-offset-4 text-center wow fadeIn"
		     style="visibility: visible; animation-name: fadeIn">
		    <span><i class="fa {{ $statistic->icon }}"></i></span>
                    <h5 class="offset-sm-top-36 offset-top-27">{{ $statistic->name }}</h5>
                    <!-- CountTo-->
                    <div class="counter h3 divider-xs divider-xs-mod-1 offset-top-5">
			<span class="count">{{ $statistic->number }}</span>
		    </div>
		</div>
	    </div>

	    <div class="col-md-6 col-md-offset-3">
	        <div class="well wow fadeUp"
		     style="visibility: visible; animation-name: fadeUp">
		    @component('components.backend.widgets.url')
		        {{ route('statistics.edit', $statistic->slug) }}
		    @endcomponent

		    @component('components.backend.widgets.info')
		        @slot('dateCreation')
		            {{ $statistic->created_at }}
		        @endslot

		        @slot('dateUpdated')
		            {{ $statistic->updated_at }}
		        @endslot
		    @endcomponent

		    <div class="row">
		        <div class="col-sm-6">
			    {!! Html::linkRoute('statistics.edit', 'Edit', [$statistic->id], ['class' => 'btn btn-warning btn-block']) !!}
		        </div>

		        <div class="col-sm-6 form-group">
			    {!! Form::open(['route' => ['statistics.destroy', $statistic->id], 'method' => 'DELETE']) !!}
			    {{ Form::button('<i class="fa fa-times"></i>Delete',
					    ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) }}
			    {!! Form::close() !!}
		        </div>
		    </div>

		    <div class="row">
                        <div class="col-sm-12">
			    {{ Html::linkRoute('statistics.index', 'All Services', [], ['class' => 'btn btn-default btn-block']) }}
		        </div>
		    </div>
	        </div> <!-- ./well -->
	    </div> <!-- ./col -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
