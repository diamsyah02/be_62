<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use App\Models\Product;

class ProductController extends Controller
{
    use ApiResponse;

    public function __construct(){}

    public function index()
    {
        $data = Product::all();
        return response()->json(self::res(200, 'Get data category successfully!', $data), 200);
    }

    public function store(Request $request)
    {
        $add                = new Product();
        $add->title         = $request->title;
        $add->description   = $request->description;
        $add->save();
        return response()->json(self::res(201, 'Insert data category successfully!', []), 201);
    }

    public function update(Request $request, $id)
    {
        $update                 = Product::findOrFail($id);
        $update->title          = $request->title;
        $update->description    = $request->description;
        $update->update();
        return response()->json(self::res(200, 'Update data category successfully!', []), 200);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(self::res(200, 'Delete data category successfully!', []), 200);
    }
}
