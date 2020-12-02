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

<div class="container text-center text-dark py-5">
    <h3>About us</h3>
    <p>In today’s world, it is very difficult to invest our money without fear of either being duped/cheated. We have
        seen innocent investors getting conned in the name of God, religion, community, asset class. Irrespective of
        your religion, cast, age & geography, one must possess financial literacy to ensure your hard-earned money does
        not lose value (against inflation). So it becomes necessary for you to invest in asset class that beats
        inflation (atleast) to ensure your savings are not lost.</p>
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
