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

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
		@include('partials._message')
	    </div>
	</div>
	
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
	        <table class="table table-striped">
	            <thead class="blue">
		        <tr>
		            <th>#</th>
		            <th>Name</th>
                            <th>Link</th>
                            <th></th>
		        </tr>
	            </thead>
	            <tbody>
		    @foreach ($permissions as $permission)
			<tr class="wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s">
			    <th>{{ $permission->id }}</th>
                            <td>
				<a href="{{ route('permissions.show', $permission->id) }}">
				    {{ $permission->name }}
				</a>
			    </td>
                            <td>{{ $permission->users()->count() }}</td>
                            <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                 {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id],
                                                 'id' => 'form-delete-permissions-' . $permission->id]) !!}
                                    <a href="" class="data-delete btn-sm btn-danger" data-form="permissions-{{ $permission->id }}">
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
	        {!! $permissions->links(); !!}
  	    @endslot

	    @slot('route')
                {{ route('permissions.create') }}
	    @endslot
	
	    @slot('btnTitle')
	        Permission
	    @endslot
	@endcomponent
    </div> <!-- ./container -->
@endsection
