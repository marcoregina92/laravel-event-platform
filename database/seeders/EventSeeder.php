<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                "name" => "Evento 1",
                "description" => "Descrizione dell'evento 1",
                "city" => "Roma",
                "date" => "2024-02-05"
            ],
            [
                "name" => "Evento 2",
                "description" => "Descrizione dell'evento 1",
                "city" => "Milano",
                "date" => "2024-02-05"
            ],
            [
                "name" => "Evento 3",
                "description" => "Descrizione dell'evento 1",
                "city" => "Firenze",
                "date" => "2024-02-05"
            ],
        ];

        foreach ($events as $event) {
            $newEvent = new Event();
            $newEvent->fill($event);
            $newEvent->save();
        }
    }
}
