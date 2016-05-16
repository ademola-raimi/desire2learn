<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Hash;
use Cloudder;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Repository\UserRepository;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->userRepository = new UserRepository();
	}

    /**
     * Gets profile update page.
     *
     * @return Response
     */
    public function getProfileSettings()
    {
        $users = Auth::user();

        return view('dashboard.profile.settings', compact('users'));
    }

    /**
     * Posts form request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function updateProfileSettings(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|max:255|unique:users,username,'. Auth::user()->id,
            'first_name' => 'required|max:255|unique:users,first_name,'. Auth::user()->id,
            'last_name'  => 'required|max:255|unique:users,last_name,'. Auth::user()->id,
            'email'     => 'required|max:255|unique:users,email,'. Auth::user()->id,
        ]);

        $updateUser = User::where('id', Auth::user()->id)->update([
        	'username'  => $request->username,
        	'firstname' => $request->firstname,
        	'lastname'  => $request->lastname,
        	'email'     => $request->email,
        ]);

        return redirect()->route('edit-profile')->with('status', 'You have successfully updated your profile.');
    }

    /**
     *  Posts image update request.
     */
    public function postAvatarSetting(Request $request)
    {
        $img = $request->file('avatar_url');
        Cloudder::upload($img, null);
        $imgurl = Cloudder::getResult()['url'];

        $this->userRepository->findUser(Auth::user()->id)->updateAvatar($imgurl);

        return redirect()->route('edit-profile')->with('status', 'Avatar updated successfully.');
    }

    public function getChangePassword()
    {
        $users = Auth::user();

        return view('dashboard.profile.changepassword', compact('users'));
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Compare old password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Old password incorrect']);
        }

        // Update current password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('status', 'Password successfully updated');
    }

}
