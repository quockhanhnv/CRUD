<?php

namespace App\Http\Controllers;
use App\Models\Category AS CategoryModel;
use App\Models\Product AS ProductModel;
use Illuminate\Http\Request;

class Category extends Controller
{
    //

    public function index() {

        $cats = CategoryModel::all();
        // dd($cats);
        $data = array();
        //     cats => biến truyền ra view có tên trùng với key <=> compact('cats')
        $data['cats'] = $cats;
        //dd($data);

        return view('category.index', $data);
    }

    public function create() {
        $data = array();
        return view('category.create', $data);
    }

    public function store(Request $request) {
        $input = $request->all();

        $cat = new CategoryModel;

        $cat->name = $input['name'];

        $cat->save();

        return redirect('/');
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $cat = CategoryModel::find($id);

        $cat->name = $input['name'];

        $cat->save();

        return redirect('/');
    }

    public function destroy($id) {
        $cat = CategoryModel::find($id);
        ProductModel::where('cat_id', $id)->delete();

        $cat->delete();

        return redirect('/');
    }

    public function edit($id) {
        $cat = CategoryModel::find($id);

        $data = array();
        $data['id'] = $id;
        $data['cat'] = $cat;
        return view('category.edit', $data);
    }

    public function delete($id) {
        $data = array();
        $data['id'] = $id;
        return view('category.delete', $data);
    }





}
