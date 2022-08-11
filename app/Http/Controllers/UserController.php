<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
  public function register(Request $request)
  {
      $this->validate($request, [
          'email' => 'required|unique:users|email',
          'password' => 'required|min:6'
      ]);

      $email = $request->input('email');
      $password = Hash::make($request->input('password'));

      $user = User::create([
          'email' => $email,
          'password' => $password
      ]);

      return response()->json(['message' => 'Data added successfully'], 201);
  }
} 