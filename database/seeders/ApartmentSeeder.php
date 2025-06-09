<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()
            ->count(1000)
            ->create()
            ->shuffle();

        $userIndex = 0;

        Apartment::factory()
            ->count(30)
            ->create()
            ->each(function ($apartment) use (&$userIndex, $users) {
                $num_of_rooms = rand(2, 6);
                $apartment->num_of_rooms = $num_of_rooms;
                $apartment->save();

                $rooms = Room::factory()
                    ->count($num_of_rooms)
                    ->create(['apartment_id' => $apartment->id]);

                $mainTenant = $users[$userIndex];
                $userIndex++;

                $apartment->main_tenant_id = $mainTenant->id;
                $apartment->save();

                $mainTenant->room_id = $rooms->random()->id;
                $mainTenant->save();

                $maxTenants = rand(2, 10);
                for ($i = 0; $i < $maxTenants; $i++) {
                    if (!isset($users[$userIndex])) break;

                    $user = $users[$userIndex];
                    $userIndex++;

                    if (rand(0,100) <= 40) {
                        $user->room_id = $rooms->random()->id;
                    } else {
                        $user->room_id = null; // no room
                    }
                    $user->save();
                }
            });
    }
}
