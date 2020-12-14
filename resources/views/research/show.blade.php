@extends('layouts.app')

@section('pagename')
Research Report
@endsection

@section('content')
<div class="container" ondragstart="return false;" onselectstart="return false;"  oncontextmenu="return false;" onload="clearData();" onblur="clearData();">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <h1 class="text-center"> <u> {{ $research->company_name }} </u> </h1>
            <h4 class="text-center"> Sector: {{ $research->sector }} </h4>
            <br>
            <p> {!! html_entity_decode($research->document) !!} </p>
        </div>
    </div>
</div>
<script language="javascript">
    function clearData(){
        window.clipboardData.setData('text','') 
    }
    function cldata(){
        if(clipboardData){
            clipboardData.clearData();
        }
    }
    setInterval("cldata();", 1000);
</script>
@endsection