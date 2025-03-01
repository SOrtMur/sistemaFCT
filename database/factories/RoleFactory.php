<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [
            'admin'=>"Administrador del sistema",
            'teacher'=>"Profesor",
            'pupil'=>"Alumno",
            'tutor'=>"Tutor del alumno en la empresa",
         ];

        foreach ($roles as $role=>$description) {
            \App\Models\Rol::create([
                'name' => $role,
                'description' => $description,
            ]);
        }
    }
}
