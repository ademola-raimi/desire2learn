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
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'     => 'required|max:255|unique:users,email,'. Auth::user()->id,
        ]);

        $updateUser = User::where('id', Auth::user()->id)->update([
        	'username'  => $request->username,
        	'first_name' => $request->first_name,
        	'last_name'  => $request->last_name,
        	'email'     => $request->email,
        ]);

        if ($updateUser) {

            alert()->success('You have successfully updated your profile', 'Success');

            return redirect()->route('edit-profile');
        } else {
            alert()->error('Something went wrong', 'Error');

            return redirect()->route('edit-profile');
        }    
    }

    /**
     *  Posts image update request.
     */
    public function postAvatarSetting(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required',
        ]);

        $img = $request->file('avatar');
        
        Cloudder::upload($img, null);
        $imgurl = Cloudder::getResult()['url'];
       
        if ($imgurl) {
            alert()->success('Avatar updated successfully', 'Success');

            return redirect()->route('edit-profile');
        } else {
            alert()->error('Something went wrong', 'Error');

            return redirect()->route('edit-profile');
        }
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
