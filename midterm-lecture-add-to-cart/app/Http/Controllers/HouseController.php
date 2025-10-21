<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function viewHouse($id)
    {
        $house = House::findOrFail($id);
        return view('house', compact('house'));
    }

    public function listHouses()
    {
        $houses = House::all();
        return view('houseList', compact('houses'));
    }

    public function createHouseForm()
    {
        return view('createHouse');
    }

    public function createHousePost(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
        ]);

        $house = House::create($validated);

        return view('houseCreated', ['house' => $house]);
    }

    public function updateHouseForm($id)
    {
        $house = House::findOrFail($id);
        return view('updateHouse', compact('house'));
    }

    public function updateHousePost(Request $request, $id)
    {
        $house = House::findOrFail($id);

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
        ]);

        $house->update($validated);

        return redirect()->route('house.list')->with('successMessage', 'House updated successfully.');
    }

    public function deleteHouse($id)
    {
        $house = House::findOrFail($id);
        $house->delete();

        return redirect()->route('house.list')->with('successMessage', 'House deleted successfully.');
    }
}
