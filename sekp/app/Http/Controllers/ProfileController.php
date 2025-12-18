<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Upload avatar
    $avatar = null;
    if ($request->hasFile('avatar')) {
        $fileName = time() . '.' . $request->avatar->extension();
        $request->avatar->storeAs('public/avatars', $fileName);
        $avatar = $fileName;
    }

    DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'name'        => $request->name,
            'username'    => $request->username,
            'phone'       => $request->phone,
            'gender'      => $request->gender,
            'birth_date'  => $request->birth_date,
            'address'     => $request->address,
            'city'        => $request->city,
            'province'    => $request->province,
            'postal_code' => $request->postal_code,
            'avatar'      => $avatar,
            'updated_at'  => now(),
        ]);

    return redirect()->route('profile.index')
        ->with('success', 'Profil berhasil diperbarui');
}
}