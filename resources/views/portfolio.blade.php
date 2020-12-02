@extends('layouts.app')

@section('pagename')
Our Portfolio
@endsection

@section('content')

<div class="welcome">
    <div class="caption">
        <h1></h1>
    </div>
</div>

<div class="container text-center text-dark py-5">
    <h3>Our Investment Portfolio</h3>
    <p>
        View our portfolio, our past transactions every time we buy or sell businesses. These companies are selected
        based on value investing principles and in-depth analysis
        You will be notified on the same day of activity after market is closed.
        You will get a notification on your registered email.
        This is not recommendation to buy/sell.
        We hardly sell the shares but regularly buy the shares of companies that are below its intrinsic value
        We don’t comment on businesses that we hold
        Our principles are based on halal & value investing. We follow the investing principles of great investors such
        as Warren Buffet, Charlie Munger, Mohnish Pabrai, Tom Russo etc.
    </p>
</div>

<div class="welcome">
    <div class="caption">
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center pb-4">Investments</h3>
    <div class="row">

        @guest
        <!-- dummy data -->
        <h5 class="text-center">Please login to view</h5>
        <div class="table-responsive blur">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Investment</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <th scope="row">1</th>
                        <td>Dummy</td>
                        <td>Oil</td>
                        <td> 000 </td>
                        <td>Oct 2020</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Dummy</td>
                        <td>Electronics</td>
                        <td> 000 </td>
                        <td>Feb 2020</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Dummy</td>
                        <td>Pharma</td>
                        <td> 000 </td>
                        <td>Aug 2020</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @else
        <!-- real data here -->
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Action</th>
                        <th scope="col">Share Rate($)</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="border">
                @foreach ($portfolio as $share)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td> {{ $share->company_name}} </td>
                        <td> {{ $share->sector}} </td>
                        <td> {{ $share->action}} </td>
                        <td> {{ $share->share_price}} </td>
                        <td> {{ $share->updated_at}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endguest

    </div>
</div>

@endsection
