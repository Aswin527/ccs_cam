<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use App\Models\Slug;

class SitemapController extends Controller
{
    //
    public function index()
    {
      $categories = Category::where("type","!=",3)->get();
      $products = Product::all();
      $pages = Page::where("status","=",1)->get();
      $slugs = Slug::all();
      $blogs = Blog::all();  
      return response()->view('sitemap.index', [
        'categories' => $categories,
        'products' => $products,
        'pages' => $pages,
          'slugs' => $slugs,
          'blogs'=>$blogs ,
      ])->header('Content-Type', 'text/xml');
    }
    public function pages()
    {
        $pages = Page::latest()->get();
        return response()->view('sitemap.pages', [
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function products()
    {
        $products = Product::latest()->get();
        return response()->view('sitemap.products', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }

   
}
