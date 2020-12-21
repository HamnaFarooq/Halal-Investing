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

<div class="container text-left text-dark py-5">
    <!-- <h3>What we offer</h3> -->
    <!-- <h3>Research Reports</h3> -->
    <p>We are passionate about analysing various businesses. We have analyzed companies from various industries to understand the business model, financial strengths/ weakness, its growth over past year and management capability.
        <br>
        <br>
        We agree that our reports are lengthy but comes with enough critical information about the business, operating model, strength of the balance sheet etc. We also analyze if the company possesses any pricing power, moat, competitive advantage etc.
        The report contains analysis of annual reports of last 10 years. Some companies do not have AR for last 10 years, in such cases we analyse all the available AR in public domain.
        <br>
        <br>
        The aim is to provide all the information in the report so that you will understand the how the company earns money? what are its products and/or services? How did company grow its revenue & profits? How much cash company generated over the years and compare it with profits earned? Report tells you whether company’s growth was funded by its profit or debt.
        <br>
        <br>
        Our reports unlike typical reports published by financial institutions. We do not give you forward looking estimates, earning predictions etc. because we don’t have such superpower. We do not believe in investing in a company just because we spent so much time researching it. We do it to understand the sectors, companies and learn businesses.
        <br>
        <br>
        As a principle, we analyze companies that fall under purview of ‘Halal Concept’. So don’t expect us to research on companies whose core business is Entertainment, Interest, Gambling, Alcohol and banking.
        <br>
        <br>
        Our reports contain 3 sections <b>Business Overview, Financials & Management</b>.
        Business Overview section provides information about company’s products & services, technology, market share including business insights. Financial Section provides Profit & Loss (PnL) statement analysis of last 10 years including revenue, operating profit & net profit. We also analyze other financial ratios that reflect company’s financial stability. Similary Management section contains information about company’s promoters, financial shenanigans, frauds or penalties if any.
        <br>
        <br>
        We don’t believe in publishing reports just for the sake of it. We release research report every 45 days. In case where we are not able to get the clear picture about any company, we recommend investors to contact investor relations team to get more information. We reserve the right to respond to queries based on the current workload.
        <br>
        <br>
        Generally, we publish the analysis report every 45 days. This is because of the exhaustive research required to analyse the company, it business model, financials & management qualities. It takes time to make the report concise & short so that you don’t get bored. But its worth the wait
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
                        <th scope="col">Open</th>
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
        @if(Auth::user()->reports == 'subscribed')
        <!-- real data here -->
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Last updated</th>
                        <th scope="col">Open</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <!-- free ones first -->
                    @foreach ($researches as $research)
                    @if($research->type != 'private')
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $research->company_name }}</td>
                        <td>{{ $research->sector }}</td>
                        <td>{{ $research->updated_at }}</td>
                        @if($research->type != 'free')
                        <td> <a href="/read_research/{{$research->id}}" target="_blank"> <button class="btn btn-primary"> Free </button> </a> </td>
                        @else
                        <td> <a href="/read_research/{{$research->id}}" target="_blank"> <button class="btn btn-primary"> Paid </button> </a> </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @else

        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Last updated</th>
                        <th scope="col">Open</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <!-- free ones first -->
                    @foreach ($researches as $research)
                    @if($research->type == 'free')
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $research->company_name }}</td>
                        <td>{{ $research->sector }}</td>
                        <td>{{ $research->updated_at }}</td>
                        <td> <a href="/read_research/{{$research->id}}" target="_blank"> <button class="btn btn-primary"> Free </button> </a> </td>
                    </tr>
                    else
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $research->company_name }}</td>
                        <td>{{ $research->sector }}</td>
                        <td>{{ $research->updated_at }}</td>
                        <td><button class="btn btn-disabled"> Paid </button> </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @endguest

    </div>
</div>

@endsection