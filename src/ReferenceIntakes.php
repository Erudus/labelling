<?php

namespace Erudus\Labelling;

class ReferenceIntakes
{
    private static array $limits = [
        'biotin_b7_100' => 50,
        'cal_100_kj' => 8400,
        'cal_100_kcal' => 2000,
        'calcium_100' => 800,
        'carb_100' => 260,
        'chloride_100' => 800,
        'chromium_100' => 40,
        'copper_100' => 1,
        'fat_100' => 70,
        'folate_100' => 200,
        'fluoride_100' => 3.5,
        'iodine_100' => 150,
        'iron_100' => 14,
        'magnesium_100' => 375,
        'manganese_100' => 2,
        'molybdenum_100' => 50,
        'niacin_b3_100' => 16,
        'pantothenic_acid_100' => 6,
        'phosphorus_100' => 700,
        'potassium_100' => 2000,
        'protein_100' => 50,
        'riboflavin_b2_100' => 1.4,
        'salt_100' => 6,
        'sat_fat_100' => 20,
        'selenium_100' => 55,
        'sugar_carb_100' => 90,
        'thiamin_b1_100' => 1.1,
        'vitamin_a_100' => 800,
        'vitamin_b6_100' => 1.4,
        'vitamin_b12_100' => 2.5,
        'vitamin_c_100' => 80,
        'vitamin_d_100' => 5,
        'vitamin_e_100' => 12,
        'vitamin_k_100' => 75,
        'zinc_100' => 10,
    ];

    private static array $thresholds =
        [
            'drink' =>
                [
                    'fat_100' => [
                        'low' => 1.5,
                        'high' => 8.75
                    ],
                    'sat_fat_100' => [
                        'low' => 0.75,
                        'high' => 2.5
                    ],
                    'sugar_carb_100' => [
                        'low' => 2.5,
                        'high' => 11.25
                    ],
                    'salt_100' => [
                        'low' => 0.3,
                        'high' => 0.75
                    ]
                ],
            'food' =>
                [
                    'fat_100' => [
                        'low' => 3.0,
                        'high' => 17.5
                    ],
                    'sat_fat_100' => [
                        'low' => 1.5,
                        'high' => 5.0
                    ],
                    'sugar_carb_100' => [
                        'low' => 5.0,
                        'high' => 22.5
                    ],
                    'salt_100' => [
                        'low' => 0.3,
                        'high' => 1.5
                    ]
                ]
        ];

    public static function thresholds($isDrink = false)
    {
        if ($isDrink) {
            return self::$thresholds['drink'];
        }

        return self::$thresholds['food'];
    }

    public static function thresholdsForNutrient($nutrient, $isDrink = false)
    {
        $refIntake = self::thresholds($isDrink);

        if (!array_key_exists($nutrient, $refIntake)) {
            return null;
        }

        return $refIntake[$nutrient];
    }

    public static function limits()
    {
        return self::$limits;
    }

    public static function limitForNutrient($nutrient)
    {
        if (!array_key_exists($nutrient, self::$limits)) {
            return null;
        }
        return self::$limits[$nutrient];
    }
}