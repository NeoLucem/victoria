<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Requests\V1\StoreRestaurantRequest;
use App\Http\Resources\V1\RestaurantResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function index(){
        return Restaurant::all();
    }

    public function store(StoreRestaurantRequest $request){
        $data = $request->validated();
        $data['id'] = (string) Str::uuid(); // Generate a unique UUID for the `id` field
        Log::info($data);
        return new RestaurantResource(Restaurant::create($data));    
    }

    public function show(Restaurant $restaurant){
        return new RestaurantResource($restaurant);
    }

    public function destroy(Restaurant $restaurant){
        $restaurant->delete();
        return response()->json(['message' => 'Restaurant deleted successfully']);
    }

    public function update(StoreRestaurantRequest $request, Restaurant $restaurant){
        $data = $request->validated();
        $restaurant->update($data);
        return new RestaurantResource($restaurant);
    }
}
