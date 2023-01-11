<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }
    public function AddCategory()
    {
        return view('admin.addcategory');
    }
    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'categroy_image' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:4048',
        ]);

        $image = $request->file('categroy_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->categroy_image->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Category::insert([
            'category_name' => $request->category_name,
            'categroy_image' => $img_url,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);
        return redirect()->back();
    }
}