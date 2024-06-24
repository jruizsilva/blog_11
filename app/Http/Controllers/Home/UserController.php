<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $data = [
            'user' => $user
        ];
        return view('home.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $updateUserData = $request->safe()->except('image');
        if ($request->hasFile('image')) {
            $updateUserData['image'] = $request->file('image')->store('users/images');
        }
        $user->update($updateUserData);
        return redirect()->route('user.edit')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function destroyImage()
    {
        /** @var User $user */
        $user = Auth::user();
        Storage::delete($user->image);
        $user->update(['image' => null]);
        return redirect()->route('user.edit')
            ->with('success', 'Image deleted successfully');
    }
}
