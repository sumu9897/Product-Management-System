<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $assigns = assign::paginate(10);

        // dd($assigns);

        return view('assign.all', compact('assigns'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all employees
        $employees = User::all();

        // Get products that are not already assigned
        $assignedProducts = Assign::pluck('product_serial')->toArray();
        $products = Product::whereNotIn('serial', $assignedProducts)->get();

        // Return the view with the employees and filtered products
        return view('assign.create', compact('employees', 'products'));
    }

    public function store(Request $request)
    {
        $assign = Assign::create([

            
            'product_serial' => $request->product_serial,
            'product_name' => $request->product_name,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'adate' => $request-> adate,
            'status' => $request-> status,
            'rdate' => $request-> rdate,

              
        ]);

        // dd($assign);

        return redirect()->back()->with('success', 'Product Assign successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assign = Assign::findOrFail($id);

        return view('assign.show', compact('assign'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assign = Assign::findOrFail($id);

        return view('assign.edit', compact('assign'));
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
        $assign = Assign::findOrFail($id);

        $assign>update([
            
            'product_serial' => $request->product_serial,
            'product_name' => $request->product_name,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'adate' => $request-> adate,
            'status' => $request-> status,
            'rdate' => $request-> rdate,
        ]);

        return redirect()->back()->with('success', 'updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('product.search', compact('products'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign = Assign::findOrFail($id);

        $assign->delete();

        return redirect()->back()->with('success', 'Data successfully deleted.');
    }


}
