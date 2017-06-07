<div class="form-group">
    <div class="text-center">
	{!! $links !!}
    </div>

    <div class="col-md-12">
	<hr class="wow fadeIn"
	    style="visibility: visible; animation-name: fadeIn">
    </div>

    <div class="form-actions">
	<div class="col-md-12 text-center">
	    <a href={{ $route }} class="btn btn-lg btn-primary wow bounce fadeInUp animated animated"
	       style="visibility: visible; animation-name: fadeInUp">
		<i class="fa fa-plus" aria-hidden="true"></i>Create New {{ $btnTitle }}
	    </a>
	</div>
    </div>

    <div class="form-group wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft">
	<div class="col-md-12 text-center">
	    <a href="/home" class="btn btn-default btn-home wow fadeInUp"
	       style="visibility: visible; animation-name: fadeInUp">
		<i class="fa fa-home" aria-hidden="true"></i>Back Home</a>
	</div>
    </div>
</div>
