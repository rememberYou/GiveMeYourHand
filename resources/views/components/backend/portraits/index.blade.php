<div class="portrait-header">
    <img class="img-circle img-responsive center-block" src="{{ asset('/pictures/' . $picture) }}" alt="Picture">
    <h3><a href={{ $route }}>{{ $firstname }} {{ $name }}</a></h3>
    <h4>{{ $status }}</h4>
    <p>{{ $slot }}</p>
</div>
<span class="portrait-footer">
    @if(strlen($facebook) > 0)
	<a href="{{ $facebook }}" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
    @else
	<span><i class="fa fa-facebook" aria-hidden="true"></i></span>
    @endif
    
    @if(strlen($linkedin) > 0)
	<a href="{{ $linkedin }}" target="_blank" title="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
    @else
	<span><i class="fa fa-linkedin" aria-hidden="true"></i></span>
    @endif

    <a href="{{ 'mailto:' . $email }}" target="_blank" title="E-Mail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
</span>
