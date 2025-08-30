<?php

it('has repositories/movierepository page', function () {
    $response = $this->get('/repositories/movierepository');

    $response->assertStatus(200);
});
