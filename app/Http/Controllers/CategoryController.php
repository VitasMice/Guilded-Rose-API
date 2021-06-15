<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create a new category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $category = Category::create($request->all());
            
        return $this->successResponse($category, Response::HTTP_CREATED);
    }

    /**
     * Returns all items in requested category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id); // Checks if category exist, if not fails and returns 404 error
        $items    = Category::with('itemsInCategory')->find($id)->itemsInCategory;

        if ($items->isEmpty()) {
            return $this->errorResponse("There is no items in requested category", Response::HTTP_NOT_FOUND);
        }

        return $this->successResponse($items);
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
     * Deletes all items related by specified category id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Checks if category exist, if not fails and returns 404 error
        $items    = Category::with('itemsInCategory')->find($id);
        $items->delete();

        return $this->successResponse($items);
    }
}
