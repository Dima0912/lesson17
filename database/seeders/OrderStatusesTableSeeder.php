<?php
namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = Config::get('constants.db.order_status');
    
        if (is_array($statuses)) {
            foreach ($statuses as $key => $status) {
                OrderStatus::create(['name' => $status]);
            }
        }
    }
}
