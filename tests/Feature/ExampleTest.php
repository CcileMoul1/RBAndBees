<?php

test('returns a successful response', function () {
    $response = $this->get('/');
    
    dump('status', $response->status());    
    dump('location', $response->headers->get('Location'));

    $response->assertOk();
});
