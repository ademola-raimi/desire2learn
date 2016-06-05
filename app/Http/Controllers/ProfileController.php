<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Hash;
use Alert;
use Cloudder;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class ProfileController extends Controller
{
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

            Alert::success('You have successfully updated your profile', 'Success');

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
            'avatar' => 'required|image|max:10240',
        ]);

        $img = $request->file('avatar');
        
        Cloudder::upload($img, null);
        $imgurl = Cloudder::getResult()['url'];

        User::find(Auth::user()->id)->updateAvatar($imgurl);

        if ($imgurl) {
            alert()->success('Avatar updated successfully', 'Success');

            return redirect()->route('edit-profile');
        } else {
            alert()->error('Something went wrong', 'Error');

            return redirect()->route('edit-profile');
        }
    }

    /**
     *  get change password page
     */
    public function getChangePassword()
    {
        $users = Auth::user();

        return view('dashboard.profile.changepassword', compact('users'));
    }

    /**
     *  Post change password request.
     */
    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword'    => 'required|min:6',
        ]);

        $user = Auth::user();

        // Compare old password
        if (!Hash::check($request->oldPassword, $user->password)) {
            alert()->error('Old password incorrect', 'error');

            return redirect()->back();
        }

        // Update current password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        alert()->success('Password successfully updated', 'success');

        return redirect()->route('index');
    }
}
