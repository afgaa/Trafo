<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrafoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voida
     */
    public function run()
    {
        //  $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        $trafoName = [
            'Trafo 1',
            'Trafo 2',
        ];

        foreach ($trafoName as $trafo) {
            $trafo = \App\Models\Trafo::create([
                'name' => $trafo
            ]);

            // $table->string('topic_name_r');
            // $table->string('topic_name_s');
            // $table->string('topic_name_t');
            // create arus data 
            $trafo->arus()->create([
                // 'arus' => 2.5,
                'topic_name_r' => 'zmct',
                'topic_name_s' => 'zmpt',
                'topic_name_t' => 'dmcr1',
            ]);

            // create suhu data
            $trafo->suhu()->create([
                // 'suhu' => 25,
                'topic_name' => 'tes',
            ]);

            // create tegangan data
            $trafo->tegangan()->create([
                // 'tegangan' => 220,
                'topic_name_r' => 'zmct',
                'topic_name_s' => 'zmpt',
                'topic_name_t' => 'dmcr1',
            ]);

            // create tekanan data
            $trafo->tekanan()->create([
                // 'tekanan' => 10,
                'topic_name' => 'tes',
            ]);
        };



    }
}
