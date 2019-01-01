<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category AS CategoryModel;
use App\Models\Product AS ProductModel;

class Product extends Controller
{
    //

    public function index() {

        $products = ProductModel::all();
        $data = array();
        $data['products'] = $products;

        return view('product.index', $data);
    }

    public function create() {
        $cats = CategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        return view('product.create', $data);
    }

    public function store(Request $request) {
        $input = $request->all();

        $product = new ProductModel;

        $product->name = $input['name'];
        $product->cat_id = $input['cat_id'];
        $product->price = $input['price'];

        $product->save();

        return redirect('/product');
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $product = ProductModel::find($id);

        $product->name = $input['name'];
        $product->cat_id = $input['cat_id'];
        $product->price = $input['price'];

        $product->save();

        return redirect('/product');
    }

    public function destroy($id) {
        $product = ProductModel::find($id);

        $product->delete();

        return redirect('/product');
    }

    public function edit($id) {
        $product = ProductModel::find($id);

        $data = array();
        $data['id'] = $id;
        $data['product'] = $product;

        $cats = CategoryModel::all();
        $data['cats'] = $cats;
        return view('product.edit', $data);
    }

    public function delete($id) {
        $data = array();
        $data['id'] = $id;
        return view('product.delete', $data);
    }

}
