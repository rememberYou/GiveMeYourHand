@if (Session::has('success'))
    <div class="alert alert-success text-center" role="alert">
	<strong><i class="fa fa-check" aria-hidden="true"></i>Success:</strong> {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger text-center" role="alert">
	<strong><i class="fa fa-times" aria-hidden="true"></i>Error:</strong> {{ Session::get('error') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger text-center" role="alert">
	<strong>Error(s):</strong>
	<ul>
	    @foreach ($errors->all() as $error)
		<li><i class="fa fa-times" aria-hidden="true"></i> {{ $error }}</li>
	    @endforeach
	</ul>
    </div>
@endif
