<?php

use App\Models\Property;

$name = "Un beau chalet";
$description = "Un beau chalet dans la montagne. Il y a une belle vue sur de vertes prairies";
$price = 10.5;
$capacity = 5;
$price_wrong = "10.500";

test('property is created with correct attributes', function () use($name, $description, $price, $capacity) {
    $property = Property::factory()->create([
    	"name" => $name,
    	"description" => $description,
    	"price" => $price,
    	"capacity" => $capacity,
		]);
		
	expect($property->name)->toBe($name);
	expect($property->description)->toBe($description);
	expect(gettype($property->price))->toBe('string');
	expect($property->price)->toBe(number_format((float) $price, 2, '.', ''));
	expect(is_int($property->capacity))->toBeTrue();
	expect($property->capacity)->toBe($capacity);
	expect((bool)$property->validated)->toBeFalse();
	
});

test('property is created with incorrect attributes: price', function () use($name, $description, $price_wrong, $capacity) {
    $property = Property::factory()->create([
    	"name" => $name,
    	"description" => $description,
    	"price" => $price_wrong,
    	"capacity" => $capacity,
		]);
	
});
