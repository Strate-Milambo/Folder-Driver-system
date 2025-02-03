<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function delete(Request $request){
        $request->validate([
            'password'=>['required', 'current_password'],
        ]);
        
        if(Hash::check($request->password,Auth::user()->password)){
            Auth::user()->delete();
            $request->session()->invalidate();
             $request->session()->regenerateToken();
            return redirect('/');
        }
        return redirect()->back();
    }
    public function updateProfile(Request $request)
    {
        if(isset($request->delete)){
            $user = User::find(Auth::id());
            $user->photo_path="avatars/default.png";
            $user->save();
        }
        
        if(isset($request->photo_path)){ 
            $request->validate([
                'photo_path'=> "required",
            ]);

            $extension=$request->photo_path->extension();
                $photo_path = time().'.'.$extension;
            
            $available =['jpg','Png'];
            $photo = true ;


            if(!in_array($extension, $available)){
                $message = false;
            }
            
            if($photo){
                $path=$request->photo_path->storeAS('avatars',$photo_path, 'public');

                $user = User::find(Auth::id());
                $user->photo_path=$path;
                $user->save();
            }else{
                echo "<script>alert('Rien que les photos d'extension .png et .jpg sont autorisées😊')</script>";

            }
            
        }else{
            $request->validate([
                'profession' => "required",
                'name'=> "required",
                'about'=> "required|min:150",
                'location'=>"required"
            ]);
            $user = User::find(Auth::id());
            $user->name=$request->name;
            $user->profession=$request->profession;
            $user->about=$request->about;
            $user->location=$request->location;
            $user->save();

        }

       return redirect()->back();

    }
    public function UpdatePassword(Request $request)
    {
        // dd($request);
        $request->validate([
            'oldpassword' => ['required', 'current_password'],
            'Newpassword' => ['required', 'min:8'],
            'Confirmpassword' => ['required', 'min:8'],
        ]);

        $new = $request->Newpassword;
        $confirm = $request->Confirmpassword;

        if(Hash::check($request->oldpassword, Auth::user()->password)){
            if($new == $confirm){
                $user = User::find(Auth::id());
                $user->password = $confirm;
                $user->save();

                return redirect()->back();
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    
}
