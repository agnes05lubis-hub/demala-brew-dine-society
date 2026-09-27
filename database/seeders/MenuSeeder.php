<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $data = require database_path('data/menu_data.php');

        Menu::truncate(); // hapus menu contoh lama

        $order = 1;

        foreach ($data as $categoryKey => $category) {
            foreach ($category['groups'] as $groupName => $group) {
                foreach ($group['items'] as $item) {

                    $price = $item['price'] ?? 0;

                    // Sebagian harga ditulis ribuan (30), sebagian penuh (45000).
                    if ($price < 1000) {
                        $price *= 1000;
                    }

                    Menu::create([
                        'name'         => $item['name'],
                        'description'  => $item['desc'] ?? null,
                        'price'        => $price,
                        'category'     => $categoryKey === 'food' ? 'Food' : 'Drink',
                        'group_name'   => $groupName,
                        'group_image'  => $group['image'] ?? null,
                        'group_note'   => $group['note'] ?? null,
                        'image'        => null,
                        'is_available' => true,
                        'sort_order'   => $order++,
                    ]);
                }
            }
        }
    }
}