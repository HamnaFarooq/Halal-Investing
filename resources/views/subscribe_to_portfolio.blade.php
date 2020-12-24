@extends('layouts.app')

@section('pagename')
Portfolio subscription
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h3 class="text-center my-5">
                Subscription Expiring soon!
            </h3>
            <p class="text-center">
                Please click here to extend your subscription to Porfolio for one more year.
            </p>
            <div class="text-center">
            <div class="btn" id="paypal-payment-button">
            </div></div>
            <script src="https://www.paypal.com/sdk/js?client-id=AVLB8-JHfGJUSlJjs3sg2qSmirjFNZzlICouxrfoEyZjEm0rrXjeBBmcvrVHjCQ8cSGGl1mFJ8BPFF8M&disable-funding=credit,card&currency=USD"></script>
            <script src="js/portfolio.js"></script>

        </div>
    </div>
</div>
@endsection