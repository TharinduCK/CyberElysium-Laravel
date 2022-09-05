<?php

namespace domain\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductService
{

    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function all()
    {
        $products = Product::all();
        return $products;
    }

    public function store($data)
    {
        $this->product->create($data);
    }

    // public function update($product_id)
    // {
    //     $product = $this->product->find($product_id);
    //     $product->update($product->all());
    // }


    public function destroy($product_id)
    {
        $product = $this->product->find($product_id);
        $product->delete();
    }
}
