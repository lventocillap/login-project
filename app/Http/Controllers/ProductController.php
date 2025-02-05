<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductException\ProductNotFound;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Utils\ValidateRequestProduct;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ValidateRequestProduct;
    
    public function getProducts()
    {
        $products = Product::get();
        return ProductResource::collection($products);
    }
    public function getProduct(int $id)
    {
        $productId = Product::find($id);
        if(!$productId){
            throw new ProductNotFound;
        }
        return new ProductResource($productId);
    }
    public function store(Request $request): JsonResponse
    {
        $this->validate($request);
        Product::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'category' => $request->category,
            'date' => $request->date,
            'price' => $request->price
        ]);
        return new JsonResponse(['message' => 'product store successful']);
    }
    public function update(int $id, Request $request):JsonResponse
    {
        $productId = Product::find($id);
        if(!$productId){
            throw new ProductNotFound;
        }
        $this->validate($request);
        $productId->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'category' => $request->category,
            'date' => $request->date,
            'price' => $request->price
        ]);
        return new JsonResponse(['message' => 'product update successful']);
    }
    public function delete(int $id):JsonResponse
    {
        $productId = Product::find($id);
        if(!$productId){
            throw new ProductNotFound;
        }
        $productId->delete();
        return new JsonResponse(['message' => 'product delete successful']);
    }
}
