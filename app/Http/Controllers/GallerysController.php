<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\CategoryImage;
use Illuminate\Http\Request;

class GallerysController extends Controller
{
    public function index() {

        $paginate = 15;
        $categories = CategoryImage::all();

        if (request()->category) {
            $galleries = Gallery::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->paginate($paginate);
            $categoriesName = optional($categories->where('slug', request()->category)->first())->name;    
        } else {   
            $galleries = Gallery::paginate($paginate);
        }

        return view('pages.gallery')->with([
            'galleries' => $galleries,
            'categories' => $categories,]);
    }

}
