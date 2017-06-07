<div class="row">
    <div class="col-xs-12">
        <div class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <h2 class="title text-center">Services</h2>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
        <p class="lead text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            We provide different services for various purpose like self
	    development coaching with own coaching and training programmes
	    to help you to reaches your goal.
        </p>
    </div>
</div>

<div class="service_area wow fadeIn" data-wow-delay=".1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="row">
        @foreach($services as $service)
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0 text-center">
		<div class="form-group">
                    @component('components.frontend.services.show')
                    @slot('color')
                    {{ $service->color }}
                    @endslot

                    @slot('icon')
                    {{ $service->icon }}
                    @endslot

                    @slot('title')
                    {{ $service->title }}
                    @endslot

                    {!! $service->content !!}
		    @endcomponent
		</div>
            </div>
	@endforeach
    </div> <!-- ./row -->
</div> <!-- ./service_area -->
