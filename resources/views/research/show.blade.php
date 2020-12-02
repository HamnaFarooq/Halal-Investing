@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h1 class="text-center"> <u> {{ $research->company_name }} </u> </h1>
            <h4 class="text-center"> Sector: {{ $research->sector }} </h4>
            <br>
            <p> {{ $research->document }} </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, et omnis. Unde officia aut placeat iusto deleniti odit quod vero commodi repellendus nihil laudantium nobis corrupti, facilis eligendi voluptate optio?</p>
            images here
        </div>
    </div>
</div>
@endsection
