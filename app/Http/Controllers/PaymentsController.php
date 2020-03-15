<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;

class PaymentsController extends Controller
{
    public function make(Request $request) {
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];

    $status = Braintree_Transaction::sale([
	'amount' => '10.00',
	'paymentMethodNonce' => $nonce,
    'customer' => [
        'firstName'=> 'Cesare',
        'lastName'=> 'Augusto',
        'email'=> 'cesare@augusto.com'
    ],
	'options' => [
	    'submitForSettlement' => True
	]
    ]);

    $response = response()->json($status);
    }
}
