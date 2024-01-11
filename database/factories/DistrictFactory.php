<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\District>
 */
class DistrictFactory extends Factory
{
    protected $model = District::class;

    public function definition()
    {
        $divisionIds = Division::pluck('id')->toArray();

        return [
            'division_id' => $this->faker->randomElement($divisionIds),
            'name' => $this->faker->unique()->city,
        ];
    }
}
