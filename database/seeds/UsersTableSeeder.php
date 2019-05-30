<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function($user){
            factory(App\Models\Company::class, 1)->create([
                'user_id' => $user->id
            ])->each(function($company){
                factory(App\Models\Product::class)->create([
                    'company_id' => $company->id,
                ]);
                factory(App\Models\Review::class, rand(3,12))->create([
                    'company_id' => $company->id,
                ]);
            });
        });
    }
}
