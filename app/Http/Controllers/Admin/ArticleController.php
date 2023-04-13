<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        return view("admin.articles.list");
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.articles.create-update", compact("categories"));
    }

    public function store(ArticleCreateRequest $request)
    {
        $imageFile = $request->file("image");
        $originalName = $imageFile->getClientOriginalName();
        $originalExtension = $imageFile->getClientOriginalExtension();
        $explodeName = explode(".",$originalName)[0];
        $fileName = Str::slug($explodeName) . "." . $originalExtension;

        $folder = "articles";
        $publicPath = "storage/" .$folder;

        if (file_exists(public_path($publicPath. $fileName)))
        {
            return redirect()->back("")->withErrors([
                'image' => "Aynı görsel daha önce yüklenmiştir."
            ]);
        }

        $data = $request->except("_token");
        $slug = $data['slug'] ?? $data['title'];
        $slug = Str::slug($slug);
        $slugTitle = Str::slug($data["title"]);

        $checkSlug = $this->slugCheck($slug);

        if (!is_null($checkSlug))
        {
            $checkTitleSlug = $this->slugCheck($slugTitle);
            if (!is_null($checkTitleSlug))
            {
                // Title Slug Dolu Geldiyse
                $slug = Str::slug($slug . time());
            }
            else
            {
                $slug = $slugTitle;
            }

        }

        $data["slug"] = $slug;
        $data["image"] = $publicPath ."/". $fileName;
        $data["user_id"] = auth()->id();
        $data["user_id"] = auth()->id();

        Article::create($data);
        $imageFile->storeAs($folder, $fileName);

        alert()
            ->success('Başarılı', 'Makale Kayıt Edildi')
            ->showConfirmButton('Tamam', '#3085d6')
            ->autoClose(5000);
        return redirect()->back();

    }

    public function slugCheck(string $text)
    {
        return Article::where("slug", $text)->first();
    }


}
