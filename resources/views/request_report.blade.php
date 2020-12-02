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

<div class="container text-center text-dark py-5">
    <h3>Request Company Analysis</h3>
    <p>What makes our report different from publicly available research report
        No recommendations will be provided. Only as-is analysis should be expected
        We will not analyze companies whose core business is based on interest (ex: banks or NBFC or financial
        institutes) nor we are expert in this.
        Report will be extensive and revisons will not be entertained
        Report will contain analysis of 10 years of annual reports, analysis of business verticals, fund flow analysis,
        positive points & negative aspects to help you make investment decision.
        The decision to invest or avoid will be solely yours.
        No money will be refunded.
        50% during the order, 50% upon completion of report.
        We have backlog and working on current report committments and report takes atleast 30 days to research, compile
        and deliver.
        Since we are working professionals and have a day job.
        You will be entitled to 2 clarifications on the submitted report. All the clarifications should be submitted via
        registered email within 7 days of report submission.
        Please use it wisely. We will get back to you with a response within 3 working days.
        What does report contain?</p>
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
                        <th scope="col">Download PDF</th>
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
        @endguest

    </div>
</div>

@endsection
