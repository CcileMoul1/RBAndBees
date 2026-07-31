<?php

test('returns a successful response', function () {
    $response = $this->get('/');
    
    echo "STATUS=" . $response->status() . PHP_EOL;

    $response->assertOk();
});
