@extends('layouts.app')

@section('content')
<div class="container py-5">
     <a href="/admin"> <button class="btn btn-primary my-2"> Go back </button> </a>
    <div class="row">
        <div class="col-md-8">
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
                            <option value="free" {{ ($research->type == 'free' ? "selected":"") }} >Free</option>
                            <option value="paid" {{ ($research->type == 'paid' ? "selected":"") }} >Paid</option>
                            <option value="private" {{ ($research->type == 'private' ? "selected":"") }} >Private</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="document">Document text:</label>
                        <textarea class="form-control" name="document" placeholder="Enter text" required> {{$research->document}} </textarea>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif

                    <button type="submit" class="btn btn-primary">Change</button>

                </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            Add images here
        </div>
    </div>
</div>
@endsection
