@extends('layouts.app')

@section('pagename')
Edit Research
@endsection

@section('content')
<div class="container py-5">
    <a href="/admin"> <button class="btn btn-primary my-2"> Go back </button> </a>
    <div class="row">
        <div class="col-md-7 mb-3">
            <div class="card">
                <div class="card-header">Edit Research</div>

                <div class="card-body">
                    <form action="/update_research/{{ $research->id }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label for="company_name">Company Name:</label>
                            <input type="text" class="form-control" name="company_name" placeholder="Enter company name" value="{{$research->company_name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="sector">Sector:</label>
                            <input type="text" class="form-control" name="sector" placeholder="Enter sector" value="{{$research->sector}}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control" required>
                                <option value="free" {{ ($research->type == 'free' ? "selected":"") }}>Free</option>
                                <option value="paid" {{ ($research->type == 'paid' ? "selected":"") }}>Paid</option>
                                <option value="private" {{ ($research->type == 'private' ? "selected":"") }}>Private</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="document">Document text:</label>
                            <textarea class="form-control" name="document" placeholder="Enter text" required> {{$research->document}} </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Change</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">Add images</div>
                    <div class="card-body">
                        <form action="/add_image" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $research->id }}" name="research_id">
                            <div class="form-group">
                                <label for="input">Enter unique image name:</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card-header mt-3">Added images</div>
                <div class="row mt-3">
                    @foreach ( $research->images as $image )
                    <div class="col-sm-6">
                        <div class="text-right"> <a href="/remove_image/{{$image->id}}"> <button class="btn btn-danger"> X </button> </a> </div>
                        <img src="{{$image->image}}" class="p-2 img-thumbnail rounded mx-auto img-fluid" alt="image">
                        <br>
                        <div class="text-center"> {{ $image->name }} </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection