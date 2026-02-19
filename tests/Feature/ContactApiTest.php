<?php

use App\Models\Contact;

it('returns a list of contacts', function () {
    $response = $this->get('/api/v1/contacts');
    $response->assertStatus(200);
    $response->assertJsonStructure([
       '*' => [
           'id',
           'given_name',
           'family_name',
           'nickname',
           'title'
       ],
    ]);
});

it('returns a single contacts', function () {
    $response = $this->get('/api/v1/contacts/1');
    $response->assertStatus(200);
    $response->assertJsonStructure(
        ['id', 'given_name', 'family_name', 'nickname', 'title']
    );
});

it('returns a newly created contact', function () {
    $attributes = Contact::factory()->raw();
    $response = $this->post('/api/v1/contacts', $attributes);
    $response->assertStatus(201)
        ->assertJsonStructure(
            [
                'id',
                'given_name',
                'family_name',
                'nickname',
                'title'
            ],
        );
    $this->assertDatabaseHas('contacts', $attributes);
});

it('returns create contact error when missing given name', function () {
    $response = $this->post('/api/v1/contacts', [
        'family_name' => 'test',
        'nickname' => 'test',
        'title' => 'test',
    ]);
    $response->assertStatus(302);
});

it('returns an updated contact', function () {
    $attributes = [
        'given_name' => 'test',
        'family_name' => 'test',
        'nickname' => 'test',
        'title' => 'test',
    ];
    $response = $this->put('/api/v1/contacts/1', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('contacts', $attributes);
});

it('returns a deleted contact', function () {

});
