<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $storeCount=0;
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items=$request->all();
        foreach($items as $item){

            $newItem=Item::create($item);
            $this->storeCount=$this->storeCount+1;
        }
        return $this->storeCount;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ItemResource(Item::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
