<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\Admin;


class UserController extends Controller
{
    public function save(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:7',
            'confirmPassword' =>'required|same:password'
            // Add more validation rules for other fields here
        ]);
    
        // Check if validation passes
        if ($validator) {
            // Validation passed, continue with your logic
            $user = new Admin;
            $user->Name = $validator['name'];
            $user->Email = $validator['email'];
            $user->Password = Hash::make($validator['password']);
            $user->save();
            return response()->json(['message' => 'Data saved successfully']);
        } 
        else {
            // Validation failed, return an error message
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function index()
{
    $users = Admin::all();
    return view('home')->with('users' , $users);
}

public function delete($userId)
{
    $users = Admin::find($userId);
    if($users)
    {
    $users->delete();
    return response()->json(['message' => 'Data Delete Successfully']);
    }
    else
    {
        return response()->json(['message' => 'Data not found']);

    }
}
public function edit($userId)
{
    $users = Admin::find($userId);
    $name = $users->Name;
    $email = $users->Email;
    $id = $users->ID;
    if($users)
    {
   
    return response()->json(['name' => $name, 'email' => $email,'id' =>$id]);
    }
    else
    {
        return response()->json(['message' => 'Data not found']);

    }
}
public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:admin,email,'.$id,
        'password' => 'required|min:7',
        'confirmPassword' =>'required|same:password'
        // Add any other validation rules for your fields
    ]);

    // Find the user by ID
    $user = Admin::find($id);

    if (!$user) {
        // User not found, return an error response
        return response()->json(['error' => 'User not found'], 404);
    }

    // Update the user's data
    $user->Name = $validatedData['name'];
    $user->Email = $validatedData['email'];
    $user->Password = $validatedData['password'];
   
    // Update any other fields you need

    // Save the changes
    $user->save();

    // Return a success response
    return response()->json(['message' => 'User updated successfully'], 200);
}



    
}
