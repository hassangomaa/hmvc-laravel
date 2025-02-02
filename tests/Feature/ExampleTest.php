<?php

it('returns a successful response', function () {
    $response = $this->get('/');
    $response->assertSee('Laravel');
    $response->assertStatus(200);
});
