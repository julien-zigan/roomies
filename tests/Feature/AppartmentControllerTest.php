<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns jsons including only public data', function () {
    $this->seed();

    $response = $this->get('/api/v1/apartments');
    $response->assertOk();

    $json = $response->json();
    expect($json)->toHaveKey('data')
        ->and($json['data'][0])->toHaveKeys([
            'name',
            'postalCode',
            'city',
            'description',
            'mixedGender',
            'petsAllowed',
            'squareMeters',
            'numOfRooms',
            'seekingRoomie',
            'seekingUpdatedAt'
            ])
        ->not->toHaveKeys(['id','street', 'houseNumber', 'createdAt', 'updatedAt']);


});

