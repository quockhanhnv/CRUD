<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment as CommentModel;
use App\Models\Product as ProductModel;
class Comment extends Controller
{
    public function index()
    {
        $comments = CommentModel::all();

        $data = array();
        $data['comments'] = $comments;

        return view('comment.index', $data);
    }

    public function create()
    {
        $products = ProductModel::all();

        $data = array();

        $data['products'] = $products;

        return view('comment.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $comment = new CommentModel;

        $comment->fill($request->all());
        $comment->save();

        return redirect('/comment');
    }

    public function edit($id) {
        $comment = CommentModel::find($id);

        $data = array();
        $data['id'] = $id;
        $data['comment'] = $comment;

        $products = ProductModel::all();
        $data['products'] = $products;
        return view('comment.edit', $data);
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $comment = CommentModel::find($id);

        $comment->fill($request->all());

        $comment->save();

        return redirect('/comment');
    }

    public function delete($id)
    {
        $data = array();

        $data['id'] = $id;

        return view('comment.delete', $data);
    }

    public function destroy($id)
    {
        $comment = CommentModel::find($id);

        $comment->delete();

        return redirect('/comment');
    }
}
