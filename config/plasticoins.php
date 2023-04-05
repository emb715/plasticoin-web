<?php

return [

    // Rewards that will be assigned.
    'rewards' => [

        // Home plastics rewards amount.
        'home' => env('PLASTICOINS_REWARDS_HOME', 100),

        // Beach plastics rewards amount.
        'beach' => env('PLASTICOINS_REWARDS_BEACH', 200),

        // Microplastics rewards amount.
        'micro_plastic' => env('PLASTICOINS_REWARDS_MICRO_PLASTIC', 400),
    ],
];
