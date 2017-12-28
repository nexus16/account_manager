<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class DemoController extends Controller
{
    public function index(Request $request)
    {
        $accounts = Account::all()->toArray();
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
}
