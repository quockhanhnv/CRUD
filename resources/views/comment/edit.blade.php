@extends('layouts.app')

@section('title')
    Sửa bình luận {{ $id }}
@endsection
@section('content')
    <form name="submit-product" action="{{ url('/comment/'.$id) }}" method="post">
        <div class="form-group">
            <label >Nội dung</label>
            <input type="text" name="content" value="{{ $comment->content }}" class="form-control" placeholder="Nhập nội dung">
        </div>
        <div class="form-group">
            <label >Danh mục</label>
            <select name="product_id" style="min-width: 300px">
                <option value="">None</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" <?php echo ($comment->product_id == $product->id) ? 'selected' : '' ?>>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        @csrf

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection