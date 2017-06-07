<div class="row">
    <div class="col-md-12">
        <div class="text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <h2 class="title text-center">About</h2>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <p class="lead wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            Behind the GiveMeYourHelp's name hides dozens of qualified
            people who are only waiting to help you with your projects
            or to find you objectives.
        </p>
    </div>
</div> <!-- ./row -->
<div class="container-portrait">
    <div class="row">
	<p class="lead text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
	    Example of portraits of these skilled people who help people every day
        </p>
        @foreach($portraits as $portrait)
	    <div class="col-md-3 text-center portrait wow fadeIn" data-wow-delay="{{ $loop->index * (1 * 0.2) }}s"
		 style="visibility: visible; animation-delay: 0.2s animation-name: fadeIn;">
                @component('components.frontend.portraits.show')
                @slot('picture')
                {{ $portrait->picture }}
                @endslot

                @slot('firstname')
	        {{ $portrait->firstname }}
	        @endslot

		@slot('name')
	        {{ $portrait->name }}
	        @endslot

                @slot('status')
                {{ $portrait->status }}
                @endslot

                {!! $portrait->content !!}

                @slot('facebook')
                {{ $portrait->facebook }}
                @endslot

                @slot('linkedin')
                {{ $portrait->linkedin }}
                @endslot

                @slot('email')
                {{ $portrait->email }}
                @endslot
                @endcomponent
            </div>
	@endforeach
    </div> <!-- ./row -->
</div> <!-- ./container-portrait -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p class="lead wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            Most people have ideas, but do not know how to go about it or
            give up quickly to the slightest difficulty.
        </p>
        <p class="lead wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            We will provide you with a follow-up on these objectives
            throughout your journey through video conferencing by connecting
            you with the right person.
        </p>
        <p class="lead wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            For those interested, the first video conference is
            <strong>free</strong>, you have nothing to lose, just to win!
        </p>
    </div>
</div> <!-- ./row -->
<div class="statistical">
    <div class="row">
        <p class="title-stats lead text-center wow fadeIn"
	   style="visibility: visible; animation-name: fadeIn;">Expressed in figures, this mean:</p>
        @foreach($statistics as $statistic)
            <div class="col-lg-4 text-center statistic wow fadeIn" data-wow-delay=".1s"
		 style="visibility: visible; animation-delay: 0.1s animation-name: fadeIn;">
                @component('components.frontend.statistics.show')
                @slot('icon')
                {{ $statistic->icon }}
                @endslot

                @slot('name')
                {{ $statistic->name }}
                @endslot

                @slot('number')
                {{ $statistic->number }}
                @endslot
                @endcomponent
            </div>
	@endforeach
    </div> <!-- ./row -->
</div> <!-- ./statistical -->
