@extends('layouts.app')

@section('title')
    Danh sách danh mục
@endsection
@section('content')
    <h2>
        <a href="{{ url('/product/create') }}" class="btn btn-info">Add</a>
    </h2>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>


        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ url('/product/'.$product->id.'/edit') }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('/product/'.$product->id.'/delete') }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ dump($products) }}
    {{--{{ dd($cats) }}--}}
    {{--{{ var_dump($cats) }}--}}
@endsection