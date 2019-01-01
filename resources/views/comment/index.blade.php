@extends('layouts.app')

@section('title')
    Danh sách bình luận
@endsection
@section('content')
    <h2>
        <a href="{{ url('/comment/create') }}" class="btn btn-info">Add</a>
    </h2>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Danh Mục Cha</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>


        @foreach ($comments as $comment)
            <tr>
                <th>{{ $loop->index }}</th>
                <th scope="row">{{ $comment->content }}</th>
                <td>{{ $comment->product_id }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>
                    <a href="{{ url('/comment/'.$comment->id.'/edit') }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('/comment/'.$comment->id.'/delete') }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ dump($comments) }}
    {{--{{ dd($cats) }}--}}
    {{--{{ var_dump($cats) }}--}}
@endsection