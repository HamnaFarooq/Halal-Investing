@include('partials.add_to_research_form')
@include('partials.add_to_portfolio_form')
@include('partials.add_to_faq_form')

@extends('layouts.app')

@section('pagename')
Admin
@endsection

@section('content')
<div class="col">
    <div class="row" style="min-height: calc(100vh - (55.85px * 2));">
        <div class="col-md-2 py-5 bg-primary text-light container">
            <ul class="nav">
                <!-- <li class="col nav-item admin-nav">
                    <a class="nav-link active" data-toggle="tab" href="#stats">Statistics</a>
                </li> -->
                <li class="col nav-item admin-nav">
                    <a class="nav-link active" data-toggle="tab" href="#research_requests">Requests</a>
                </li>
                <li class="col nav-item admin-nav">
                    <a class="nav-link" data-toggle="tab" href="#researches">Researches</a>
                </li>
                <li class="col nav-item admin-nav">
                    <a class="nav-link" data-toggle="tab" href="#portfolio">Portfolio</a>
                </li>
                <li class="col nav-item admin-nav">
                    <a class="nav-link" data-toggle="tab" href="#faq">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="container py-5">
                <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade" id="stats">
                        <h3 class="text-center p-4">Welcome admin!</h3>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                            retro
                            synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                            butcher
                            retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex
                            squid.
                            Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                            voluptate
                            nisi qui.</p>
                    </div>

                    <div class="tab-pane fade" id="researches">
                        <h3 class="text-center pb-4">Researches</h3>
                        <div class="text-right">
                            <button class="btn btn-primary my-3" data-toggle="modal" data-target="#add_to_research_form">
                                Add to Research
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sr. no.</th>
                                        <th scope="col">Company name</th>
                                        <th scope="col">Sector</th>
                                        <th scope="col">Last updated</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="border">
                                    @foreach ($researches as $research)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $research->company_name }}</td>
                                        <td>{{ $research->sector }}</td>
                                        <td>{{ $research->updated_at }}</td>
                                        <td> <a href="/read_research/{{$research->id}}"> <button class="btn btn-primary">
                                                    View
                                                </button> </a> </td>
                                        <td> <a href="/edit_research/{{$research->id}}"> <button class="btn btn-primary">
                                                    Edit
                                                </button> </a> </td>
                                        <td> <a href="/delete_research/{{$research->id}}"> <button class="btn btn-primary">
                                                    Delete
                                                </button> </a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="portfolio">
                        <h3 class="text-center pb-4">Portfolio</h3>
                        <div class="text-right">
                            <button class="btn btn-primary my-3" data-toggle="modal" data-target="#add_to_portfolio_form">
                                Add to Portfolio
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sr. no.</th>
                                        <th scope="col">Company name</th>
                                        <th scope="col">Shares</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Share Price($)</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="border">
                                    @foreach ($portfolio as $share)
                                    @include('partials.edit_portfolio_form')
                                    <tr>
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td> {{ $share->company_name}} </td>
                                        <td> {{ $share->share_percentage}} % </td>
                                        <td> {{ $share->action}} </td>
                                        <td> {{ $share->share_price}} </td>
                                        <td> {{ $share->date}} </td>
                                        <td> <button class="btn btn-primary" data-toggle="modal" data-target="#edit_portfolio{{$share->id}}_form"> Edit </button> </td>
                                        <td> <a href="/delete_portfolio/{{$share->id}}"> <button class="btn btn-primary"> Delete </button> </a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane active fade show" id="research_requests">
                        <h3 class="text-center pb-4">Research Requests</h3>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#accepted">Active <span class="badge badge-primary badge-pill"> {{$accepted_count}} </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#unpaid">Unpaid <span class="badge badge-primary badge-pill"> {{$unpaid_count}} </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pending">Pending <span class="badge badge-primary badge-pill"> {{$pending_count}} </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <span class="badge badge-primary badge-pill"> {{$rejected_count}} </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#completed">Completed <span class="badge badge-primary badge-pill"> {{$completed_count}} </span></a>
                            </li>
                        </ul>
                        <div class="container pt-3">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade show active" id="accepted">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Sr. no.</th>
                                                    <th scope="col">Company name</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Expected by</th>
                                                    <th scope="col">Comments</th>
                                                    <!-- <th scope="col">Price</th> -->
                                                    <th scope="col">Delivery link</th>
                                                    <!-- <th scope="col">Reject</th> -->
                                                    <!-- <th scope="col">Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @foreach ($accepted_requests as $request)
                                                @include('partials.deliver_research_form')
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td> {{ $request->company_name }} </td>
                                                    <td> {{ $request->sector }} </td>
                                                    <td> {{ $request->expected_by }} </td>
                                                    <td> {{ $request->request }} </td>
                                                    <!-- <td> {{ $request->price }} </td> -->
                                                    <td> 
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#deliver_research{{$request->id}}_form"> Deliver </button>
                                                    </td>
                                                    <!-- <td> <a href=""> <button class="btn btn-secondary"> Reject </button> </a> </td> -->
                                                    <!-- <td> <a href="/delete_request_research/{{$request->id}}"> <button class="btn btn-danger"> Delete </button> </a> </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="unpaid">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Sr. no.</th>
                                                    <th scope="col">Company name</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Expected by</th>
                                                    <th scope="col">Comments</th>
                                                    <!-- <th scope="col">Demand</th> -->
                                                    <!-- <th scope="col">Delivery link</th> -->
                                                    <!-- <th scope="col">Reject</th> -->
                                                    <!-- <th scope="col">Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @foreach ($unpaid_requests as $request)
                                                @include('partials.deliver_research_form')
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td> {{ $request->company_name }} </td>
                                                    <td> {{ $request->sector }} </td>
                                                    <td> {{ $request->expected_by }} </td>
                                                    <td> {{ $request->request }} </td>
                                                    <!-- <td> {{ $request->price }} </td> -->
                                                    <!-- <td> 
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#deliver_research{{$request->id}}_form"> Deliver </button>
                                                    </td> -->
                                                    <!-- <td> <a href=""> <button class="btn btn-secondary"> Reject </button> </a> </td> -->
                                                    <!-- <td> <a href="/delete_request_research/{{$request->id}}"> <button class="btn btn-danger"> Delete </button> </a> </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pending">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Sr. no.</th>
                                                    <th scope="col">Company name</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Expected by</th>
                                                    <th scope="col">Comments</th>
                                                    <th scope="col">Accept</th>
                                                    <th scope="col">Reject</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @foreach ($pending_requests as $request)
                                                @include('partials.reject_research_form')
                                                @include('partials.accept_research_form')
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td> {{ $request->company_name }} </td>
                                                    <td> {{ $request->sector }} </td>
                                                    <td> {{ $request->expected_by }} </td>
                                                    <td> {{ $request->request }} </td>
                                                    <td> <a href="/accept_request/{{$request->id}}"> <button class="btn btn-primary"> Accept </button> </a> </td>
                                                    <!-- <td> <button class="btn btn-primary" data-toggle="modal" data-target="#accept_research{{$request->id}}_form"> Accept </button> </td> -->
                                                    <td> <button class="btn btn-secondary" data-toggle="modal" data-target="#reject_research{{$request->id}}_form"> Reject </button> </td>
                                                    <td> <a href="/delete_request_research/{{$request->id}}"> <button class="btn btn-danger"> Delete </button> </a> </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rejected">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Sr. no.</th>
                                                    <th scope="col">Company name</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Expected by</th>
                                                    <th scope="col">Reason</th>
                                                    <!-- <th scope="col">Accept</th> -->
                                                    <!-- <th scope="col">Reject</th> -->
                                                    <!-- <th scope="col">Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @foreach ($rejected_requests as $request)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td> {{ $request->company_name }} </td>
                                                    <td> {{ $request->sector }} </td>
                                                    <td> {{ $request->expected_by }} </td>
                                                    <td> {{ $request->comments }} </td>
                                                    <!-- <td> <a href="/accept_request/{{$request->id}}"> <button class="btn btn-primary"> Accept </button> </a> </td> -->
                                                    <!-- <td> <a href=""> <button class="btn btn-secondary"> Reject </button> </a> </td> -->
                                                    <!-- <td> <a href="/delete_request_research/{{$request->id}}"> <button class="btn btn-danger"> Delete </button> </a> </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="completed">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Sr. no.</th>
                                                    <th scope="col">Company name</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Expected by</th>
                                                    <th scope="col">Delivered on</th>
                                                    <th scope="col">Delivery</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @foreach ($completed_requests as $request)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td> {{ $request->company_name }} </td>
                                                    <td> {{ $request->sector }} </td>
                                                    <td> {{ $request->expected_by }} </td>
                                                    <td> {{ $request->updated_at }} </td>
                                                    <td> 
                                                        <a href="{{$request->comments}}" target="_blank"> <button class="btn btn-primary"> Delivered Research </button> </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="faq">
                        <h3 class="text-center pb-4">FAQ</h3>
                        <div class="text-right">
                            <button class="btn btn-primary my-3" data-toggle="modal" data-target="#add_to_faq_form">
                                Add to FAQ
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sr. no.</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="border">
                                    @foreach ($faq as $question)
                                    @include('partials.edit_faq_form')
                                    <tr>
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td> {{ $question->question}} </td>
                                        <td> {{ $question->answer}} </td>
                                        <td> <button class="btn btn-primary" data-toggle="modal" data-target="#edit_faq{{$question->id}}_form"> Edit </button> </td>
                                        <td> <a href="/delete_faq/{{$question->id}}"> <button class="btn btn-primary"> Delete </button> </a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection