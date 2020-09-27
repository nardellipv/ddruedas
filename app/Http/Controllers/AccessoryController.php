<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Category;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::paginate(9);

        $accessoriesLast = Accessory::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        return view('web.accessories.list', compact('accessories', 'accessoriesLast'));
    }

    public function detail($id)
    {
        $accessory = Accessory::where('id', $id)
            ->first();

        $relatedProducts = Accessory::where('category_id', $accessory->category_id)
            ->where('id', '!=', $accessory->id)
            ->take(3)
            ->get();

        $accessoriesLast = Accessory::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        return view('web.accessories.detail', compact('accessory', 'relatedProducts', 'accessoriesLast'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->first();

        $accessories = Accessory::where('category_id', $category->id)
            ->paginate(9);

        $accessoriesLast = Accessory::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        return view('web.accessories.listCategory', compact('category',
            'accessoriesLast', 'accessories'));
    }
}
