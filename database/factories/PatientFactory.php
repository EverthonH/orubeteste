<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf'=>$this->faker->unique()->cpf(),
            'birth'=>$this->faker->date(),
            'height'=>$this->faker->randomFloat(2, 120, 200),
            'cell_phone'=>$this->faker->cellphoneNumber(),
            'health_insurance'=>$this->faker->randomElement(['Unimed', 'Hapvida', 'Não possui']),
            'weight'=>$this->faker->randomFloat(2, 40000, 200000),
            'blood_type'=>$this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'comment'=>$this->faker->sentence(),
        ];
    }
}
