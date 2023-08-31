<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOriginRequest;
use App\Http\Requests\UpdateOriginRequest;
use App\Http\Requests\DeleteOriginRequest;
use App\Models\Origin;

class OriginController extends Controller
{

    /**
     * Menşei kaydı oluşturur.
     */
    function create(CreateOriginRequest $request)
    {
        $request->validated();
        $fields = $request->safe()->only(['name']);

        Origin::create($fields);
        return response()->json(['status' => true]);
    }

    /**
     * Menşei kaydını günceller.
     */
    function update(UpdateOriginRequest $request)
    {
        $request->validated();
        $fields = $request->safe()->only(['name']);

        Origin::where('id', $request->input('id'))->update($fields);
        return response()->json(['status' => true]);
    }
    
    /**
     * Menşei kaydını siler.
     */
    function delete(DeleteOriginRequest $request)
    {
        $request->validated();

        Origin::where('id', $request->input('id'))->delete();
        return response()->json(['status' => true]);
    }
    
}
