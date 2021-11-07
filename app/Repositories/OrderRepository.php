<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderRepository implements OrderRepositoryInterface
{
    public function create(Request $request): Order
    {
        
    }
}