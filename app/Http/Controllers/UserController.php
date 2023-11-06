<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        // Search for users by name or ID
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('user_id', $search)
            ->paginate(10);
    } else {
        // Retrieve all users
        $users = User::paginate(10);
    }

    return view('user.all', compact('users'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = user::create([


            'name' => $request ->name,
            //'user_id' => rand(100000, 999999),   // if select randomly
            'user_id' => $request ->user_id,
            'email' =>$request -> email,
            'password' => bcrypt($request->password),
            'department' =>$request ->department,
            'number' => $request ->number,
            'jdate' =>$request ->jdate,
            'status' =>1,
            //'created_by' => auth()->user()->name(),
            //'created_by' => auth()->user()->name,
            'profile_image' => $request ->profile_image,
            'role_as' => $request ->role_as,
            'user_type' => $request ->user_type,
            'belongs_to' => $request -> belongs_to,
            
           
        ]);

        return redirect()->back()->with('success', 'user successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);

        return view('user.edit', compact('user'));
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
        $user = user::findOrFail($id);

        $user->update([
            'name' => $request ->name,
            'id' => $request -> id,
            'email' => $request -> email,
            'department' => $request ->department,
            'number' => $request -> number,
            'status' => $request -> status,
            'jdate' => $request ->jdate,
            'profile_image' => $request ->profile_image,
            'role_as' => $request ->role_as,
            'user_type' => $request ->user_type,
            'belongs_to' => $request -> belongs_to,
            
        ]);

        return redirect()->back()->with('success', 'user successfully updated.');
    }

    



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'user successfully deleted.');
    }

    // private function generateUniqueId()
    // {
    //     return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    // }


    
}
