@extends('layouts.app')

@section('content')

    @include('partials.nav.user._nav-simplify')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="design-box terms wow fadeIn">
                    <h1>Terms of Use</h1>

                    <div class="page-header">
                        <h2>1. General Terms</h2>
                    </div>
                    <p>
                        <strong>1.1</strong> By accessing and placing an order with
			GiveMeYourHelp, you confirm that you are in agreement with
			and bound by the terms and conditions contained in the Terms
			Of Use outlined below. These terms apply to the entire
			website and any email or other type of communication between
			you and GiveMeYourHelp.
                    </p>

                    <div class="page-header term">
                        <h2>2. Products</h2>
                    </div>
                    <p>
                        <strong>2.1</strong> All products and services are delivered
			by GiveMeYourHelp electronically to your email address.
                    </p>
                    <p>
                        <strong>2.2</strong> GiveMeYourHelp is not responsible for
			any technological delays beyond our control. If your spam
			blocker blocks our emails from reaching you or you do not
			provide a valid email address where you can be reachable
			then you can access your download from the Purchases
			page.
                    </p>

                    <div class="page-header term">
                        <h2>3. Security</h2>
                    </div>
                    <p>
                        <strong>3.1</strong> GiveMeYourHelp does not process any
			order payments through the website. All payments are
			processed securely through PayPal, a third party online
			payment provider. Feel free to contact us about our security
			policies.
                    </p>

                    <div class="page-header term">
                        <h2>4. Refunds</h2>
                    </div>
                    <p>
                        <strong>4.1</strong> You have 24 hours to inspect your
			purchase and to determine if it does not meet with the
			expectations laid forth by the seller. In the event that you
			wish to receive a refund, GiveMeYourHelp will issue you a
			refund and ask you to specify how the product failed to live
			up to expectations.
                    </p>

                    <div class="page-header term">
                        <h2>5. Ownership</h2>
                    </div>
                    <p>
                        <strong>5.1</strong> Ownership of the product is governed by
			the usage license selected by the seller.
                    </p>

                    <div class="page-header changes">
                        <h2>Changes to terms</h2>
                    </div>
                    <p>
			If we change our terms of use we will post those changes on
			this page. Registered users will be sent an email that
			outlines changes made to the terms of use.
                    </p>
                </div> <!-- ./design-box -->
	    </div> <!-- ./col -->
	</div> <!-- ./row -->
    </div> <!-- ./container -->
@endsection
