<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use Auth;
use Input;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
        $accounts = Auth::user()->account;
    	return view('accounts.index', compact('accounts'));
    }
    public function edit($id)
    {
        $account = Account::find($id);
        $returnHTML = view('accounts.edit', compact('account'))->render();
        return response()->json(array('success' => true, 'view'=>$returnHTML));
    }
    public function save(Request $request)
    {
    	$account = Auth::user()->account()->create(['email'=>$request->get('email'), 'password'=>$request->get('password')]);
        $returnHTML = view('accounts.item', compact('account'))->render();
        return redirect()->route('accounts.index');
    }

    public function update(Request $request, $id)
    {
    	$account = Account::find($id);
        if (Auth::id() == $account->user_id) {
            if ($request->get('email'))
                $data['email'] =  $request->get('email');
            if ($request->get('password'))
                $data['password'] =  $request->get('password');
            $data= $account->update($data);
        }
        return redirect()->route('accounts.index');
    }
    public function destroy(Request $request, $id)
    {
    	$account = Account::find($id);
    	if (Auth::id() == $account->user_id) {
	        $account->delete();
        }
        return redirect()->route('accounts.index');
    }
}
