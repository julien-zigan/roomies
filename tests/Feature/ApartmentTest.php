<?php

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('that every apartment has two or more rooms', function () {
    $this->seed();

    $apartments = Apartment::with('rooms')->get();

    foreach ($apartments as $apartment) {
        expect($apartment->rooms->count())
            ->toBeGreaterThanOrEqual(2);
    }
});


test('that appartment has one main tenant that occupies a room in the apartment', function () {
    $this->seed();

    $apartments = Apartment::with(['rooms', 'mainTenant'])->get();

    foreach ($apartments as $apartment) {
        $mainTenantId = $apartment->main_tenant_id;

        expect($mainTenantId)->not->toBeNull();

        $tenant = User::find($mainTenantId);
        expect($tenant)->not->toBeNull();

        expect($tenant->room_id)->not->toBeNull();

        $room = $apartment->rooms->where('id', $tenant->room_id)->first();
        expect($room)->not->toBeNull();
    }
});

test('that existing rooms match number of rooms for apartment', function () {
    $this->seed(); // Optional: only if your test DB needs seeding

    $apartments = \App\Models\Apartment::withCount('rooms')->get();

    foreach ($apartments as $apartment) {
        expect($apartment->rooms_count)
            ->toBe($apartment->num_of_rooms);
    }
});

