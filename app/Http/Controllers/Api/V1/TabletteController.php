<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tablette;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TabletteController extends Controller
{
    //
    public function index(){
        return Tablette::all();
    }

    public function store(Request $request){
        $data = $request->validated();
        return Tablette::create($data);
    }
}
