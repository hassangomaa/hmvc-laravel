<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
                         return Item::all();
###
###################################
############################3
                        // 55
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            // 'status' => 'required|in:available,out_of_stock,discontinued',
        ]);

        // fill the status with default value
        $request->status = 'available';

        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    public function show($id)
    {
        return Item::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'description' => 'nullable|string',
            // 'price' => 'required|numeric|min:0',
            // 'stock' => 'required|integer|min:0',
            // 'status' => 'required|in:available,out_of_stock,discontinued',
        ]);
        // fill the status with default value
        // $request->status = "available";

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Item::destroy($id);

        return response()->json(null, 204);
    }
}
