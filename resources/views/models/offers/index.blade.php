@extends('layouts.app')

@section('title', '| Offers')

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
	            fa-gift
	        @endslot
                Offers
            @endcomponent
	</div>

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>

        <div class="row">
	    <div class="col-md-12">		
	        <table class="table table-striped">
		    <thead>
		        <tr>
			    <th>#</th>
			    <th>Title</th>
			    <th>Content</th>
			    <th>Price</th>
			    <th>Created At</th>
                            <th>Updated At</th>
			    <th></th>
		        </tr>
		    </thead>

		    <tbody>
			@foreach($offers as $offer)
		            <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s"
				       style="visibility: visible; animation-name: fadeIn">
			        <td>{{ $offer->id }}</td>
                                <td><a href=" {{ route('offers.show', $offer->id) }}">{{ $offer->title }}</a></td>
			        <td>{!! str_limit($offer->content, 60) !!}</td>
			        <td class="green-price">{{ '$' . $offer->price }}</td>
                                <td>{{ Carbon::parse($offer->created_at)->diffForHumans() }}</td>
			        <td>{{ Carbon::parse($offer->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn-sm btn-warning">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['offers.destroy', $offer->id],
                                                    'id' => 'form-delete-offers-' . $offer->id]) !!}
                                        <a href="" class="data-delete btn-sm btn-danger" data-form="offers-{{ $offer->id }}">
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
	        {!! $offers->links(); !!}
	    @endslot

	    @slot('route')
                {{ route('offers.create') }}
	    @endslot
	
	    @slot('btnTitle')
	        Offer
	@endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
