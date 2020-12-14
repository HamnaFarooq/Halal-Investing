@extends('layouts.app')

@section('pagename')
FAQ
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h3 class="text-center mb-5">
                FAQ
            </h3>
            <div class="accordion accordion-type-2 accordion-flush" id="accordion">
                @foreach ( $faq as $question )
                <div class="card">
                    <div class="card-header d-flex justify-content-between" role="button" data-toggle="collapse" href="#collapse_{{$question->id}}" aria-expanded="false">
                        <b> {{ $question->question }} </b>
                    </div>
                    <div id="collapse_{{$question->id}}" class="collapse" data-parent="#accordion">
                        <div class="card-body pa-15"> {{ $question->answer }} </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection