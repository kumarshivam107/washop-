@extends('wayshop.layouts.master')
@section('content')

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 text-center">
            <h1>Thanks for Purchasing With Us.</h1>
            <h2>Your COD Order Has Been Placed and Your order Number is {{ Session::get('order_id') }} .</h2>
            <p>Kindly Pay {{ Session::get('grand_total') }} at Your Prefreed Method to the payment Gateway.</p>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <script src="https://js.stripe.com/v3/"></script>

            <form action="/charge" method="post" id="payment-form">
                <div class="form-row inline">
                    <div class="col">
                        <label for="name">
                            Name
                        </label>
                        <input id="name" name="name" placeholder="Jenny Rosen" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="email">
                            Email Address
                        </label>
                        <input id="email" name="email" type="email" placeholder="jenny.rosen@example.com" class="form-control" required>
                    </div>
                </div>

                    <label for="iban-element">
                        IBAN
                    </label>
                    <div id="iban-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
        
                <div id="bank-name"></div>

                <button class="btn btn-success">Submit Payment</button>
                <!-- Used to display form errors. -->
                <div id="error-message" role="alert"></div>

                <!-- Display mandate acceptance text. -->
                <div id="mandate-acceptance">
                    By providing your IBAN and confirming this payment, you authorise
                    (A) Rocketship Inc.
                    and Stripe, our payment service provider, to send instructions to your bank to
                    debit your account and (B) your bank to debit your account in accordance with
                    those instructions. You are entitled to a refund from your bank under the terms
                    and conditions of your agreement with your bank. A refund must be claimed
                    within 8 weeks starting from the date on which your account was debited.
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>
@endsection