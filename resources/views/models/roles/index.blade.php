@extends('layouts.app')

@section('title', '| Roles')

@section('content')

    @include('partials.nav.admin._nav-admin-simplify')

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
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>
	
        <div class="row">
            <div class="col-md-8 col-md-offset-2">	
	        <table class="table table-striped">
	            <thead class="blue">
		        <tr>
		            <th>#</th>
		            <th>Name</th>
			    <th>Permission</th>
                            <th>Link</th>
                            <th>Created At</th>
			    <th>Updated At</th>
                            <th></th>
		        </tr>
	            </thead>
	            <tbody>
			@foreach ($roles as $role)
			    <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
				<th>{{ $role->id }}</th>
				<td>
				    <a href="{{ route('roles.show', $role->id) }}">
					{{ $role->name }}
				    </a>
				</td>
				<td>
				    <a href="{{ route('permissions.show', $role->permission->id) }}">
					{{ $role->permission->name }}
				    </a>
				</td>
				<td>{{ $role->users()->count() }}</td>
				<td>{{ Carbon::parse($role->created_at)->diffForHumans() }}</td>
				<td>{{ Carbon::parse($role->updated_at)->diffForHumans() }}</td>
				<td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn-sm btn-warning">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],
                                                    'id' => 'form-delete-roles-' . $role->id]) !!}
					<a href="" class="data-delete btn-sm btn-danger" data-form="roles-{{ $role->id }}">
					    <i class="fa fa-times" aria-hidden="true"></i>Delete</a>
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
	        {!! $roles->links(); !!}
  	    @endslot

	    @slot('route')
                {{ route('roles.create') }}
	    @endslot
	
	@slot('btnTitle')
	Role
	@endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
