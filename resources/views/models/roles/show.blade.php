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
	    <div class="col-md-12">
		<h2 class="text-center">List of users who have the <strong>{{ $role->name }}</strong> role</h2>
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
		        </tr>
		    </thead>
		    <tbody>
			@foreach($role->users as $user)
			    <tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
			        <th>{{ $user->id }}</th>
                                <td><a href=" {{ route('users.show', $user->id) }}">{{ $user->username }}</a></td>
                                <td><a href=" {{ route('roles.show', $role->id) }}">{{ $role->name }}</a></td>
                                <td><a href=" {{ route('permissions.show', $role->permission->id) }}">{{ $role->permission->name }}</a></td>
			        <td><a href="mailto: {{ $user->email }}">{{ $user->email }}</a></td>
			        <td>{{ Carbon::parse($user->created_at)->diffForHumans() }}</td>
			        <td>{{ Carbon::parse($user->updated_at)->diffForHumans() }}</td>
			    </tr>
			@endforeach
		    </tbody>
	        </table>
            </div>
        </div> <!-- ./row -->

        <div class="form-group wow fadeInLeft">
	    <div class="col-md-12 text-center">
		{!! Html::linkRoute('roles.index', 'All Roles', [], ['class' => 'btn btn-default wow bounce fadeInUp']) !!}		
	    </div>
	</div>
    </div> <!-- ./container -->
@endsection
