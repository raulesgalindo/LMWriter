@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <label for="title">Created at: {{ $file->created_at }}</label> 
                        <form action="/home">
                            <input type="submit" value="Return" class="btn btn-info">
                        </form>
                </div>
                <div class="panel-body">
                    <form id="saveFileForm">
                        <input type="hidden" name="id" value="{{ $file->id }}">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $file->title }}">
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <input type="text" class="form-control" name="tags" id="tags" value="{{ $file->tags }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content:</label>
                            @include('components.editor')
                        </div>
                        <div class="form-group" >
                            <input type="submit" value="Save file" class="btn btn-info">
                            <img id="gifsaving" src="{{ asset('images/saving.gif') }}" style="visibility:hidden"></img>
                            <img id="thumbOk" src="{{ asset('images/thumb.png') }}" style="visibility:hidden"></img>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function() { //shorthand document.ready function
    $('#saveFileForm').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        document.getElementById('gifsaving').style.visibility='visible'
        document.getElementById('thumbOk').style.visibility='hidden' 
        var $form=$(this);
        var serializedData = $form.serializeArray();
        debugger;  
        request = $.ajax({
            url: "/savefile",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR){
            document.getElementById('gifsaving').style.visibility='hidden' 
            document.getElementById('thumbOk').style.visibility='visible' 
            console.log(response);
        });
    });
});
</script>


@endsection
