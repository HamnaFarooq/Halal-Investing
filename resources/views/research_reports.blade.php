@extends('layouts.app')

@section('pagename')
Research Reports
@endsection

@section('content')

<div class="research_reports">
    <div class="caption">
        <h1>Research Reports</h1>
    </div>
</div>

<div class="container text-center text-dark py-5">
    <!-- <h3>What we offer</h3> -->
    <!-- <h3>Research Reports</h3> -->
    <p>We are passionate about analysing various businesses. Our reports are lengthy with lot of critical information
        about the business, operating model, revenue generation mechanisms etc.
        <!-- <br> -->
        The report contains analysis of annual reports of last 10 years. Some companies do not have AR for last 10
        years, in such cases we analyse all the available AR in public domain.
        <!-- <br> -->
        This is a great source of information for get insight into the company’s business model, financial strength &
        management analysis. The reports are not the typical reports published by financial houses and does not give you
        forward looking estimates.
        <!-- <br> -->
        These reports provides you with the information required to take investing decision. Its your money and its your
        call whether to invest or pass.
        <!-- <br> -->
        Reports contain lot of information and does not warrant additional information. We reserve the right to respond
        to queries based on the current workload.
        <!-- <br> -->
        Over the past years, we have released 1 research report every 45 days. We don’t believe in publishing reports
        just for the sake of it.
        <!-- <br> -->
        As a principle, we analyse the companies that fall under purview of ‘Halal Concept’. So don’t expect us to
        research on companies whose core business is Entertainment, Interest, Gambling, Alcohol and banking.
        Generally we publish the analysis report every 45 days. This is because of the exhaustive research required to
        analyse the company , it business model, financials & management qualities. But its worth the wait.
    </p>
</div>

<div class="research_reports">
    <div class="caption">
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center pb-4">Company Analysis</h3>
    <div class="row">

        @guest
        <h5 class="text-center">Please login to view</h5>
        <!-- dummy data -->
        <div class="table-responsive blur">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Last updated</th>
                        <th scope="col">Download PDF</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <th scope="row">1</th>
                        <td>Dummy</td>
                        <td>Oil</td>
                        <td>Oct 2020</td>
                        <td> <button class="btn btn-primary"> Free </button> </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Dummy</td>
                        <td>Electronics</td>
                        <td>Feb 2020</td>
                        <td> <button class="btn btn-primary"> Register </button> </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Dummy</td>
                        <td>Pharma</td>
                        <td>Aug 2020</td>
                        <td> <button class="btn btn-primary"> Download </button> </td>
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
                        <th scope="col">Last updated</th>
                        <th scope="col">Download PDF</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <!-- free ones first -->
                    @foreach ($researches as $research)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $research->company_name }}</td>
                        <td>{{ $research->sector }}</td>
                        <td>{{ $research->updated_at }}</td>
                        <td> <a href="/read_research/{{$research->id}}" target="_blank"> <button class="btn btn-primary"> Free </button> </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endguest

    </div>
</div>

@endsection
