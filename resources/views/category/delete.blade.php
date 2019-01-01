@extends('layouts.app')

@section('title')
    Xóa category số {{ $id }}
@endsection
@section('content')
    <form name="destroy-category" action="{{ url('/category/destroy/'.$id) }}" method="post">
        <button type="submit" class="btn btn-primary">Xác nhận xóa</button>

        @csrf
    </form>
@endsection