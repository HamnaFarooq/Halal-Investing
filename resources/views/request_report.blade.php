@include('partials.request_research_form')

@extends('layouts.app')

@section('pagename')
Request Company Analysis
@endsection

@section('content')

<div class="request_report">
    <div class="caption">
        <!-- <h1>Welcome</h1> -->
    </div>
</div>

<div class="container text-left text-dark py-5">
    <h3>Request Company Analysis</h3>
    <p>
        The report contains exclusive insights into the industry, business, financial and management. Our reports contain <b> Business Overview, Financials & Management sections </b>.
        Business Overview section provides information about company’s products & services, technology, market share including business insights. Financial Section provides Profit & Loss (PnL) statement analysis of last 10 years including revenue, operating profit & net profit. We also analyze other financial ratios that reflect company’s financial stability. Similarly, Management section contains information about company’s promoters, financial shenanigans, frauds or penalties if any.
        <br>
        <br>
        As part of this service, <b> we will perform the valuation of company requested </b>. You will get the receive calculation/rationale in the report. This will not be part of reports available in ‘Company Analysis Report’ service. Since we are working professional with a day-job, we request you to give us enough time for thorough research & analysis.
        <br>
        <br>
        We have good order backlog and working on current commitments. It will take minimum 30 days to research, compile and submit the report. In case where we are not able to get the clear picture about any company, we recommend investors to contact investor relations team to get more information.
        <br>
        <br>
        Before using this service, we advise you to visit ‘COMPANY ANALYSIS REPORTS’ and check if the report (for the company you are looking) is already available.
        This way you will save you hard-earned money.
        <br><br>
        <b>The process:</b>
        <ol>
            <li>
                Fill & submit the form by providing details such as company name, sector and expected delivery date
            </li>
            <li>
                We will review the request within 2 days
            </li>
            <li>
                Accept or decline the work
            </li>
            <li>
                If accepted, we will provide you revised delivery date (depending on order book)
            </li>
            <li>
                If you are fine with revised delivery date, make 50% payment upfront
            </li>
            <li>
                Acknowledgement will be sent to your registered email
            </li>
            <li>
                We will notify you once the report is ready.
            </li>
            <li>
                Make the balance payment and report will be delivered to your registered email
            </li>
        </ol>
        <br>
        You will be entitled for 2 clarifications on the submitted report. All the clarifications should be submitted via registered email within 7 days of report submission. We will get back to you within 3 working days.
    </p>
</div>

<div class="request_report">
    <div class="caption">
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center pb-4">Request</h3>
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
                        <th scope="col">Type</th>
                        <th scope="col">Open</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <th scope="row">1</th>
                        <td>Dummy</td>
                        <td>Oil</td>
                        <td>Sample</td>
                        <td> <button class="btn btn-primary"> Free </button> </td>
                    </tr>
                </tbody>
            </table>
            <div class="col text-center">
                <button class="btn btn-dark"> Request Company Analysis </button>
            </div>
        </div>

        @else
        <!-- real data here -->
        <div class="table-responsive">
            @if( !empty($research) )
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Sector</th>
                        <th scope="col">For</th>
                        <th scope="col">Open</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <th scope="row">1</th>
                        <td> {{$research->company_name}} </td>
                        <td> {{ $research->sector }} </td>
                        <td> Sample </td>
                        <td> <a href="/read_research/{{$research->id}}" target="_blank"> <button class="btn btn-primary"> Free </button> </a> </td>
                        <!-- <td> <button class="btn btn-primary"> Free </button> </td> -->
                    </tr>
                </tbody>
            </table>
            @endif
            <div class="col text-center">
                <button class="btn btn-dark" data-toggle="modal" data-target="#request_research_form"> Request Company Analysis </button>
            </div>
        </div>
        @endguest

    </div>
</div>

@endsection