@extends('layouts.app')

@section('pagename')
Home
@endsection

@section('content')

<div class="welcome">
    <div class="caption">
        <h1>Welcome</h1>
    </div>
</div>

<div class="container text-left text-dark py-5">
    <h3>About us</h3>
    <p>In today’s world, it is very difficult to invest our money without fear of either being duped/cheated. We have
        seen innocent investors getting conned in the name of God, religion, community & asset class. Irrespective of
        your religion, cast, age & geography, one must possess financial literacy to ensure your hard-earned money does
        not lose value (against inflation). So, it becomes necessary for you to invest in asset class that beats
        inflation (at the least) to ensure your savings are not lost.
        <br>
        <br>
        There are many asset-classes that you can invest (ex: land, house, gold, stocks etc.). Each of these assets have
        their own advantages and disadvantages. We like stocks and hence invest in businesses that are listed in Indian
        stock market. In Indian stock market, finding such companies and ensuring that they meet parameters of growth
        and being run by honest management is a daunting task.
        <br>
        <br>
        The word ‘Halal’ means permitted in Islam. For example: its is prohibited in Islam to invest in companies in the
        business of manufacturing/distribution of alcohol. If you are looking to invest in ‘halal businesses’, your
        options are limited even limited. It is very hard to find a good mutual fund based on halal principle.
        <br>
        <br>
        Halal investing for us means identifying companies that are into halal businesses, financially sound and run by
        able management. This is the only way to ensure we don’t lose our hard-earned money. We have followed this
        approach since we started our investing journey and Alhamdulillah (Praise be to God) we have performed well. If
        you want to see which are the companies that fit our investing critieria and how we analyse them then you are at
        right place.
        <br>
        <br>
        We encourage you to explore our product offerings, read the free research report. Our aim is to help you to
        identify halal businesses, assist you in making informed decision while we do the hard work of collecting &
        presenting required information. Generally, our aim is to identify high-quality companies, buy and hold them for
        a long period. We plan to grow our with the businesses that we invested in and have peace of mind.
    </p>
</div>

<div class="welcome">
    <div class="caption">
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center pb-4">Services</h3>
    <div class="row">

        <div class="col-md-4">
            <a href="/research_reports">
                <div class="card mb-3 shadow index_card">
                    <div class="card-header bg-primary text-light">Company Research Reports</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="images/research_reports.jpg" width="100%">
                        </h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/portfolio">
                <div class="card mb-3 shadow index_card">
                    <div class="card-header bg-primary text-light">Our Portfolio</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="images/portfolio.jpg" width="100%">
                        </h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/request_report">
                <div class="card mb-3 shadow index_card">
                    <div class="card-header bg-primary text-light">Request company Analysis</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="images/request_report.jpg" width="100%">
                        </h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection