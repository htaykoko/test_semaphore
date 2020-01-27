<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $products = Product::paginate(20);

        return view("products.index", compact("products"));

    }

    public function create(){

        $categories = Category::all();

        return view("products.create", compact("categories"));

    }

    public function store(Request $request){

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:products'],
            'price' => ['required', 'integer'],
            'brand_name' => ['string'],
            'expired_date' => ['date'],
            'category_id' => ['nullable'],
        ])->validate();

        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->brand_name = $request->brand_name;
        $products->expire_date = date("Y-m-d", strtotime($request->expire_date));
        $products->category_id = $request->category_id;
        $products->created_by = auth()->user()->id;
        $products->updated_by = auth()->user()->id;

        $products->save();
        return back()->with('success', 'Ok, Successfully inserted.');        

    }

    public function edit(Product $product){

        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));

    }

    public function update(Product $product, Request $request){

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'brand_name' => ['string'],
            'expired_date' => ['date'],
            'category_id' => ['nullable'],
        ])->validate();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand_name = $request->brand_name;
        $product->expire_date = date("Y-m-d", strtotime($request->expire_date));
        $product->category_id = $request->category_id;
        $product->created_by = auth()->user()->id;
        $product->updated_by = auth()->user()->id;

        $product->save();
        return back()->with('success', 'Ok, Successfully updated.');        

    }

    public function show(Product $product){

        return view('products.view', compact("product"));

    }

    public function delete(Product $product){

        // $product->delete(); //umcomment to delete

        return back()->with('success', "Ok, successfully deleted.");

    }
}
