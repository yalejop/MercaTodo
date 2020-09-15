<?php

use App\Cart;
use App\User;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(PermissionInfoSeeder::class);
        $this->call(CategoriasSeeder::class);

        $users = factory(User::class, 20)->create();

        $orders = factory(Order::class, 10)
            ->make()
            ->each(function ($order) use ($users) {
                $order->user_id = $users->random()->id;
                $order->save();

                $payment = factory(Payment::class)->make();
                // $payment->order_id = $order->id;
                // $payment->save();
                $order->payment()->save($payment);
            });

            $carts = factory(Cart::class, 20)->create();

            $products = factory(Product::class, 50)
                ->create()
                ->each(function ($product) use ($orders, $carts) {
                    $order = $orders->random();
    
                    $order->products()->attach([
                        $product->id => ['quantity' => mt_rand(1, 3)],
                    ]);
    
                    $cart = $carts->random();
    
                    $cart->products()->attach([
                        $product->id => ['quantity' => mt_rand(1, 5)],
                    ]);
                });
    }
}
