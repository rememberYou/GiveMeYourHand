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
                    <form class="form-horizontal" role="form" data-parsley-validate='' method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
			<h2 class="text-center design-title fg-emerald wow fadeIn">New Account</h2>                       

                        {{ Form::text('username', null, ['class' => 'input pass',
							 'placeholder' => 'Username *',
							 'required' => '', 'minlength' => '3',
							 'maxlength' => '32']) }}
		        
                        {{ Form::text('email', null, ['class' => 'input pass',
						      'placeholder' => 'E-Mail Address *',
                                                      'required' => '', 'minlength' => '5',
						      'maxlength' => '255']) }}

                        <input name="password" type="password"
			       class="input pass"
			       placeholder="Choose a password"
			       required="required"
			       minlength="8"/>
			
                        <input name="password_confirmation" type="password"
			       class="input pass"
			       placeholder="Confirm password"
			       required="required"
			       minlength="8" />
			                        
                        <div class="checkbox wow fadeInDown">
			    <label>
                                <input value="terms" type="checkbox" name="terms">
                                I am over 18 and agree to the <br>
                                <a class="aTerms" target="_blank" href={{ route("terms.index") }}>Terms of Use</a> and
                                <a class="aTerms" target="_blank" href={{ route("privacy.index") }}>Privacy Policy</a>
			    </label>
                        </div>

                        <div class="col-md-6 col-md-offset-3 capcha">
			    {!! Recaptcha::render() !!}
                        </div>
			
                        <input type="submit" value="Sign me up!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"/>
			
                        <div class="form-group wow fadeInLeft">
			    <div class="col-md-12 text-center">
                                <span class="span-login"><a href="/home">Cancel</a> or <a href="/login">Login</a></span>
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
