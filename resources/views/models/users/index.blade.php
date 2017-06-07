@extends('layouts.app')

@section('title', '| Users')

@section('content')

    @include('partials.nav.admin._nav-admin-simplify')

    <div class="container">

	<div class="title wow fadeIn" style="visibility: visible; animation-name: fadeIn">
	    @component('components.backend.widgets.title')
	        @slot('icon')
	           fa-user
	    @endslot
            Users
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
		    <thead class="blue">
		        <tr>
			    <th>#</th>
			    <th>Username</th>
                            <th>Role</th>
                            <th>Permission</th>
			    <th>Email</th>
			    <th>Created At</th>
			    <th>Updated At</th>
                            <th></th>
		        </tr>
		    </thead>
		    <tbody>
			@foreach($users as $user)
			    <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s"
				       style="visibility: visible; animation-name: fadeIn">
			        <td>{{ $user->id }}</td>
                                <td>
				    <a href="{{ route('users.show', $user->id) }}">
					{{ $user->username }}
				    </a>
				</td>
				<td>
				    <a href="{{ route('roles.show', $user->role->id) }}">
					{{ $user->role->name }}
				    </a>
				</td>
				<td>
				    <a href="{{ route('permissions.show', $user->role->permission->id) }}">
					{{ $user->role->permission->name }}
				    </a>
				</td>
			        <td><a href="mailto: {{ $user->email }}">{{ $user->email }}</a></td>
			        <td>{{ Carbon::parse($user->created_at)->diffForHumans() }}</td>
			        <td>{{ Carbon::parse($user->updated_at)->diffForHumans() }}</td>
                                <td>				    				
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn-sm btn-warning">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

				    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],
						    'id' => 'form-delete-users-' . $user->id]) !!}
					<a href="" class="data-delete btn-sm btn-danger" data-form="users-{{ $user->id }}">
					    <i class="fa fa-times" aria-hidden="true"></i>Delete
					</a>
				{!! Form::close() !!}				                                   
                                </td>
			    </tr>
			@endforeach
		    </tbody>
	        </table>
            </div> <!-- ./col -->
        </div> <!-- ./row-->

	@component('components.backend.widgets.nav-page')
	    @slot('links')
	        {!! $users->links(); !!}
  	    @endslot

	    @slot('route')
                {{ route('users.create') }}
	    @endslot
	
	    @slot('btnTitle')
	        User
	    @endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
