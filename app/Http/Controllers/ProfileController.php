<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Cloudder;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Requests\PostAvatarSettingRequest;
use Desire2Learn\Http\Requests\ProfileSettingsFormRequest;

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
    public function updateProfileSettings(ProfileSettingsFormRequest $request)
    {
        $updateUser = User::where('id', Auth::user()->id)->update([
        	'username'   => $request->username,
        	'first_name' => $request->first_name,
        	'last_name'  => $request->last_name,
        	'email'      => $request->email,
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
    public function postAvatarSetting(PostAvatarSettingRequest $request)
    {
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
}
