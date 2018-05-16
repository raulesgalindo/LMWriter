@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Files
                    <form action="/createfile">
                        <input type="submit" value="++Create File" class="btn btn-success">
                    </form>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                	@foreach ($files as $file)
                    <div class="card text-white bg-info mb-2 col-sm-2 col-md-4 col-lg-5" style="max-width: 18rem;">
                        <div class="card-header">Last update: {{ $file->updated_at }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $file->title }}</h5>
                            <p class="card-text">
                                <div class="row">
                                    <form action="/updatefile">
                                        <input type="hidden" name="id" value="{{ $file->id }}">
                                        <input type="submit" value="Modify" class="btn btn-warning">
                                    </form>
                                    <form action="/deletefile">
                                        <input type="hidden" name="id" value="{{ $file->id }}">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </div>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="panel-footing">   
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
