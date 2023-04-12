<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(["parentCategory:id,name", 'user'])->orderBy("order","DESC")->get();

        return view("admin.categories.list",['list' => $categories]);
    }

    public function create()
    {
        return view("admin.categories.create-update");
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'id' => ['required','integer', "exists:categories"]
        ]);
        $categoryID = $request->id;

        $category = Category::where("id", $categoryID)->first();

        $oldStatus = $category->status;

        $category->status = !$category->status;
        $category->save();

        $statusText = ($oldStatus == 1 ? "Aktif" : "Pasif"). "'ten " . ($category->status == 1 ? "Aktif" : "Pasif");

        alert()
            ->success('Başarılı', $category->name . " status " . $statusText . " olarak güncellendi")
            ->showConfirmButton('Tamam', '#3085d6')
            ->autoClose(5000);

//        return redirect()->route("category.index");
        return redirect()->back();

    }
    public function changeFeatureStatus(Request $request)
    {
        $request->validate([
            'id' => ['required','integer', "exists:categories"]
        ]);
        $categoryID = $request->id;

        $category = Category::where("id", $categoryID)->first();

        $oldStatus = $category->feature_status;

        $category->feature_status = !$category->feature_status;
        $category->save();

        $statusText = ($oldStatus == 1 ? "Aktif" : "Pasif"). "'ten " . ($category->feature_status == 1 ? "Aktif" : "Pasif");

        alert()
            ->success('Başarılı', $category->name . " feature status değeri " . $statusText . " olarak güncellendi")
            ->showConfirmButton('Tamam', '#3085d6')
            ->autoClose(5000);

//        return redirect()->route("category.index");
        return redirect()->back();

    }

}
