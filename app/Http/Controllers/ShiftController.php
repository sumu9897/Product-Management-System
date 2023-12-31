<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shift; // Make sure to import your Shift model

use Illuminate\Foundation\Bootstrap\HandleException;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function all()
    {
        $shifts = Shift::paginate(10);
        $shifts = Shift::all();

        // You can return the shifts to a view or format it as needed
       // return view('shift.all', ['shift' => $shifts]);
        return view('shift.all', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shiftProducts = Shift::pluck('product_serial')->toArray();
        $products = Product::whereNotIn('serial', $shiftProducts)->get();

        $shiftProducts = Shift::pluck('SBU')->toArray();
        $products = Product::whereNotIn('SBU', $shiftProducts)->get();

       


    //return view('all.blade.view', ['products' => $products]);
    return view('shift.create', compact('products'));
    return view('shift.create');
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'nullable|string',
            'product_serial' => 'nullable|string',
            'SBU' => 'nullable|string',
            'Now_SBU' => 'nullable|string',
            'Shift_Date' => 'nullable|date',
            'Shift_by' => 'nullable|string',
        ]);

        // Create a new shift instance and save it to the database
        $shift = Shift::create($validatedData);

        // You can redirect the user to a specific page or return a response
        return redirect()->route('shift.all')->with('success', 'Shift created successfully!');
    }

    // Other controller methods (update, edit, destroy) can be added as needed
}
