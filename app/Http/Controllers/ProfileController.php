<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Met à jour name et email
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Gestion de l'image
        if ($request->hasFile('image')) {

            // Supprime l'ancienne image
            if ($user->image) {
                Storage::disk('public')->delete('profile/' . $user->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Stocke l'image dans storage/app/public/profile
            $image->storeAs('profile', $filename, 'public');

            // Enregistre le nom dans la BDD
            $user->image = $filename;
        }

        $user->save(); // Sauvegarde les changements

        return redirect()->route('profile.edit')->with('status', 'Profil mis à jour avec succès !');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
