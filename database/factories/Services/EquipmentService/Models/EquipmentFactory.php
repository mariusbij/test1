<?php

namespace Database\Factories\Services\EquipmentService\Models;

use App\Services\EquipmentService\Models\Category;
use App\Services\EquipmentService\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Services\EquipmentService\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    protected $model = Equipment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $side_countries = ['10','20'];

        return [
            'name' => fake()->word(),
            'geolocation' => json_encode(fake()->localCoordinates()),
            'side_country' => $side_countries[array_rand($side_countries)],
            'date' => fake()->date,
            'category_id' => Category::all()->random()->getAttribute('id'),
            'source_url' => 'https://twitter.com/UAWeapons/status/1581908407967092738',
            'approved' => true,
        ];
    }
}
