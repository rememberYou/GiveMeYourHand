<!-- header start -->
<!-- ================ -->
<header class="header fixed fixed-header-on clearfix navbar navbar-fixed-top">
    <div class="container">
	<div class="row">
	    <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-6">
		<div class="navbar-header logo smooth-scroll">
                    <a class="navbar-brand" href="/home">
			<img alt="Brand" src="{{ asset('images/logo.png') }}">
                    </a>
	            <div class="site-name-and-slogan smooth-scroll">
			<div class="site-name"><a href="/home">GiveMeYourHand</a></div>
			<div class="site-slogan">You just need to ask it!</div>
	            </div>
		</div>
	    </div>
	    <div class="col-md-8 col-sm-12 col-xs-6">
		<div class="main-navigation animated">
		    <nav class="navbar navbar-inverse bg-inverse" role="navigation">
			<div class="container-fluid">

			    <!-- Toggle get grouped for better mobile display -->
			    <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
	                            <li class="active"><a href="#banner">Home</a></li>
	                            <li><a href="#services">Services</a></li>
	                            <li><a href="#about">About</a></li>
	                            <li><a href="#offers">Offers</a></li>
	                            <li><a href="#contact">Contact</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
                                    <!-- Authentication Links -->
	                            @if (Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
	                            @else
					<li class="dropdown">
	                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->username }} <span class="caret"></span>
		                            </a>
		                            <ul class="dropdown-menu" role="menu">
						<li>
						    <a href="{{ route('users.edit', Auth::user()) }}">
							<i class="fa fa-cogs" aria-hidden="true"></i>Settings
						    </a>
						</li>
						<li>
						    <a href="{{ route('offers.index') }}">
							<i class="fa fa-gift" aria-hidden="true"></i>Offers
						    </a>
						</li>
						<li>
						    <a href="{{ route('portraits.index') }}">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>Portraits
						    </a>
						</li>
						<li>
						    <a href="{{ route('services.index') }}">
							<i class="fa fa-folder" aria-hidden="true"></i>Services
						    </a>
						</li>
						<li>
						    <a href="{{ route('statistics.index') }}">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>Statistics
						    </a>
						</li>
						<li>
			                            <a href="{{ route('logout') }}"
			                               onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
							<i class="fa fa-sign-out" aria-hidden="true"></i>Logout
			                            </a>
			                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
			                            </form>
						</li>
                                            </ul>
					</li>
                                    @endif
				</ul>
			    </div> <!-- ./container-fluid -->			    
		        </nav>		    
		    </div> <!-- ./main-navigation -->		
		</div> <!-- ./col -->
	    </div> <!--./row -->
	</div> <!--./container -->
</header>
