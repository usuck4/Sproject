<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User; // Assuming you're using the User model
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        return response()->json([
            'user' => [
                "phone" =>$user->phone,
                "email" => $user->email,
            ],
            'profile' => [
                "name" =>$user->profile->name,
                "photo" =>$user->profile->profile_photo,

            ],
            'message' => 'Profile retrieved successfully'
        ]);
//-------------------------------------------------------------------------
           return view('profile.show', ['user' => Auth::user()]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            // Add other profile fields as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }
         if ($request->has('name')) {
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id], // Ensure profile exists
            ['name' => $request->name]
        );
    }

        $user->update($validator->validated());

        return response()->json([
            'user' => $user,
            'message' => 'Profile updated successfully'
        ]);

//-------------------------------------------------------

         $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
        ]);

        $user->update($validated);
        
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'The provided password does not match your current password'
            ], 401);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'new password'=>$user->password,
            'message' => 'Password updated successfully'
        ]);


        //------------------------------------------------------
        $user = Auth::user();
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('profile.show')->with('success', 'Password updated successfully!');
    }




    public function updateAvatar(Request $request)
{
    $validator = Validator::make($request->all(), [
        'profile_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
            'message' => 'Validation failed'
        ], 422);
    }

    $user = Auth::user();
    
    // Ensure the user has a profile
    if (!$user->profile) {
        $user->profile()->create([]);
    }

    // Store the new profile_photo
    $path = $request->file('profile_photo')->store('profile_photos', 'public');
    
    // Delete old profile_photo if exists
    if ($user->profile->profile_photo) {
        Storage::disk('public')->delete($user->profile->profile_photo);
    }

    // Update the profile_photo in the Profile model
    $user->profile()->update(['profile_photo' => $path]);

   return response()->json([
        'profile_photo_url' => asset("storage/{$path}"),
        'message' => 'Profile photo updated successfully'
    ]);
    //------------------------------------------------


      $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        $path = $request->file('avatar')->store('avatars', 'public');
        
        Auth::user()->profile()->update([
            'profile_photo' => $path
        ]);

        return back()->with('success', 'Profile photo updated!');
}
public function destroy()
{
    $user = Auth::user();
    
    // Delete profile photo if exists
    if ($user->profile && $user->profile->profile_photo) {
        Storage::disk('public')->delete($user->profile->profile_photo);
    }
    
    // Delete user (which cascades to profile via Model boot())
    $user->delete();
    
    return response()->json([
        'message' => 'Account and all associated data deleted successfully'
    ]);





    //------------

    $user = Auth::user();
        
        Auth::logout();
        $user->delete();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Your account has been deleted!');
}


    /**
     * Upload/update profile picture.
     */
    



    // Show user profile
    

  

    // Update password
   

    // Update profile photo
  

    // Delete profile

    }

