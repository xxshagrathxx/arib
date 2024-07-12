<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'password' => 'nullable|confirmed|min:8',
            'phone' => 'required|unique:users,phone,'.$user->id,
            'image' => 'mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ],[
            'name.required' => transWord('This field is required'),
            'password.confirmed' => transWord('Passwords don\'t match'),
            'password.min' => transWord('Password must be 8 characters or more'),
            'phone.required' => transWord('This field is required'),
            'image.mimes' => 'The image must be of type (jpeg,png,jpg,webp,gif,svg)',
            'image.max' => 'The image size cannot be larger than 2MB',
        ]);

        $old_img = $request->old_img;
        $save_url = $old_img;

        if ($request->file('image')) {
            if (!str_contains($old_img, 'default.png')) {
                unlink('uploads/users/'.$old_img);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/users/'.$name_gen);
            $save_url = $name_gen;
        }

        if($request->password) {
            if($user->id == 2 && $user->password_changed == 0) {
                $user->update([
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'avatar' => $save_url,
                    'password_changed' => 1,
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'avatar' => $save_url,
                ]);
            }
        } else {
            $user->update([
                'name' => $request->name,
                'avatar' => $save_url,
            ]);
        }



        $notification = array(
			'message' => transWord('Profile updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('dashboard')->with($notification);
    }
}
