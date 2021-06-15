<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Rules\CustomSuffix;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:category,id',
            'name'     => ['required', 'max:255', new CustomSuffix],
            'value'    => 'required|gte:10|lte:100',
            'quality'  => 'required|gte:-10|lte:50',
        ]);
        $item = Item::create($request->all());
            
        return $this->successResponse($item, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update existing item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'exists:category,id',
            'name'     => 'max:255',
            'value'    => 'gte:10|lte:100',
            'quality'  => 'gte:-10|lte:50',
        ]);

        $item = Item::findOrFail($id);
        $item->fill($request->all());

        if ($item->isClean()) {
            return $this->errorResponse("At least one value should change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $item->save();
        return $this->successResponse($item);
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
