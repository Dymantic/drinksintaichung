<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */


$factory->define(\App\Establishments\Feature::class, function (Faker $faker) {
    $name = $faker->words(2, true);
    return [
        'label' => $name,
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67.4 79.7" height="30px">
    <path fill="#f05153"
          d="M41.08,74.7c-.12,0-.41,0-.88-.48C37.79,71.79,36.52,64,36,56.8H51.08a2.5,2.5,0,0,0,0-5H35.76c0-1.12,0-2.18,0-3.15a2.25,2.25,0,0,0,0-.36V36.8a4,4,0,0,0,.4,0h4.12a4.13,4.13,0,0,0,2.91-1.2,4.12,4.12,0,0,0,2.9,1.2h4.12a4.12,4.12,0,0,0,2.91-1.2A4.12,4.12,0,0,0,56,36.85h4.12a4.25,4.25,0,0,0,4.19-4.29V29.89c0-.26,0-.5,0-.76C64.18,16,51.13,4.51,35.7,3.37V2.5a2.5,2.5,0,0,0-5,0v.87C15.26,4.51,2.21,16,2.15,29.13c0,.25,0,.5,0,.76v2.66a4.25,4.25,0,0,0,4.19,4.29h4.11a4.14,4.14,0,0,0,2.91-1.2,4.13,4.13,0,0,0,2.91,1.2h4.11a4.14,4.14,0,0,0,2.91-1.2,4.14,4.14,0,0,0,2.91,1.2h4.11a4,4,0,0,0,.41,0V48.24a2.51,2.51,0,0,0,0,.41c0,1,0,2,0,3.15H15.31a2.5,2.5,0,0,0,0,5H30.39c-.51,7.2-1.79,15-4.2,17.42-.47.48-.76.48-.88.48a2.5,2.5,0,1,0,0,5H41.08a2.5,2.5,0,1,0,0-5ZM29.48,31.85H27a2.5,2.5,0,0,0-2.49-2.29H22.06a2.5,2.5,0,0,0-2.49,2.29H17a2.5,2.5,0,0,0-2.49-2.29H12.13a2.5,2.5,0,0,0-2.49,2.29H7.13v-2c0-.15,0-.29,0-.44s0-.15,0-.22c0-11.17,12.17-21,26.05-21s26,9.79,26,21c0,.07,0,.15,0,.22s0,.29,0,.44v2H56.76a2.5,2.5,0,0,0-2.49-2.29H51.84a2.5,2.5,0,0,0-2.49,2.29H46.83a2.5,2.5,0,0,0-2.49-2.29H41.91a2.5,2.5,0,0,0-2.49,2.29H36.9a2.5,2.5,0,0,0-2.49-2.29H32A2.5,2.5,0,0,0,29.48,31.85ZM31.82,74.7a23.34,23.34,0,0,0,1.38-3.64,23.25,23.25,0,0,0,1.38,3.64Z"/>
    <path fill="#f05153"
          d="M65.18,41.27a2.5,2.5,0,0,0-2.76,2.21L60.54,60.42h-11A2.5,2.5,0,0,0,47,62.79l-.71,14.29a2.5,2.5,0,0,0,5,.25l.59-11.91H60.4L61,77.33a2.5,2.5,0,0,0,2.5,2.38h.13A2.5,2.5,0,0,0,66,77.08L65.28,63l2.1-19A2.5,2.5,0,0,0,65.18,41.27Z"/>
    <path fill="#f05153"
          d="M17.88,60.42h-11L5,43.47A2.5,2.5,0,1,0,0,44l2.1,19-.7,14.09a2.5,2.5,0,0,0,5,.25L7,65.42H15.5l.59,11.91a2.5,2.5,0,0,0,2.5,2.38h.13a2.5,2.5,0,0,0,2.37-2.62l-.71-14.29A2.5,2.5,0,0,0,17.88,60.42Z"/>
</svg>'
    ];
});
