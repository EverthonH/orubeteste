<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = array(
            'A' => array(
              'name' => 'Marcos José',
              'sex' => 'Masculino',
            ),
            'B' => array(
              'name' => 'Maria da Silva',
              'sex' => 'Feminino',
            ),
            'C' => array(
              'name' => 'João Carlos',
              'sex' => 'Masculino',
            ),
            'D' => array(
              'name' => 'Larissa Silva',
              'sex' => 'Feminino',
            ),
            'E' => array(
              'name' => 'Enzo Henrique',
              'sex' => 'Masculino',
            ),
            'F' => array(
              'name' => 'Patricia Maria',
              'sex' => 'Feminino',
            ),
            'G' => array(
              'name' => 'Pedro Barbosa',
              'sex' => 'Masculino',
            ),
            'H' => array(
              'name' => 'Cláudia Ramos',
              'sex' => 'Feminino',
            ),
            'I' => array(
              'name' => 'Henrique Da Paz',
              'sex' => 'Masculino',
            )
          );

        foreach($patients as $patient){
            Patient::factory(1)->create([
                'name'=> $patient['name'],
                'sex' => $patient['sex']     
            ]);
        }
    }
}
