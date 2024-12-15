<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VaccineCenter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the registration form
    public function register() {
        $vaccine_centers = VaccineCenter::all();
        return view('register', compact('vaccine_centers'));
    }

    // Handle registration
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'nid' => 'required|string|min:17|max:17',
            'phone_number' => 'required|string|min:11|max:15',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id'
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new user
        $registeredUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nid' => $request->nid,
            'phone_number' => $request->phone_number,
            'vaccine_center_id' => $request->vaccine_center_id,
        ]);

        // Registration success
        if ($registeredUser) {
            return redirect()->route('users.index')->with('success', 'Registration is successful!');
        }

        // Handle unexpected failure
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}
