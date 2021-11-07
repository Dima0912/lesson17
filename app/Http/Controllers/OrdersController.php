<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
    public function store(CreateOrderRequest $request, OrderRepositoryInterface $orderRepository)
    {
        try {
            $order = $orderRepository->create($request);

            Cart::instance('cart')->destroy();

            return redirect()->route('home');
        } catch (\Exception $exception) {
            dd($exception->getCode() . ' ' . $exception->getMessage());
        }
    }
}
