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

<div class="container text-left text-dark py-5">
    <h3>Our Investment Portfolio</h3>
    <p>
    When we started learning about stock market, investing, financial analysis etc., there was no way to test our knowledge & understanding other than investing our own money & creating portfolio. You cannot become a swimmer by sitting on the shore. 
    <br>
    <br>
    We have been investing in Stock markets from 2017 and we have witnessed & experienced one complete cycle (peak & crash).  We have stocks that multiplied 3x and also companies that went bankrupt. Our portfolio is a testament that we have evolved (as investors) over the years. We are proof that stock market is more about common sense investing. Overall, we have achieved 17.4% CAGR over past 3-4 years while Sensex returned 13.7% CAGR over the same period . Note: Calcuation BSE from 31,000 in Sep 2017 to 45,600 in Dec2020
    <br>
    <br>
    Our investing principles is completely based on halal, value investing & in-depth analysis. We follow the investing principles of great investors such as Warren Buffet, Charlie Munger, Mohnish Pabrai, Tom Russo etc. 
    <br>
    <br>
    You can view our portfolio, businesses we own, companies that constitute top holding. See our complete portfolio. We invest in companies that match our stringent filtering criteria and are below their intrinsic value (as per our calculation). While we regularly buy the shares of companies that are below their intrinsic value, we hardly sell the shares. 
    <br>
    <br>
    The portfolio includes company-name, its weightage in the portfolio, average buying price. We will show you our portfolio against our total investment & against current price. After from this, you can view our past transactions, from 2017, to get an idea about our maturity as investors. Portfolio includes numbers after stock split, bonus etc. excluding brokerages.
    <br>
    <br>
    Whenever we buy/sell shares, you will be notified on the same day. We will send you an email to your registered email ID post market-closure. 
    <br>
    <br>
    <b> Note: The stocks we own in our portfolio should not be construed as investment-recommendation. </b> 
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
        @if(Auth::user()->subscribed == 'yes')
        <!-- real data here -->
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Shares</th>
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
                        <td> {{ $share->share_percentage}} % </td>
                        <td> {{ $share->action}} </td>
                        <td> {{ $share->share_price}} </td>
                        <td> {{ $share->date}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="col">
        <div class="text-right">
            <a href="/subscribed">
            <button class="btn btn-primary" >
                Register
            </button>
            </a>
        </div>
        <h5 class="text-center">Please register to our portfolio services to view</h5>
    </div>
        <br>
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
        @endif

        @endguest

    </div>
</div>

@endsection
