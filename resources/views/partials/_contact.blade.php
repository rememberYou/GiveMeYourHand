<div class="row">
    <div class="col-md-12">
        <div class="text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <h2 class="title text-center">Contact Us</h2>
        </div>
    </div>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 wow fadeIn"
	 style="visibility: visible; animation-name: fadeIn;">
        <p>
	    A question? A demand? Send us your message and we will try to
	    respond within 24 hours!
        </p>

        {!! Form::open(['url' => 'contact', 'class' => 'form', 'id' => 'contactForm', 'novalidate', 'name' => 'sentMessage']) !!}

        <div class="row control-group">
	    <div class="form-group col-xs-12 floating-label-form-group controls">
                {!! Form::label('E-Mail Address') !!}
                {!! Form::text('email', null, ['class' => 'form-control',
					       'placeholder' => 'E-Mail Address',
					       'id' => 'email',
					       'required',
					       'data-validation-required-message' => 'Please enter your email address.']) !!}
                <p class="text-danger"></p>
	    </div>
        </div>

        <div class="row control-group">
	    <div class="form-group col-xs-12 floating-label-form-group controls">
                {!! Form::label('Subject') !!}
                {!! Form::text('subject', null, ['required',
						 'class' => 'form-control',
						 'placeholder' => 'Subject',
						 'id' => 'subject',
						 'data-validation-required-message' => 'Please enter your subject.']) !!}
                <p class="text-danger"></p>
	    </div>
        </div>

        <div class="row control-group">
	    <div class="form-group col-xs-12 floating-label-form-group controls">
                {!! Form::label('Message') !!}
                {!! Form::textarea('message', null, ['required', 'class' => 'form-control',
						     'placeholder' => 'Message',
						     'id' => 'message',
						     'rows' => '5',
						     'data-validation-required-message' => "Please enter your message."]) !!}
                <p class="text-danger"></p>
	    </div>
        </div>
        <br>
        <div class="row control-group">
	    <div class="form-group">
		<div class="col-xs-12">
		    {!! Recaptcha::render() !!}

		    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
			    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
		    @endif
                </div>
	    </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="row">
	    <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-default btn-form wow tada"
			style="visibility: visible; animation-name: tada;"
			id="btnSubmit">Send</button>
	    </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- ./col -->
</div> <!-- ./row -->
