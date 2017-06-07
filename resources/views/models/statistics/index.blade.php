@extends('layouts.app')

@section('title', '| Statistics')

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
	    <div class="col-md-12">
	        <table class="table table-">
		    <thead>
		        <tr>
			    <th>#</th>
			    <th>Icon</th>
			    <th>Name</th>
                            <th>Number</th>
			    <th>Created At</th>
			    <th>Updated At</th>
                            <th></th>
		        </tr>
		    </thead>

		    <tbody>
			@foreach($statistics as $statistic)
			    <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
			        <th>{{ $statistic->id }}</th>
                                <td><i class="fa {{ $statistic->icon }}"></i></td>
                                <td><a href="{{ route('statistics.show', $statistic->id)}}">{{ $statistic->name }}</a></td>
			        <td> {{ $statistic->number }}</td>
			        <td>{{ Carbon::parse($statistic->created_at)->diffForHumans() }}</td>
			        <td>{{ Carbon::parse($statistic->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('statistics.edit', $statistic->id) }}" class="btn-sm btn-warning">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['statistics.destroy', $statistic->id],
                                                    'id' => 'form-delete-statistics-' . $statistic->id]) !!}
                                        <a href="" class="data-delete btn-sm btn-danger" data-form="statistics-{{ $statistic->id }}">
					    <i class="fa fa-times" aria-hidden="true"></i>Delete
					</a>
					{!! Form::close() !!}
                                </td>
			    </tr>
			@endforeach
		    </tbody>
	        </table>
	    </div> <!-- ./col -->
	</div> <!-- ./row -->

	@component('components.backend.widgets.nav-page')
	    @slot('links')
	        {!! $statistics->links(); !!}
  	    @endslot

	    @slot('route')
                {{ route('statistics.create') }}
	    @endslot
	
	    @slot('btnTitle')
	Statistic
	@endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
