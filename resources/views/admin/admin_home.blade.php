@include('partials.add_research_form')

@extends('layouts.app')

@section('pagename')
Admin
@endsection

@section('content')
<div class="col">
<div class="row" style="min-height: calc(100vh - (55.85px * 2));">
    <div class="col-md-2 py-5 bg-primary text-light container">
        <ul class="nav">
            <li class="nav-item admin-nav">
                <a class="nav-link active" data-toggle="tab" href="#stats">Statistics</a>
            </li>
            <li class="nav-item admin-nav">
                <a class="nav-link" data-toggle="tab" href="#researches">Researches</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="container py-5">
        <h3 class="text-center pb-4">Welcome admin!</h3>

            <div id="myTabContent" class="tab-content">

                <div class="tab-pane active fade show" id="stats">
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
                    <div class="text-right">
                        <button class="btn btn-primary my-3" data-toggle="modal" data-target="#add_research"> Add
                            Research
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

            </div>

        </div>
    </div>
</div>

</div>

@endsection
