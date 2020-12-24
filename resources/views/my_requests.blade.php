@extends('layouts.app')

@section('pagename')
My Requests
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h3 class="text-center pb-4">My Research Requests</h3>

            @if( $research_requests->count() )
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="bg-dark text-light">
                            <th scope="col">Sr. no.</th>
                            <th scope="col">Company name</th>
                            <th scope="col">Expected by</th>
                            <th scope="col">Status</th>
                            <th scope="col">Response</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @foreach ($research_requests as $request)
                        <tr class=" @if($request->status == 'Pending') table-secondary @elseif($request->status == 'Completed') table-success @elseif($request->status == 'Rejected') table-danger @endif">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td> {{ $request->company_name }} </td>
                            <td> {{ $request->expected_by }} </td>
                            <td> {{ $request->status }} </td>
                            <td>
                                @if($request->status == 'Rejected' || $request->status == 'Accepted')
                                {{ $request->comments }}
                                @elseif($request->status == 'Unpaid')
                                Accepted! please pay 250$ upfront
                                @elseif($request->status == 'Completed')
                                @if($request->paid == 'half')
                                Please pay the other half of payment to open
                                @else
                                Research complete.
                                @endif
                                @endif
                            </td>
                            <td>
                                @if($request->status == 'Pending')
                                <a href="/delete_request_research/{{$request->id}}"> <button class="btn btn-danger"> Delete </button> </a>
                                @elseif($request->status == 'Unpaid')
                                <a href="/{{$request->id}}" ><button class="btn btn-primary">Pay now</button> </a>
                                @elseif($request->status == 'Completed')
                                @if($request->paid == 'half')
                                <a href="/{{$request->id}}"><button class="btn btn-primary">Pay now</button> </a>
                                @else
                                <a href="{{$request->comments}}" target="_blank"> <button class="btn btn-primary"> Open Research </button> </a>
                                @endif
                                @else
                                <button class="btn btn-disabled">Please wait</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>
                You have not requested for any research yet!
            </p>
            @endif
        </div>
    </div>
</div>
@endsection