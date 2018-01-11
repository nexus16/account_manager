<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\User;
use JWTAuth;
use Input;

class AccountsController extends Controller
{
	private $currentUser;
	public function __construct(Request $request)
	{
        $this->middleware('jwt.auth');
	}
    public function index(Request $request)
    {
        $accounts = JWTAuth::toUser($request->token)->account;
        if ($accounts) {
        	$status = true;
        } else {
        	$status = false;
        }
    	return response()->json([
        	'status'=> $status,
        	'data' => $accounts
        ]);
    }
    public function show(Request $request, $id)
    {
        $account = JWTAuth::toUser($request->token)->account()->find($id);
        if ($account) {
        	$status = true;
        } else {
        	$status = false;
        }
        return response()->json([
        	'status'=> $status,
        	'data' => $account
        ]);
    }
    public function save(Request $request)
    {
        if ($request->get('email') == '') {
            return response()->json([
                'status'=> false,
                'data' => "email_required"
            ]);
        }
        if ($request->get('password') == '') {
            return response()->json([
                'status'=> false,
                'data' => "password_required"
            ]);
        }
    	$account = JWTAuth::toUser($request->token)->account()->create(['email'=>$request->get('email'), 'password'=>$request->get('password')]);
        $accountInfo = JWTAuth::toUser($request->token)->account()->find($account->id);
    	return response()->json([
        	'status'=> true,
        	'data' => $accountInfo
        ]);
    }

    public function update(Request $request, $id)
    {
    	$account = JWTAuth::toUser($request->token)->account()->find($id);
    	if (!$account) {
        	$status = false;
            return response()->json([
                'status'=> $status,
            ]);
        } else {
            if ($request->get('email'))
                $data['email'] =  $request->get('email');
            if ($request->get('password'))
                $data['password'] =  $request->get('password');
        	$account->update($data);
	        return response()->json([
                'status'=> true,
                'data' => $account
            ]);
        }
        
    }
    public function destroy(Request $request, $id)
    {
    	$account = JWTAuth::toUser($request->token)->account()->find($id);
    	if (!$account)
        	$status = false;
        else {
        	$account->delete();
        	$status = true;
        }
        return response()->json([
        	'status'=> $status
        ]);
    }
}
