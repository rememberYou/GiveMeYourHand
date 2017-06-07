@extends('layouts.app')

@section('title', '| Users')

@section('content')

    @include('partials.nav.admin._nav-admin-simplify')

    <div class="container">

	<div class="title wow fadeIn">
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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account's details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
				<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
				     class="img-circle img-responsive">
			    </div>
                            <div class="col-md-9 col-lg-9">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Username:</td>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><a href="mailto: {{ $user->email }}">{{ $user->email }}</a></td>
                                        </tr>
					<tr>
					    <td>Role:</td>
					    <td>
						<a href="{{ route('roles.show', $user->role->id) }}">
						    {{ $user->role->name }}
						</a>
					    </td>
					</tr>
					<tr>
					    <td>Permission:</td>
					    <td>
						<a href="{{ route('permissions.show', $user->role->permission->id) }}">
						    {{ $user->role->permission->name }}
						</a>
					    </td>
					</tr>
					<tr>
                                            <td>Created At</td>
                                            <td>{{ Carbon::parse($user->created_at)->diffForHumans() }}</td>
					</tr>
					<tr>
                                            <td>Updated At:</td>
					    <td>{{ Carbon::parse($user->updated_at)->diffForHumans() }}</td>
					</tr>
                                    </tbody>
                                </table>
                            </div> <!-- ./col -->
                        </div> <!-- ./row -->
                    </div> <!-- ./panel-body -->
                    <div class="panel-footer">
                        <div class="row">
		            <div class="col-sm-6">
				{!! Html::linkRoute('users.edit', 'Edit', [$user->id],
						    ['class' => 'btn btn-warning btn-block wow fadeInLeft']) !!}
		            </div>
		            <div class="col-sm-6">
				{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
				{{ Form::button('<i class="fa fa-times" aria-hidden="true"></i>Delete',
						['type' => 'submit', 'class' => 'btn btn-danger btn-block wow fadeInRight']) }}
				{!! Form::close() !!}
		            </div>
                        </div>
                    </div>
                </div> <!-- ./panel -->

		<div class="form-group">
		    <div class="row">
                        <div class="col-md-4 col-md-offset-4 wow fadeInUp">
			    {!! Html::linkRoute('users.index', 'All Users', [],
						['class' => 'btn btn-primary btn-block wow fadeInLeft']) !!}
		        </div>
		    </div>
		</div>
            </div> <!-- ./col -->
	</div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
