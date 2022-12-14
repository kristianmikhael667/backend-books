<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catalog = DB::table('catalog')->orderBy('created_at', 'desc')->get();
        return view('admin.catalog-book', [
            'page' => 'Administrator',
            'url' => env('BASE_URL'),
            'categories' => $catalog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-catalog-book', [
            'page' => 'Create Catalog Book',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_catalog' => 'required',
            'image_catalog'  => 'image|file|max:1024',
        ]);

        if ($request->file('image_catalog')) {
            $validatedData['image_catalog'] = $request->file('image_catalog')->store('post-image');
        }

        $validatedData['parent'] = $request->parent ? $request->parent : 0;
        $slug = SlugService::createSlug(Catalog::class, 'slug', $request->name_catalog);
        $validatedData['slug'] = $slug;
        Catalog::create($validatedData);
        return redirect('/administrator/catalog')->with('success', 'New Catalog has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($catalog)
    {
        $data = Catalog::where('slug',$catalog)->first();
        if ($data->image_catalog) {
            Storage::delete($data->image_catalog);
        }
        Catalog::destroy($data->id);
        return redirect('/administrator/catalog')->with('success', 'Catalog has been deleted!');

    }
}
