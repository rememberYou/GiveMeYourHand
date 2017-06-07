@extends('layouts.app')

@section('title', '| Permissions')

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
		
	<h2 class="text-center">List of roles who have the <strong>{{ $permission->name }}</strong> permission</h2>
        <div class="row">
	    <div class="col-md-12">
	        <table class="table table-striped">
		    <thead class="blue">
		        <tr>
			    <th>#</th>
			    <th>Role</th>
			    <th>Links</th>
			    <th>Created At</th>
			    <th>Updated At</th>
		        </tr>
		    </thead>
		    <tbody>
			@foreach($permission->roles as $role)
			    <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
			        <th>{{ $role->id }}</th>
                                <td><a href=" {{ route('roles.show', $role->id) }}">{{ $role->name }}</a></td>
				<td>{{ $role->users()->count() }}</td>
			        <td>{{ Carbon::parse($permission->created_at)->diffForHumans() }}</td>
			        <td>{{ Carbon::parse($permission->updated_at)->diffForHumans() }}</td>
			</tr>
			@endforeach
		    </tbody>
	        </table>
            </div> <!-- ./col -->
        </div> <!-- ./row -->

	<div class="form-group wow fadeInLeft">
	    <div class="col-md-12 text-center">
		{!! Html::linkRoute('permissions.index', 'All Permissions', [], ['class' => 'btn btn-default wow bounce fadeInUp']) !!}		
	    </div>
	</div>
    </div> <!-- ./container -->
@endsection
