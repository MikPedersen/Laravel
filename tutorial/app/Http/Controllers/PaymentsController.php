<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {

        ProductPurchased::dispatch('toy');
//        event(new ProductPurchased('toy'));


        //gamle opgaver
        //request()->user()->notify(new PaymentReceived(900));
        //Notification::send(request()->user(), new PaymentReceived());
    }
}
