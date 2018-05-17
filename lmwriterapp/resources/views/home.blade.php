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
                        <!--<div class="pull-right">
                            <label class="" for="title">Search:</label>
                            <input type="text" class="form-control col-sm-2 col-md-2 col-lg-3 search" name="search" id="search">
                        </div>-->
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container row">
                        @foreach ($files as $file)
                        <div class="panel text-white bg-info mb-2 col-sm-2 col-md-4 col-lg-5" style="max-width: 18rem;">
                            <div class="panel-heading row">
                                <div class="pull-left">
                                    <form action="/updatefile">
                                        <input type="hidden" name="id" value="{{ $file->id }}">
                                        <input type="submit" value="M" class="btn btn-warning">
                                    </form>
                                </div>
                                <div class="pull-right">
                                    <form action="/deletefile">
                                        <input type="hidden" name="id" value="{{ $file->id }}">
                                        <input type="submit" value="X" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                            <div class="panel-heading">Last update: {{ $file->updated_at }}</div>
                            <div class="panel-body">
                                <h4>{{ $file->title }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="panel-footing">   
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").change(function(){
            console.log($(this).val());
        });
    });
</script>
@endsection
