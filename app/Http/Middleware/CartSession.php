<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Cart;

class CartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // セッションにカートIDがあるかの確認
        if(!Session::has('cart')){
            $cart = Cart::create();
            Session::put('cart',$cart->id);
        }
        return $next($request); //これの前後どちらかに書くかでbeforemiddleware,aftermiddlewareかを書き分けることができる
    }
}
