<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function getUserInfo(Request $request){
        return Auth::user();
    }
    public function showFormChangePassword()
    {
    	return view('auth.change_password');
    }
    public function changePassword(ChangePassword $request)
    {
    	$currentUser = Auth::user();
    	if (!(Hash::check($request->input('password-current'), $currentUser->password))) {
    		$message = '古いパスワードは正しくありません';
    		return redirect()->back()->with(compact('message'));
    	}
    	$currentUser->update(['password'=>bcrypt($request->input('password-new'))]);
    	return redirect()->route('accounts.index');
    }
}
