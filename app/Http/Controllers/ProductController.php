<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();

        return Inertia::render('products/Index', compact('products'));
    }

      public function create(){
        return Inertia::render('products/Create',[]);
    }

        public function store(Request $request) {
  try {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "description" => "nullable|string"
        ]);

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('message', 'Product created successfully!')
            ->with('type', 'success');

    } catch (\Throwable $e) {
        Log::error('Error on create product: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput() // mantém os dados no formulário
            ->with('message', 'Error on create product, please try again')
            ->with('type', 'error');
    };
    }

    public function edit(Product $product) {
        return Inertia::render('products/Edit', compact("product"));
    }

    public function update(Request $request, Product $product) {

        try{
                    $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "description" => "nullable|string"
        ]);

        $product->update([
            "name" => $request->input('name'),
            "price" => $request->input('price'),
            "description" => $request->input('description'),
        ]);

        return redirect()
            ->route('products.index')
            ->with('message', 'Product updated successfully!')
            ->with('type', 'success');

        } catch (\Throwable $e) {
            Log::error('Error on update product: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput() // mantém os dados no formulário
            ->with('message', 'Error on update product, please try again')
            ->with('type', 'error');
        };
    }

    public function destroy(Product $product) {
        try {
            $product->delete();

                    return redirect()
            ->route('products.index')
            ->with('message', 'A product was deleted!')
            ->with('type', 'warning');
        
        } catch (\Throwable $e) {
            Log::error('Error on delete product: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput() // mantém os dados no formulário
            ->with('message', 'Error on delete product, please try again')
            ->with('type', 'error');
        };
    }
}
