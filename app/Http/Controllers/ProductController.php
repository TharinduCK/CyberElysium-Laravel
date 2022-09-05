<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\Facades\ProductFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $product;

    public function index()
    {
        $products = ProductFacade::all();
        return view('dashboard', compact('products'));
    }

    public function  insert(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename  = time() . "." . $ext;
            $file->move('assets/images', $filename);
            $product->image = $filename;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');

        $product->status = $request->input('status') == TRUE ? '1' : '0';

        ProductFacade::store($product->toArray());

        return redirect('dashboard')->with('status', "Product Added Successfully");
    }

    public function page()
    {
        return view('layouts.admin.add-product');
    }

    public function status($id)
    {

        $product = Product::find($id);

        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }

        $product->update();

        return redirect('dashboard')->with('status', "Product Updated Successfully");
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $path = 'assets/images/' . $product->image;

        if (File::exists($path)) {
            File::delete($path);
        }

        ProductFacade::destroy($id);

        return redirect('dashboard')->with('status', "Product Deleted Successfully");
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('layouts.admin.update-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/images/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename  = time() . "." . $ext;
            $file->move('assets/images', $filename);
            $product->image = $filename;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');

        $product->status = $request->input('status') == TRUE ? '1' : '0';

        $product->update();

        return redirect('dashboard')->with('status', "Product Updated Successfully");
    }
}
