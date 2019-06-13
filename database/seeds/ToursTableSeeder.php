<?php

use Illuminate\Database\Seeder;
use App\Tour;
use App\TourInclusion;
use Illuminate\Support\Facades\Schema;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tours = [
            [
                'tour_name'      => '3D/2N explore Donsol Tour Package',
                'tour_sub_title' => '3D2N | Swim with Whale Sharks | Firefly River Cruise | Sudsod Shrimp Catching',
                'rate'           => 3680,
                'inclusions'     => [
                    "3 days/ 2 nights Standard aircon Accommodations with private bathroom",
                    "Daily breakfast",
                    "1 day of Butanding/ Whale Shark Interaction (3 hours - Peak Season/ 4 to 5 hours - Regular )",
                    "private boat charter",
                    "Butanding Interaction Officer (BIO)",
                    "spotter",
                    "boat crew",
                    "life vests",
                    "Firefly River cruise (1 to 1.5 hours )",
                    "private boat charter",
                    "firefly tour guide",
                    "boat crew",
                    "Sudsod Shrimp Catching (1 to 1.5 hours )",
                    "private tour guide",
                    "local instructor",
                    "sudsod",
                    "towel",
                ],
            ],
            [
                'tour_name'      => '3D2N explore Puerto Princesa Tour Package',
                'tour_sub_title' => '3D2N | Underground River Tour',
                'rate'           => 3002,
                'inclusions'     => [
                    "3 days/ 2 nights Standard aircon room accommodation",
                    "Daily breakfast",
                    "Underground River tour",
                    "Private airconditioned van transfers from hotel",
                    "licensed tour guide",
                    "boat transfers",
                    "shed rental",
                    "buffet lunch",
                    "travel insurance",
                    "all entrance fees",
                    "Registration fees and permits",
                    "Licensed tour guide",
                    "Roundtrip transfers during tours (pickup and dropoff at hotel)",
                    "Roundtrip airport transfers (Puerto Princesa Airport - hotel - Puerto Princesa Airport)",
                ]
            ],
            [
                'tour_name'      => '3D2N explore Anawangin Tour Package',
                'tour_sub_title' => '3D2N | Island Hopping',
                'rate'           => 3063,
                'inclusions'     => [
                    "3 days/ 2 nights Standard aircon room accommodation at selected resort",
                    "Island hopping adventure: Anawangin Island, Capones Island and Camara Island",
                    "Day fees and permits at Anawangin island",
                    "Meals: (lunch during island hopping and breakfast on 2nd day and 3rd day)",
                ]
            ],
            [
                'tour_name'      => '4D3N explore Sagada Budget Tour Package',
                'tour_sub_title' => '4D3N | Town Tour | Sumaguing Cave Spelunking | Pongas Falls Trek | Bomod-ok Falls Trek',
                'rate'           => 2400,
                'inclusions'     => [
                    "4D/3N accommodation with private bathroom at George Guest House/ Sagada Guest House/ Canaway Resthouse Inn/Alibama Inn/ Indigenous Inn/ Residential Lodge/ Sagada Igorot Inn/ Traveler's Inn",
                    "Sagada Tour 1: Town tour - Echo Valley, Burial Caves, Hanging Coffins, Sagada Weaving, St. Mary's Episcopal Church",
                    "Sagada Tour 2: Sumaguing Cave Spelunking",
                    "Sagada Tour 3: Pongas Falls River Trek or Marlboro country",
                    "Sagada Tour 4: Bomod-ok Falls/ Bangaan Rice Terraces",
                    "Sagada Tour 5: Marlboro country",
                    "Kiltepan Rice Terraces sunrise viewing ( if weather and fog conditions permit)",
                    "Private Sagada tour guide",
                    "Private jeepney transfers (when needed)",
                    "All entrance permits and fees",
                ]
            ],
            [
                'tour_name'      => '4D/3N enjoy Boracay Package',
                'tour_sub_title' => '4D3N | Accommodation | Daily Breakfast | RT Transfers from-to Caticlan Airport',
                'rate'           => 4060,
                'inclusions'     => [
                    "4D/3N Standard Aircon Room Accommodation",
                    "daily breakfast",
                    "roundtrip airport transfers (Caticlan Airport - hotel - Caticlan Airport)",
                ]
            ],
            [
                'tour_name' => '2D/1N experience Baler Tour and Surfing Package – Budget',
                'tour_sub_title' => '2D1N | Surfing Lesson | Countryside Tour',
                'rate' => 984,
                'inclusions' => [
                    "2 days/ 1 night Standard aircon room accommodation",
                    "daily breakfast",
                    "1 session of surf lesson with surfboard rental",
                    "Countryside Tour: Digisit Beach, Ermita Hill, Dimutabo Falls and San Luis Falls",
                ]
            ]
        ];

        foreach($tours as $tour_solo) {
            $tour                 = new Tour;
            $tour->tour_name      = $tour_solo['tour_name'];
            $tour->tour_sub_title = $tour_solo['tour_sub_title'];
            $tour->rate           = $tour_solo['rate'];
            $tour->save();

            $inclusions = [];
            foreach($tour_solo['inclusions'] as $inc) {
                $inclusions[] = new TourInclusion([
                    'item' => $inc
                ]);
            }
            
            $tour->inclusions()->saveMany($inclusions);
        }
    }
}
