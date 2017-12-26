<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use JWTAuth;
use Input;

class AccountsController extends Controller
{
	private $currentUser;
	public function __construct(Request $request)
	{
		$this->currentUser = JWTAuth::toUser($request->token);
	}
    public function index(Request $request)
    {
        $accounts = $this->currentUser->account;
        if ($accounts) {
        	$status = 200;
        } else {
        	$status = 404;
        }
    	return response()->json([
        	'status'=> $status,
        	'data' => $accounts
        ]);
    }
    public function show(Request $request, $id)
    {
        $account = $this->currentUser->account()->find($id);
        if ($account) {
        	$status = 200;
        } else {
        	$status = 404;
        }
        return response()->json([
        	'status'=> $status,
        	'data' => $account
        ]);
    }
    public function save(Request $request)
    {
    	$account = $this->currentUser->account()->create(['email'=>$request->get('email'), 'password'=>$request->get('password')]);
    	return response()->json([
        	'status'=> 201,
        	'data' => $account
        ]);
    }

    public function update(Request $request, $id)
    {
    	$account = Account::find($id);
    	if (!$account)
        	$status = 404;
        else {
        	if ($this->currentUser->id == $account->user_id) {
                if ($request->get('email'))
                    $data['email'] =  $request->get('email');
                if ($request->get('password'))
                    $data['password'] =  $request->get('password');
	        	$account->update($data);
	        	$status = 200;
	        } else {
	        	$status = 401;
	        }
        }
        return response()->json([
        	'status'=> $status,
        	'data' => $account
        ]);
    }
    public function destroy(Request $request, $id)
    {
    	$account = Account::find($id);
    	if (!$account)
        	$status = 404;
        else {
        	if ($this->currentUser->id == $account->user_id) {
	        	$account->delete();
	        	$status = 200;
	        } else {
	        	$status = 401;
	        }
        }
        return response()->json([
        	'status'=> $status
        ]);
    }
}
