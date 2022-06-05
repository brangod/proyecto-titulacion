<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        \App\Models\User::create(
            [
                'name' => "Branthon",
                'email' => 'prueba@prueba.com',
                'boleta' => 2015020065,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678')
            ])->assignRole('Admin');
        
            \App\Models\User::create(
                [
                    'name' => "Estudiante",
                    'email' => 'p@p.com',
                    'boleta' => 2015020066,
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678')
                ])->assignRole('Student');
        
                \App\Models\User::create(
                    [
                        'name' => "Maestro",
                        'email' => 'm@prueba.com',
                        'boleta' => 2015020067,
                        'email_verified_at' => now(),
                        'password' => bcrypt('12345678')
                    ])->assignRole('Teacher');

        \App\Models\Tipo::create( ['nombre' => 'Material'] );
        \App\Models\Tipo::create( ['nombre' => 'Laboratorio'] );
        \App\Models\Categoria::create( ['nombre' => 'Multimetro'] );
        \App\Models\Categoria::create( ['nombre' => 'Osciloscopio'] );
        \App\Models\Categoria::create( ['nombre' => 'Lab de Circuitos 1'] );
        \App\Models\Categoria::create( ['nombre' => 'Lab de Mediciones'] );
        \App\Models\EstadoRecurso::create( ['nombre' => 'Disponible'] );
        \App\Models\EstadoRecurso::create( ['nombre' => 'Ocupado'] );
        \App\Models\EstadoSolicitud::create( ['nombre' => 'Solicitada'] );
        \App\Models\EstadoSolicitud::create( ['nombre' => 'Aceptada'] );
        \App\Models\EstadoSolicitud::create( ['nombre' => 'Rechazada'] );
        \App\Models\EstadoSolicitud::create( ['nombre' => 'Finalizada'] );
        \App\Models\EstadoSolicitud::create( ['nombre' => 'Cancelada'] );

        \App\Models\Recurso::create( 
            ['nombre' => 'Multimetro Fluke 2040',
            'descripcion' => 'Multimetro digital de alta presicion',
            'tipo_id' => 1,
            'categoria_id' => 1,
            'estado_recurso_id' => 1,
            ] 
        );

        \App\Models\Recurso::create( 
            ['nombre' => 'Lab 1',
            'descripcion' => 'Ubicado en el edificio Z3',
            'tipo_id' => 2,
            'categoria_id' => 3,
            'estado_recurso_id' => 1,
            ] 
        );

    }
}
