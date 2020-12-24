@extends('layouts.app')

@section('pagename')
Request Payment
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <strong>Request Research Report</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <address>
                                <p> <b>Email:</b> info@halalinvestings.com </p>
                            </address>
                        </div>
                        <div class="col-md-6 text-right">
                            <p> <b>Date:</b> @php echo date("Y-m-d") @endphp </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h1>Receipt</h1>
                        </div>
                        </span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Price</th>
                                    <th class="text-center">50%</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-4"><em>{{ $company }}</em></td>
                                    <td class="col-md-3"> $500 </td>
                                    <td class="col-md-2 text-center">$250</td>
                                    <td class="col-md-3 text-center">$250</td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right">
                                        <h4><strong>Total: </strong></h4>
                                    </td>
                                    <td class="text-center text-danger">
                                        <h4><strong>$250</strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col">
                            <div class="col-md-6 test-center mx-auto" id="paypal-payment-button">
                            </div>
                            <script src="https://www.paypal.com/sdk/js?client-id=AVLB8-JHfGJUSlJjs3sg2qSmirjFNZzlICouxrfoEyZjEm0rrXjeBBmcvrVHjCQ8cSGGl1mFJ8BPFF8M&disable-funding=credit,card&currency=USD"></script>
                            <script src="js/payment.js"> </script>
                        </div>
                        <!-- <button type="button" class="btn btn-primary btn-lg btn-block">
                            Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button> -->
                        </td>
                    </div>
                </div>
            </div>
        </div>
        <!-- <small class="text-right">Please save this recipt to provide with paypal payment recipt just in case. </small> -->

    </div>
</div>
@endsection