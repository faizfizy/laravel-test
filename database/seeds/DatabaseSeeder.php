<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(VerificationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PaymentDetailsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }

}
