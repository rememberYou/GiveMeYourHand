@extends('layouts.app')

@section('title', '| Settings')

@section('stylesheets')
    <!-- Parsley CSS -->
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    @if (Auth::user()->isAdmin())
        @include('partials.nav.admin._nav-admin-simplify')
    @elseif (Auth::user()->isStaff())
        @include('partials.nav.staff._nav-staff-simplify')
    @else
        @include('partials.nav.user._nav-simplify')
    @endif

    <div class="container">	
	
	<div class="title wow fadeIn" style="visibility: visible; animation-name: fadeIn">
	    @component('components.backend.widgets.title')
	    @slot('icon')
	    fa-gears
	    @endslot
            Settings
            @endcomponent
	</div>

	<div class="row">
	    <div class="col-md-8 col-md-offset-2 text-center">
		@include('partials._message')
	    </div>
	</div>

        {!! Form::model($user, ['route' => ['users.update', $user->id],
				'data-parsley-validate' => '',
				'method' => 'PUT']) !!}

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="design-box log-width wow fadeIn classic"
		     style="visibility: visible; animation-name: fadeIn">
		    <h2 class="text-center design-title fg-emerald wow fadeIn"
			       style="visibility: visible; animation-name: fadeIn">Account Edit</h2>
                    <div class="form-group text-center">
                        {{ Form::text('username', null, ['class' => 'input pass',
							 'placeholder' => 'Username',
							 'required' => '',
							 'minlength' => '3',
							 'maxlength' => '32']) }}
                    </div>
		    
                    <div class="form-group text-center">
                        {{ Form::text('email', null, ['class' => 'input pass',
						      'placeholder' => 'E-Mail Address',
                                                      'required' => '',
						      'minlength' => '5',
						      'maxlength' => '255']) }}
                    </div>

		    @if (Auth::user()->isAdmin())
			<div class="form-group">
			    <div class="col-md-12 text-center">
				{{ Form::label('role', 'Role', ['class' => 'wow fadeInLeft']) }}
				{{ Form::select('role_id', $roles) }}
			    </div>
			</div>			
		    @endif
		    
		    <div class="form-group text-center">
			@if (!Auth::user()->isAdmin())
                            <input name="old_password"
				   type="password"
				   id="old_password"
				   class="input pass"			       
				   placeholder="Old password"
				   minlength="8"/>
			@endif
			
                        <input name="new_password"
			       type="password"
			       id="new_password"			       
			       class="input pass"			       
			       placeholder="Choose a password"
                               minlength="8"
			       parsley-required="true"
                               data-parsley-required-message="The password don't match!"/>
			
                        <input name="new_password_confirmation"
			       type="password"
			       id="new_password_confirmation"
			       class="input pass"
			       placeholder="Confirm password"
                               minlength="8"
			       data-parsley-equalto="#new_password"
                               data-parsley-required-message="The password don't match!"/>
                    </div>

                    <input type="submit" value="Edit!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"
			   style="visibility: visible; animation-name: fadeInDown"/>

		    <div class="form-group">
                        <div class="text-center wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft">
			    <span class="span-login">or
				@if (Auth::user()->isAdmin())
				    {!! Html::linkRoute('users.index', 'Cancel', null) !!}
				@else
				    <a href="/home">Cancel</a>
				@endif
			    </span>
                        </div>
		    </div>
		    {!! Form::close() !!}
		    <div class="form-group text-center wow fadeInRight" style="visibility: visible; animation-name: fadeInRight">			
			{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],
					'id' => 'form-delete-users-' . $user->id]) !!}
                        <a href="" class="data-delete btn-sm btn-danger" data-form="users-{{ $user->id }}">
			    <i class="fa fa-times" aria-hidden="true"></i>Delete my account!
			</a>
                        {!! Form::close() !!}
                    </div>
                </div> <!-- ./design-box -->
	    </div> <!-- ./col -->
	</div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection

@section('scripts')
    <!-- Parsley's JavaScript plugins -->
    {!! Html::script('js/parsley.min.js') !!}
@endsection
