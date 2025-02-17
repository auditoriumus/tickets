<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return Region::with('districts')->get();
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        return Region::with('districts')->findOrFail($id);
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
