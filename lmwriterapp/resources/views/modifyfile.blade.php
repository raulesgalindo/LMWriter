@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Files 
                    <div class="panel-heading">Files
                        <form action="/home">
                            <input type="submit" value="List Files" class="btn btn-info">
                            <label for="title">Created at: {{ $file->created_at }}</label>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" value="{{ $file->title }}">
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags:</label>
                        <input type="text" class="form-control" id="tags" value="{{ $file->tags }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <input type="text" class="form-control" id="content" value="{{ $file->content }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
