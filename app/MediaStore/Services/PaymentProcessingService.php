<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 10/7/2014
 * Time: 2:56 PM
 */

namespace MediaStore\Services;


use Stripe;
use Stripe_Charge;

class PaymentProcessingService {


    public function __construct(){
        Stripe::setApiKey(\User::getStripeKey());
    }

    public function createStripPayment($amount,$currency,$card,$description){
        $data = [
            "amount" => $amount, // amount in cents, again
            "currency" => $currency,
            "card" =>$card,
            "description" => $description
        ];
        return $charge = Stripe_Charge::create($data);
    }

    public function getStripeJSKey() {
        if(\Config::getEnvironment() == 'production'){
            return 'pk_live_Td8t0YPRXx8fBpxhL9NfOjDb';
        }else{
            return 'pk_test_SZ0RjsZqGqvF3qKBOiWPF7Re';
        }
    }
} 