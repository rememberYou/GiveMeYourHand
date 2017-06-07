@extends('layouts.app')

@section('stylesheets')
    <!-- TinyMCE -->
    @include('partials._tinymce')

    <!-- Parsley CSS -->
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    @include('partials.nav.admin._nav-admin-simplify')

    <div class="title wow fadeIn">
	@component('components.backend.widgets.title')
	    @slot('icon')
	         fa-users
	    @endslot
            Users
        @endcomponent
    </div>

    <div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
	    @include('partials._message')
	</div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="design-box log-width classic">
		    {!! Form::open(['route' => 'users.store', 'data-parsley-validate' => '']) !!}                   
                       
			<h2 class="text-center design-title fg-emerald wow fadeIn">New Account</h2>

                        {{ Form::text('username', null, ['class' => 'input pass',
							 'placeholder' => 'Username *',
							 'required' => '',
							 'minlength' => '3',
							 'maxlength' => '32']) }}

                        {{ Form::text('email', null, ['class' => 'input pass',
						      'placeholder' => 'E-Mail Address *',
                                                      'required' => '',
						      'minlength' => '5',
						      'maxlength' => '255']) }}

			<div class="form-group">
			    <div class="col-md-12 text-center">
				{{ Form::label('role', 'Role', ['class' => 'wow fadeInLeft']) }}
				{{ Form::select('role_id', $roles) }}
			    </div>
			</div>

			<div class="form-group text-center">
			    <input name="password"
				   type="password"
				   id="password"			       
				   class="input pass"			       
				   placeholder="Choose a password"
				   minlength="8"
				   parsley-required="true"
				   data-parsley-required-message="The password don't match!"/>
			    
                            <input name="password_confirmation"
				   type="password"
				   id="password_confirmation"
				   class="input pass"			      
				   placeholder="Confirm password"
				   minlength="8"
				   data-parsley-equalto="#password"
				   data-parsley-required-message="The password don't match!"/>
                        </div>
			
			<input type="submit" value="Create it!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"/>

			<div class="form-group wow fadeInLeft">
			    <div class="text-center">
				<span class="span-login">or <a href="/home">Cancel</a></span>
			    </div>
			</div>
			{!! Form::close() !!}
                    </form>
                </div> <!-- ./design-box -->
            </div> <!-- ./col -->
        </div> <!-- ./row -->   
    </div> <!-- ./container -->
@endsection

@section('scripts')
    <!-- Parsley's JavaScript plugins -->
    {!! Html::script('js/parsley.min.js') !!}
@endsection
