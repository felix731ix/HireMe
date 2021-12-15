<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            'name' => 'Customizeable YoutTube',
            'category_id' => 1,
            'price' => 250000,
            'description' =>
                'You can easily customize your YouTube channel introductions or outros based on template provided once you finish transaction. This can be easily done using our "Design Your Packet feature.',
            'image' => 'product_img_storage/product1_1.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'Eiffel Tower Night Potrait',
            'category_id' => 1,
            'price' => 100000,
            'description' =>
                'Eiffel tower lit up in Paris France',
            'image' => 'product_img_storage/product1_2.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'NYC Panorama',
            'category_id' => 1,
            'price' => 100000,
            'description' =>
                'After a long flight from Europe, I woke up at around 3am local time and searched for what to do… I found a trail to hike from just north of Hollywood to the Griffith Observatory. An incredible experience as the sun rose over the city of millions.',
            'image' => 'product_img_storage/product1_3.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'Marimba Remix Ringtone',
            'category_id' => 2,
            'price' => 60000,
            'description' =>
                'Enjoy music from your favorite hits with a personalized ringtone. Instantly get remixes of your favorite radio pop hits and rap songs.',
            'image' => 'product_img_storage/product2_1.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'Tringtone',
            'category_id' => 2,
            'price' => 55000,
            'description' =>
                'Tringtone is the most affordable, high quality ringtone app on the market. It’s compatible with most Android and iPhone devices and has a library of over 100,000 songs, with many more available as in-app purchases.',
            'image' => 'product_img_storage/product2_2.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'Money Heist Wallpaper',
            'category_id' => 3,
            'price' => 650000,
            'description' =>
                'Money Heist Wallpaper is a fresh, cool and entertaining wallpapers pack with money and crime scenes. You will be given 64 HQ wallpapers with 5192x3848 resolution. You can enjoy these in your home or share them on social media platforms.',
            'image' => 'product_img_storage/product3_1.jpg'
        ]);

        \DB::table('products')->insert([
            'name' => 'Drone Video Footage',
            'category_id' => 4,
            'price' => 350000,
            'description' =>
                'Get an exclusive look from above at the san francisco bridge, the largest suspension bridge in the continental united states of america.',
            'image' => 'product_img_storage/product4_1.jpg'
        ]);

    }
}
