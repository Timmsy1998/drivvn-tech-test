<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CarControllerTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * Set up the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        // Additional setup code that runs before each test method.
        Artisan::call('migrate'); // Run migrations
        Artisan::call('db:seed'); // Seed the database
    }

    /**
     * Tear down the test environment.
     */
    public function tearDown(): void
    {
        // Additional teardown code that runs after each test method.
        Artisan::call('migrate:reset'); // Roll back migrations

        parent::tearDown();
    }

    /**
     * Test adding a new car.
     */
    public function testAddCar()
    {
        // Simulate a POST request to add a new car with specific data
        $response = $this->json('POST', '/api/cars', [
            'make' => 'Ford',
            'model' => 'Mustang',
            'build_date' => '2023-03-01',
            'colour_id' => 2,
        ]);

        // Assert that the response status is 201 (Created)
        // and the response JSON message indicates successful car addition.
        $response->assertStatus(201)
            ->assertJson(['message' => 'Car added successfully']);
    }

    /**
     * Test retrieving a specific car by ID.
     */
    public function testShowCar()
    {
        // Simulate a GET request to retrieve a specific car by ID
        $response = $this->json('GET', '/api/cars/1');

        // Assert that the response status is 200 (OK)
        // and the response JSON structure matches the expected format.
        $response->assertStatus(200)
            ->assertJsonStructure(['car' => ['id', 'make', 'model', 'build_date', 'colour_id']]);
    }

    /**
     * Test retrieving a car that doesn't exist by ID.
     */
    public function testShowCarNotFound()
    {
        // Simulate a GET request to retrieve a non-existent car by ID
        $response = $this->json('GET', '/api/cars/999');

        // Assert that the response status is 404 (Not Found)
        // and the response JSON message matches the expected "Car not found" message.
        $response->assertStatus(404)
            ->assertJson(['message' => 'Car not found']);
    }

    /**
     * Test deleting a car that doesn't exist by ID.
     */
    public function testDeleteCarNotFound()
    {
        // Simulate a DELETE request to delete a non-existent car by ID
        $response = $this->json('DELETE', '/api/cars/999');

        // Assert that the response status is 404 (Not Found)
        // and the response JSON message matches the expected "Car not found" message.
        $response->assertStatus(404)
            ->assertJson(['message' => 'Car not found']);
    }

    /**
     * Test listing all cars.
     */
    public function testListCars()
    {
        // Simulate a GET request to list all cars
        $response = $this->json('GET', '/api/cars');

        // Assert that the response status is 200 (OK)
        // and the response JSON structure matches the expected format.
        $response->assertStatus(200)
            ->assertJsonStructure(['cars']);
    }

    /**
     * Test updating an existing car.
     */
    public function testUpdateCar()
    {
        // Simulate a PUT request to update an existing car by ID
        $response = $this->json('PUT', '/api/cars/1', [
            'make' => 'Ford',
            'model' => 'Mustang',
            'build_date' => '2023-03-01',
            'colour_id' => 2,
        ]);

        // Assert that the response status is 200 (OK)
        // and the response JSON message indicates successful update.
        $response->assertStatus(200)
            ->assertJson(['message' => 'Car updated successfully']);
    }

    /**
     * Test deleting a car by ID.
     */
    public function testDeleteCar()
    {
        // Simulate a DELETE request to delete a specific car by ID
        $response = $this->json('DELETE', '/api/cars/1');

        // Assert that the response status is 200 (OK)
        // and the response JSON message indicates successful deletion.
        $response->assertStatus(200)
            ->assertJson(['message' => 'Car deleted successfully']);
    }

    /**
     * Test updating a car that doesn't exist by ID.
     */
    public function testUpdateCarNotFound()
    {
        // Simulate a PUT request to update a non-existent car by ID
        $response = $this->json('PUT', '/api/cars/999', [
            'make' => 'Ford',
            'model' => 'Mustang',
            'build_date' => '2023-03-01',
            'colour_id' => 2,
        ]);

        // Assert that the response status is 404 (Not Found)
        // and the response JSON message matches the expected "Car not found" message.
        $response->assertStatus(404)
            ->assertJson(['message' => 'Car not found']);
    }

    /**
     * Test adding a car with an invalid build date.
     */
    public function testAddCarWithInvalidBuildDate()
    {
        // Simulate a POST request to add a new car with an invalid build date (more than four years ago)
        $response = $this->json('POST', '/api/cars', [
            'make' => 'OldCarMaker',
            'model' => 'AncientModel',
            'build_date' => now()->subYears(5)->toDateString(),
            'colour_id' => 1,
        ]);

        // Assert that the response status is 422 (Unprocessable Entity) due to validation failure
        // and that the response JSON message indicates a validation error.
        $response->assertStatus(422)
            ->assertJsonValidationErrors('build_date');
    }
}
