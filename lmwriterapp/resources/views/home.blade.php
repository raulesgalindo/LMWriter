@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class= "row">
                    <div class="panel-heading ">
                        <div class="pull-left">
                            <form action="/createfile">
                                <input type="submit" value="++Create File" class="btn btn-success">
                            </form>
                        </div>
                        <div class="pull-right">
                            <label class="" for="title">Search:(press enter)</label>
                            <input type="text" class="form-control col-sm-2 col-md-2 col-lg-3 search" name="search" id="search">
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="gif">
                    
                </div>
                
                <div class="panel-body" id="divBody">
                    
                    @include('components.filteredwindow')
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").change(function(){
            document.getElementById("divBody").innerHTML = '<img id="gifloading" src="{{ asset("images/loading.gif") }}"></img>';
            var filterValue = $(this).val();
            request = $.ajax({
            url: "/findbyfilter",
            type: "get",
            data: {
                filter :filterValue}
            });
            request.done(function (response, textStatus, jqXHR){
                document.getElementById('gifloading').style.visibility='hidden';
                document.getElementById("divBody").innerHTML = response; 
                console.log(response);
            });
        });
    });
</script>
@endsection
