<?php

use App\Models\Property;
use Illuminate\Database\QueryException;

$name = 'Un beau chalet';
$description = 'Un beau chalet dans la montagne. Il y a une belle vue sur de vertes prairies';
$price = 10.5;
$capacity = 5;

test('property is created with correct attributes', function () use ($name, $description, $price, $capacity) {
    $property = Property::factory()->create([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'capacity' => $capacity,
    ]);

    expect($property->name)->toBe($name);
    expect($property->description)->toBe($description);
    expect(gettype($property->price))->toBe('string');
    expect($property->price)->toBe(number_format((float) $price, 2, '.', ''));
    expect(is_int($property->capacity))->toBeTrue();
    expect($property->capacity)->toBe($capacity);
    expect((bool) $property->validated)->toBeFalse();

});

/* Price is a negative number, price is a negative string */
test('property is created with incorrect attributes: price is negative (CHECK)', function () {
    expect(fn () => Property::factory()->create(['price' => -1]))
        ->toThrow(QueryException::class);
    expect(fn () => Property::factory()->create(['price' => '-10.50']))
        ->toThrow(QueryException::class);
});

/* Price is not a number */
test('property is created with incorrect attributes: price is not a number', function () {
    expect(fn () => Property::factory()->create(['price' => '1.01.0']))
        ->toThrow(QueryException::class);
    expect(fn () => Property::factory()->create(['price' => 'abc']))
        ->toThrow(QueryException::class);
});

/* Category is incorrect (type) */
test('property is created with incorrect attributes: category is not an int', function () {
    expect(fn () => Property::factory()->create(['category' => 1.5]))
        ->toThrow(QueryException::class);
    expect(fn () => Property::factory()->create(['category' => 'abc']))
        ->toThrow(QueryException::class);
});

/* Category is negative or 0 */
test('property is created with incorrect attributes: category is negative or 0(CHECK)', function () {
    expect(fn () => Property::factory()->create(['category' => -1]))
        ->toThrow(QueryException::class);
    expect(fn () => Property::factory()->create(['category' => 0]))
        ->toThrow(QueryException::class);
});
