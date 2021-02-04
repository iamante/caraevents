<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $paginate = 12;
        $categories = Category::all();

        if (request()->category) {
            $services = Service::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoriesName = optional($categories->where('slug', request()->category)->first())->name;
            $title = 'Services'; 
            

        } else {
            $title = 'Services';    
            $services = Service::take(12);
            $categoriesName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $services = $services->orderBy('price')->paginate($paginate);
        } elseif (request()->sort == 'high_low') {
            $services = $services->orderBy('price', 'desc')->paginate($paginate);
        } else {
            $services = $services->paginate($paginate);
        }
        
        return view('pages.services')->with([
            'services' => $services,
            'categories' => $categories,
            'categoriesName' => $categoriesName,
            'title' => $title,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $title = 'Service';
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.service')->with(['service' => $service, 'title' => $title]);
    }

     public function search(Request $request)
     {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $title = "Search Results";
        $query = request()->input('query');
        $services = Service::search($query)->paginate(16);

        return view('pages.search-results')->with(['title' => $title, 'services' => $services ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
