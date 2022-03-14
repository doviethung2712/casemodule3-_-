@extends('layout.index')
@section('title', 'Create Post')
@section('content')
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
              </div>
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
            <button>Create Post</button>
        </form>
    </div>
@endsection
