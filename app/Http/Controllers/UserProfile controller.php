<?php

namespace App\Http\Controllers;

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
            'surname' => $user->surname,
            'email' => $user->email,
            'points' => $user->points ?? 0,
            'profile_photo_url' => $user->profile_photo ? asset('storage/' . $user->profile_photo) : null
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);

        $user = Auth::user();

        if ($user->profile_photo) {
            Storage::delete('public/' . $user->profile_photo);
        }

        $path = $request->file('photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;
        $user->save();

        return response()->json(['message' => 'Foto actualizada']);
    }
}
