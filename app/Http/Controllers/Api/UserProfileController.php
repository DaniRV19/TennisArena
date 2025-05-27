<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return response()->json([
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'points' => $user->points,
            'photo_url' => $user->photo ? asset('storage/' . $user->photo) : asset('default-user.png'),
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        if ($user->photo) {
            Storage::delete('public/' . $user->photo);
        }

        $path = $request->file('photo')->store('profile-photos', 'public');
        $user->photo = $path;
        $user->save();

        return response()->json(['photo_url' => asset('storage/' . $path)]);
    }
}
