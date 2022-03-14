@extends('layout.index')
@section('title','List')
@section('content')
<div class="container">
     <table class="table table-dark">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><img src="{{ asset('storage/'.$post->img) }}" alt=""></td>
                    {{-- <td></td> --}}
                    <td>{{ $post->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
