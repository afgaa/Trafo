<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrafoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        $trafoName = [
            'Trafo 1',
            'Trafo 2',
            'Trafo 3',
        ];

        foreach ($trafoName as $trafo) {
            $trafo = \App\Models\Trafo::create([
                'name' => $trafo
            ]);

            // create arus data 
            $trafo->arus()->create([
                // 'arus' => 2.5,
                'topic_name' => 'zmct',
            ]);

            // create suhu data
            $trafo->suhu()->create([
                // 'suhu' => 25,
                'topic_name' => 'tes',
            ]);

            // create tegangan data
            $trafo->tegangan()->create([
                // 'tegangan' => 220,
                'topic_name' => 'zmpt',
            ]);

            // create tekanan data
            $trafo->tekanan()->create([
                // 'tekanan' => 10,
                'topic_name' => 'tes',
            ]);
        };



    }
}
