<div class="panel panel-default">
    <div class="panel-body">
	<h2><strong>{{ $title }}</strong></h2>
    </div>
    <div class="panel-footer">
	<p class="lead text-center">{{ $slot }}</p>
	<div class="row price green-price">{{ '$' . $price}}</div>
	<a href="#" class="my-btn my-btn-blue">
	    <i class="fa fa-shopping-basket" aria-hidden="true"></i>Purchase
	</a>
    </div>
</div>
