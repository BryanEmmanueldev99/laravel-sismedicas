<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //para numeros podria ir asi "no.seguro social" => Str::random(10); me genera un numeraciones de 10 digitos o tambien  "no.seguro social" => $this->faker->unique()->numerify('#######'),
            'nombre_paciente' => $this->faker->name,
            'apellidos_paciente' => $this->faker->lastName,
            'fecha_nacimiento_paciente' => $this->faker->date('y-m-d','2024-07-26'),
            'genero_paciente' => $this->faker->randomElement(['Masculino','Femenino']),
            'celular_paciente' => $this->faker->phoneNumber,
            'correo_paciente' => $this->faker->unique()->safeEmail,
            'dirrecion_paciente' => $this->faker->address,
            'peso_paciente' => $this->faker->numerify('##'),
            'alergias_paciente' => $this->faker->optional()->words(5, true),
            'observaciones_paciente' => $this->faker->optional()->words(5, true),
        ];
    }
}
