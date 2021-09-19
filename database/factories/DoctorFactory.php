<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $states = [
            'AC','AL','AP','AM','BA','CE','DF','ES','GO',
            'MA','MT','MS','MG','PA','PB','PR','PE','PI',
            'RJ','RN','RS','RO','RR','SC','SP','SE','TO',
        ];

        return [
            'name' => $this->faker->name(),
            'cpf'=>$this->faker->unique()->cpf(),
            'crm' => $this->faker->numerify('##########/' . $states[array_rand($states)]),
            'birth'=>$this->faker->date(),
            'cell_phone'=>$this->faker->cellphoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
