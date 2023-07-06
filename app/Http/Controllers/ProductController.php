<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Product";
        $datas = Product::all();
        return view("product.index", compact("datas", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "List Product";
        $category = Category::all();
        $brand = Brand::all();
        $type = Type::all();
        return view("product.formCreate", compact("title", "category", "brand", "type"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get("productName");
        $product->size = $request->get("productSize");
        $product->stock = $request->get("productStock");
        $product->price = $request->get("productPrice");
        $product->url_gambar = $request->get("productURL");
        $product->categories_id = $request->get("selectCategories");
        $product->brands_id = $request->get("selectBrands");
        $product->types_id = $request->get("selectTypes");
        $product->save();
        return redirect()->route("product.index")->with("status", "Product created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        $type = Type::all();
        return view("product.formEdit", compact("datas", "category", "brand", "type"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get("productName");
        $product->size = $request->get("productSize");
        $product->stock = $request->get("productStock");
        $product->price = $request->get("productPrice");
        $product->url_gambar = $request->get("productURL");
        $product->categories_id = $request->get("selectCategories");
        $product->brands_id = $request->get("selectBrands");
        $product->types_id = $request->get("selectTypes");
        $product->save();
        return redirect()->route("product.index")->with("status", "Product updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::find($id)->delete();
            return redirect()->route("product.index")->with("status", "Delete success!");
        } catch (\PDOException $th) {
            $message = "Delete failed! Make sure product isn't related to other data!";
            return redirect()->route("product.index")->with("status", $message);
        }
    }
}
