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
			  method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
			<h2 class="text-center design-title fg-emerald wow fadeIn">Reset Password</h2>

			{{ Form::text('email', null, ['class' => 'input pass',
						      'placeholder' => 'E-Mail Address',
						      'required' => '',
						      'minlength' => '5',
						      'maxlength' => '255']) }}

			<input type="submit" value="Reset Password!" class="btn-input bg-emerald bs-dark-emerald wow fadeInDown"/>
			
			<div class="form-group wow fadeInLeft">
			    <div class="col-md-12 text-center">
				<span class="span-login">
				    <a href="/home">Cancel</a> or <a href="/login">Login</a>
				</span>
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
