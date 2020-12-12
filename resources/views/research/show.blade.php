@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h1 class="text-center"> <u> {{ $research->company_name }} </u> </h1>
            <h4 class="text-center"> Sector: {{ $research->sector }} </h4>
            <br>
            <p> {!! html_entity_decode($research->document) !!} </p>
        </div>
    </div>
</div>
@endsection