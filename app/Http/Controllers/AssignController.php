<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssignController extends Controller
{
    public function all()
    {
        $assigns = Assign::paginate(10);
        return view('assign.all', compact('assigns'));
    }

    public function create()
    {
        $employees = User::all();
        $assignedProducts = Assign::pluck('product_serial')->toArray();
        $products = Product::whereNotIn('serial', $assignedProducts)->get();
        return view('assign.create', compact('employees', 'products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_serial' => 'required',
            'user_id' => 'required',
            'adate' => 'required|date',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $assign = Assign::create([
            'product_serial' => $request->product_serial,
            'product_name' => $request->product_name,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'adate' => $request->adate,
            'status' => $request->status,
            'rdate' => $request->rdate,
            'created_by' => $user->id,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Product Assigned successfully.');
    }

    public function show($id)
    {
        $assign = Assign::findOrFail($id);
        return view('assign.show', compact('assign'));
    }

    public function edit($id)
    {
        $assign = Assign::findOrFail($id);
        $employees = User::all();
        $assignedProducts = Assign::pluck('product_serial')->toArray();
        $products = Product::whereNotIn('serial', $assignedProducts)->get();
        return view('assign.edit', compact('employees', 'products','assign'));
        //return view('assign.edit', compact());
    }

    public function update(Request $request, $id)
    {
        $assign = Assign::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'product_serial' => 'required',
            'user_id' => 'required',
            'adate' => 'required|date',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $assign->update([
            'product_serial' => $request->product_serial,
            'product_name' => $request->product_name,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'adate' => $request->adate,
            'status' => $request->status,
            'rdate' => $request->rdate,
            'updated_by' => $user->id,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();
        return view('product.search', compact('products'));
    }

    public function destroy($id)
    {
        $assign = Assign::findOrFail($id);
        $user = Auth::user();

        $assign->update([
            'deleted_by' => $user->id,
            'deleted_at' => now(),
        ]);

        $assign->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
