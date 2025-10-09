<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bag;

class BagController extends Controller
{
    // GET
    public function createBagForm()
    {
        return view('createBag');
    }

    // POST
    public function createBagPost(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:100',
            'price' => 'required|numeric|min:0'
        ]);

        $bag = Bag::create([
            'brand' => $validated['brand'],
            'color' => $validated['color'],
            'price' => $validated['price'],
            'owner' => auth()->user()->email,
        ]);

        return view('bagCreated', ['bag' => $bag]);
    }

    public function bagsList()
    {
        $bags = Bag::all();
        return view('bagsList', compact('bags'));
    }

    public function editBagForm($id)
    {
        $bag = Bag::findOrFail($id);
        return view('editBag', compact('bag'));
    }

    public function editBagPost(Request $request, $id)
    {
        $bag = Bag::findOrFail($id);

        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'owner' => 'required|string|max:255',
        ]);

        $bag->update($validated);

        return redirect()->route('bags.list')->with('successMessage', 'Bag updated successfully.');
    }
}
