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
                                @elseif($request->status == 'Completed')
                                <a href="{{$request->comments}}" target="_blank"> <button class="btn btn-primary"> Open Research </button> </a>
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