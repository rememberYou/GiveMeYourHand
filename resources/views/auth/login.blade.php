@extends('layouts.app')

@section('stylesheets')
    <!-- Parsley CSS -->
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    @include('partials.nav.user._nav-simplify')

    <div class="container">

	<div class="row">
	    <div class="col-md-8 col-md-offset-2 text-center">
		@include('partials._message')
	    </div>
	</div>
	
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="design-box log-width classic">
                    <form class="form-horizontal" role="form" data-parsley-validate=''
			  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h2 class="text-center design-title fg-emerald wow fadeIn">Login</h2>

                        <div class="form-group">
			    <div class="col-md-12">
				{{ Form::text('username', null, ['class' => 'input pass',
								 'placeholder' => 'Username',
								 'required' => '',
								 'minlength' => '3',
								 'maxlength' => '32']) }}
			    </div>
                        </div>
			
                        <div class="form-group">
			    <div class="col-md-12">
                                <input name="password" type="password"
				       class="input pass"
				       placeholder="Choose a password"
				       required="required"
				       minlength="8"/>
			    </div>
                        </div>

                        <div class="form-group wow fadeInLeft">
			    <a class="btn btn-link forgot-password" href="{{ route('password.request') }}">
				Forgot Your Password?
			    </a>
                        </div>                        
			
                        <input type="submit" value="Sign in!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"/>

                        <div class="form-group wow fadeInLeft">
			    <div class="col-md-12 text-center">
                                <span class="span-login"><a href="/home">Cancel</a> or <a href="/register">Register</a></span>
			    </div>
                        </div>
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
