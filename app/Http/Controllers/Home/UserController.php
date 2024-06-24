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
            $updateUserData['image'] = Storage::disk('users')->put('images', $request->file('image'));
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
}
