<?php

/**
 * Data menu Demala Brew & Dine Society.
 * Dibaca oleh database/seeders/MenuSeeder.php
 * Harga boleh ditulis ribuan (30) atau penuh (30000); seeder menyamakannya.
 */

return [

    'food' => [
        'groups' => [

            'Salad Series' => [
                'image' => 'salad-series.jpg',
                'items' => [
                    ['name' => 'Imperial Vietnamese Salad', 'desc' => 'Sayuran organik segar, disiram saus Vietnamese dressing asam manis yang autentik dan menyegarkan.', 'price' => 30],
                    ['name' => 'Bangkok Zesty Salad', 'desc' => 'Sayuran organik segar, disiram saus rempah ala Thai yang menghadirkan rasa pedas, manis, dan segar.', 'price' => 35],
                    ['name' => "Demala's Classic Caesar Salad", 'desc' => 'Sayuran organik segar, roti panggang renyah, dan taburan keju parmesan, disajikan dengan saus Caesar yang lembut kaya rasa.', 'price' => 35],
                ],
            ],

            'Light Bites & Fritters' => [
                'image' => 'light-bites-fritters.jpg',
                'items' => [
                    ['name' => 'Butter Crispy Cassava', 'desc' => 'Singkong lembut di dalam dan renyah di luar, disajikan dengan saus cocolan spesial Demala.', 'price' => 22],
                    ['name' => 'Shoestring Fries', 'desc' => 'Kentang goreng krispi yang diinfusi aroma truffle oil, disajikan dengan saus cocolan.', 'price' => 25],
                    ['name' => 'Spring Roll', 'desc' => 'Lumpia garing dengan isian daging ayam cincang dan sayuran segar, disajikan dengan saus cocolan.', 'price' => 28],
                    ['name' => 'Chicken Popcorn Bites', 'desc' => 'Potongan fillet dada ayam digoreng renyah dengan bumbu khas Demala, menghasilan tekstur crispy.', 'price' => 30],
                    ['name' => 'Bangkok Chicken Wings', 'desc' => 'Sayap ayam renyah yang dengan bumbu saus Bangkok ala Thailand, memberikan keseimbangan rasa manis, pedas dan gurih yang meresap.', 'price' => 30],
                    ['name' => 'Golden Prawn Money Bag', 'desc' => 'Pangsit renyah dengan isian cincangan udang, ayam, dan sayuran segar pilihan.', 'price' => 32],
                    ['name' => 'The Society Companion Platter', 'desc' => 'Kombinasi dari Butter Crispy Cassava, Shoestring Fries, Bangkok Chicken Wings, Crispy Tofu Chilli & Salt, dan Crispy Cassava Tape.', 'price' => 110],
                ],
            ],

            'The Heritage Bites' => [
                'image' => 'heritage-bites.jpg',
                'items' => [
                    ['name' => 'Sweet Corn Heritage Fritters', 'desc' => 'Bakwan jagung manis tradisional bertekstur renyah dengan aroma daun jeruk yang segar, dan menggoda.', 'price' => 25],
                    ['name' => 'Crispy Tofu Chilli & Salt', 'desc' => 'Tahu lembut krispi, ditumis dengan bawang putih, potongan cabai, dan garam premium.', 'price' => 25],
                    ['name' => "Demala's Crispy Tempeh", 'desc' => 'Tempe pilihan yang dimarinasi bumbu tradisional, digoreng renyah garing khas Demala.', 'price' => 28],
                    ['name' => 'Sweet Cassava Tape & Cheese Crisp', 'desc' => 'Tape singkong manis digoreng krispi, disajikan dengan parutan keju cheddar dan susu kental manis.', 'price' => 28],
                    ['name' => 'Special Stuffed Tofu', 'desc' => 'Tahu dengan isian tumis sayuran segar dan daging cincang yang melimpah, digoreng garing keemasan.', 'price' => 35],
                ],
            ],

            'The Grill & Premium Cuts' => [
                'image' => 'flame-menu.jpeg',
                'items' => [
                    ['name' => 'Flame-Grilled Chicken Supreme', 'desc' => 'Fillet dada ayam yang dipanggang tender dan juicy, disajikan dengan kentang goreng renyah, tumis sayuran segar, dan saus artisan pilihan.', 'price' => 80],
                    ['name' => 'Premium Black Angus Sirloin Steak', 'desc' => 'Daging sapi sirloin pilihan yang dipanggang sempurna sesuai selera Anda, disajikan bersama kentang goreng, kombinasi sayuran, dan saus khas.', 'price' => 180],
                    ['name' => 'Pan-Seared Norwegian Salmon', 'desc' => 'Fillet ikan Salmon yang dipanggang dengan kulit krispi, disajikan dengan kentang goreng dan saus khas Demala.', 'price' => 180],
                ],
                'note' => 'Signature Sauces: House Black Pepper / Creamy Mushroom / Smoky BBQ / Infused Garlic Butter',
            ],

            'Artisanal Pasta Series' => [
                'image' => 'artisanal-pasta-series.jpg',
                'items' => [
                    ['name' => 'Classic Creamy Carbonara', 'desc' => 'Spaghetti dimasak dalam saus krim kuning telur dan parmesan, disajikan dengan irisan smoked beef dan taburan keju.', 'price' => 30],
                    ['name' => 'Spicy Tuna Verde Spaghetti', 'desc' => 'Spaghetti dengan suwiran daging tuna, ditumis dengan saus cabai hijau aromatik yang memberikan sensasi pedas menyegarkan.', 'price' => 30],
                    ['name' => 'Seafood Aglio E Olio', 'desc' => 'Spaghetti ditumis dengan minyak zaitun, bawang putih cincang, cabai kering, dan dipadukan dengan hidangan udang dan cumi.', 'price' => 35],
                ],
            ],

            'Heritage Fried Rice' => [
                'image' => 'heritage-fried-rice.jpg',
                'items' => [
                    ['name' => 'Heritage Kampung Fried Rice', 'desc' => 'Nasi goreng otentik yang dimasak dengan teknik api besar (wok-hei), dipadukan dengan teri medan, ayam suwir, telur, kerupuk, dan acar segar.', 'price' => 30],
                    ['name' => 'The Society Seafood Fried Rice', 'desc' => 'Nasi goreng dengan potongan udang dan cumi segar, dimasak dengan bumbu oriental, telur orak-arik, dan kerupuk renyah.', 'price' => 40],
                    ['name' => 'Demala Signature Royal Fried Rice', 'desc' => 'Nasi goreng khas Demala yang dimasak dengan bumbu rempah, disajikan dengan ayam rempah gurih, telur premium, dan kerupuk.', 'price' => 55],
                ],
            ],

            'Wok-Crafted Noodles' => [
                'image' => 'wok-crafted-noodles.jpg',
                'items' => [
                    ['name' => 'Seafood Braised Noodles', 'desc' => 'Mie dimasak dengan udang, cumi, dan sayuran hijau. Tersedia pilihan digoreng kering atau kuah.', 'price' => 30],
                    ['name' => 'Seafood Rice Vermicelli', 'desc' => 'Bihun ditumis dengan aneka hidangan laut, bumbu oriental, dan sayuran. Tersedia pilihan digoreng kering atau kuah.', 'price' => 30],
                    ['name' => 'Signature Seafood Flat Noodles', 'desc' => 'Kwetiau ditumis lezat khas Demala dengan bumbu kecap dan seafood segar. Tersedia pilihan digoreng kering atau kuah.', 'price' => 32],
                    ['name' => 'Crispy Cantonese Ifumie', 'desc' => 'Ifu mie goreng yang ditumis dengan kuah kental gurih oriental berisikan sayuran segar dan seafood.', 'price' => 35],
                    ['name' => 'The Binjai Heritage Sweet & Sour Ifumie', 'desc' => 'Ifu mie goreng yang disiram saus asam manis, berpadu dengan seafood melimpah dan paprika.', 'price' => 45],
                ],
            ],

            'Gourmet Soups' => [
                'image' => 'gourmet-soups.jpg',
                'items' => [
                    ['name' => 'Imperial Asparagus Soup', 'desc' => 'Sup asparagus dengan suwiran ayam, telur, dan sentuhan minyak wijen oriental yang wangi.', 'price' => 26],
                    ['name' => 'Hot & Sour Seafood Soup', 'desc' => 'Sup kental dengan rasa pedas dan asam, diisi dengan potongan seafood dan sayuran.', 'price' => 28],
                    ['name' => 'Consommé Chicken Soup', 'desc' => 'Sup kaldu ayam yang disajikan dengan fillet ayam lembut dan potongan sayuran.', 'price' => 35],
                    ['name' => 'Royal Seafood Tom Yum', 'desc' => 'Sup rempah Thailand dengan rasa segar asam pedas, disajikan bersama udang besar, cumi, dan kerang.', 'price' => 40],
                    ['name' => 'Demala Signature Heritage Oxtail & Rib Soup', 'desc' => 'Iga sapi premium disajikan dalam kuah kaldu rempah dengan wortel, kentang, sambal hijau, dan emping.', 'price' => 80],
                ],
                'note' => 'Pilihan Metode Penyajian khusus demala signature heritage oxtail & rib soup Iga: Rebus,Bakar dan goreng',
            ],

            'Organic Garden Selections' => [
                'image' => 'organic-garden-selections.jpg',
                'items' => [
                    ['name' => 'Claypot Seafood Sapo Tofu', 'desc' => 'Tahu Jepang lembut, seafood, dan sayuran organik dimasak dalam claypot.', 'price' => 45000],
                    ['name' => 'Wok-Tossed Imperial Capcay (Chicken)', 'desc' => 'Tumisan aneka sayur segar dengan ayam dan teknik api besar (wok-hei).', 'price' => 32000],
                    ['name' => 'Wok-Tossed Imperial Capcay (Seafood)', 'desc' => 'Tumisan aneka sayur segar dengan seafood dan teknik api besar (wok-hei).', 'price' => 40000],
                    ['name' => 'Green Beans with Ebi', 'desc' => 'Buncis garing ditumis krispi dengan udang kering premium.', 'price' => 25000],
                    ['name' => 'Broccoli Garlic (Original)', 'desc' => 'Brokoli segar ditumis minyak wijen dan taburan bawang putih.', 'price' => 35000],
                    ['name' => 'Broccoli Garlic (Seafood)', 'desc' => 'Brokoli segar ditumis minyak wijen, seafood, dan taburan bawang putih.', 'price' => 40000],
                    ['name' => 'Spinach with Shrimp Paste', 'desc' => 'Kangkung segar ditumis dengan terasi udang bakar.', 'price' => 25000],
                ],
            ],

            'The Nusantara Crisp & Spice' => [
                'image' => 'nusantara-crisp-spice.jpg',
                'items' => [
                    ['name' => 'Grilled Chicken', 'desc' => 'Ayam bakar berbalut bumbu manis gurih, lengkap dengan nasi putih, lalapan, tahu-tempe, dan sambal.', 'price' => 45],
                    ['name' => 'Crispy Golden Chicken', 'desc' => 'Ayam kremes renyah lengkap dengan nasi putih, lalapan, tahu-tempe krispi, dan sambal.', 'price' => 45],
                    ['name' => 'Green Chili Chicken', 'desc' => 'Ayam goreng dengan sambal cabai hijau, lengkap dengan nasi putih, lalapan, tahu-tempe, dan sambal.', 'price' => 45],
                    ['name' => 'Smoky Black Pepper Duck', 'desc' => 'Bebek dimarinasi bumbu rempah, disiram saus lada hitam, disajikan bersama nasi hangat dan sambal.', 'price' => 55],
                    ['name' => 'Crispy Spiced Duck', 'desc' => 'Bebek goreng dengan taburan kremesan gurih, disajikan bersama nasi hangat dan sambal.', 'price' => 55],
                    ['name' => 'Green Chilli Duck', 'desc' => 'Bebek goreng dengan sambal cabai hijau khas Sumatera yang segar, disajikan bersama nasi hangat.', 'price' => 55],
                ],
            ],

            'The Poultry Creations' => [
                'image' => 'poultry-creations.jpg',
                'items' => [
                    ['name' => 'Demala Crispy Spiced Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Kremes Demala.', 'price' => 45000],
                    ['name' => 'Bangkok Sweet & Sour Tangy Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Rujak Thailand.', 'price' => 45000],
                    ['name' => 'Wok-Tossed Black Pepper Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Saus Blackpepper.', 'price' => 45000],
                    ['name' => 'French Butter Glazed Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Saus Butter.', 'price' => 45000],
                    ['name' => 'Golden Buttermilk Crispy Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Saus Butter Milk.', 'price' => 45000],
                    ['name' => 'Imperial Szechuan Kung Pao Chicken', 'desc' => 'Fillet ayam dengan bumbu Ayam Saus Kungpao.', 'price' => 45000],
                ],
            ],

            'The Seafood Treasures Dory' => [
                'image' => 'seafood-dory.jpg',
                'items' => [
                    ['name' => 'Oriental Sweet & Sour Dory', 'desc' => 'Fillet daging ikan dori lembut dengan balutan saus spesial Dori Asam Manis.', 'price' => 45000],
                    ['name' => 'Signature Savoury Salted Egg Dory', 'desc' => 'Fillet daging ikan dori lembut dengan balutan saus spesial Dori Salted Egg.', 'price' => 45000],
                    ['name' => 'Bangkok Zesty Glazed Dory', 'desc' => 'Fillet daging ikan dori lembut dengan balutan saus spesial Dori Saos Thailand.', 'price' => 45000],
                    ['name' => 'Garlic Butter Pan-Seared Dory', 'desc' => 'Fillet daging ikan dori lembut dengan balutan saus spesial Dori Butter.', 'price' => 45000],
                ],
            ],

            'The Seafood Treasures Calamari & Squid' => [
                'image' => 'seafood-squid.jpg',
                'items' => [
                    ['name' => 'Crispy Golden Tempura Squid', 'desc' => 'Potongan cumi segar dengan balutan saus spesial Cumi Crispy Tempura.', 'price' => 50000],
                    ['name' => 'Rich Creamy Salted Egg Squid', 'desc' => 'Potongan cumi segar dengan balutan saus spesial Cumi Salted Egg.', 'price' => 50000],
                    ['name' => 'Wok-Fired Salt & Chilli Pepper Squid', 'desc' => 'Potongan cumi segar dengan balutan saus spesial Cumi Salted and Pepper.', 'price' => 50000],
                    ['name' => 'Archipelago Rich Padang Sauce Squid', 'desc' => 'Potongan cumi segar dengan balutan saus spesial Cumi Saos Padang.', 'price' => 50000],
                ],
            ],

            'The Seafood Treasures Prawn' => [
                'image' => 'seafood-prawn.jpg',
                'items' => [
                    ['name' => 'Imperial Golden Prawn Tempura', 'desc' => 'Udang segar dengan balutan saus spesial Udang Crispy Tempura.', 'price' => 60000],
                    ['name' => 'Savoury Lava Salted Egg Prawn', 'desc' => 'Udang segar dengan balutan saus spesial Udang Salted Egg.', 'price' => 60000],
                    ['name' => 'Black Angus Style Pepper Prawn', 'desc' => 'Udang segar dengan balutan saus spesial Udang Blackpepper.', 'price' => 60000],
                    ['name' => 'Aromatic Garlic Butter Prawn', 'desc' => 'Udang segar dengan balutan saus spesial Udang Butter.', 'price' => 60000],
                    ['name' => 'Velvet Buttermilk Crispy Prawn', 'desc' => 'Udang segar dengan balutan saus spesial Udang Butter Milk.', 'price' => 60000],
                    ['name' => 'Spicy Sunda Kelapa Padang Prawn', 'desc' => 'Udang segar dengan balutan saus spesial Udang Saos Padang.', 'price' => 60000],
                    ['name' => 'Crispy Prawn with Gourmet Mayonnaise', 'desc' => 'Udang segar dengan balutan saus spesial Udang Saos Mayonnaise.', 'price' => 60000],
                ],
            ],

            'The Premium Catch & Organic Garden Selections' => [
                'image' => 'premium-catch.jpg',
                'items' => [
                    // GURAME (Rp 65.000)
                    ['name' => 'Garuda Emerald Chilli Gurame', 'desc' => 'Ikan Gurame segar utuh digoreng krispi dengan siraman saus Gurame Cabe Hijau.', 'price' => 65000],
                    ['name' => 'Archipelago Padang Sauce Gurame', 'desc' => 'Ikan Gurame segar utuh digoreng krispi dengan siraman saus Gurame Saos Padang.', 'price' => 65000],
                    ['name' => 'Imperial Sweet & Sour Tangy Gurame', 'desc' => 'Ikan Gurame segar utuh digoreng krispi dengan siraman saus Gurame Asam Manis.', 'price' => 65000],
                    ['name' => 'Bangkok Zesty Glazed Gurame', 'desc' => 'Ikan Gurame segar utuh digoreng krispi dengan siraman saus Gurame Thailand.', 'price' => 65000],
                    ['name' => 'The Society Golden Flying Gurame', 'desc' => 'Ikan Gurame segar utuh digoreng krispi dengan siraman saus Gurame Terbang.', 'price' => 65000],

                    // KAKAP (Rp 80.000)
                    ['name' => 'Hong Kong Style Steamed Kakap', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Steam Hongkong.', 'price' => 80000],
                    ['name' => 'Royal Tom Yum Steamed Kakap', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Steam Tomyam.', 'price' => 80000],
                    ['name' => 'Teo Chew Heritage Steamed Kakap', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Steam Teo Chiew.', 'price' => 80000],
                    ['name' => 'Imperial Sweet & Sour Kakap', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Asam Manis.', 'price' => 80000],
                    ['name' => 'Bangkok Zesty Glazed Kakap', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Saos Thailand.', 'price' => 80000],
                    ['name' => 'Hong Kong Style Steamed Kakap (Padang)', 'desc' => 'Ikan Kakap segar pilihan dimasak lembut atau goreng krispi dengan Kakap Saos Padang.', 'price' => 80000],
                ],
            ],

            'Demala Society Seafood Platter' => [
                'image' => 'seafood-platter.jpg',
                'items' => [
                    ['name' => 'Mix Seafood — Black Pepper', 'desc' => 'Kombinasi Kepiting, Udang, Cumi, Kerang dara, dan Baso Ikan. Dimasak segar dengan saus Black Pepper.', 'price' => 220],
                    ['name' => 'Mix Seafood — Padang Sauce', 'desc' => 'Kombinasi Kepiting, Udang, Cumi, Kerang dara, dan Baso Ikan. Dimasak segar dengan saus Padang.', 'price' => 220],
                    ['name' => 'Mix Seafood — Salted Egg', 'desc' => 'Kombinasi Kepiting, Udang, Cumi, Kerang dara, dan Baso Ikan. Dimasak segar dengan saus Salted Egg.', 'price' => 220],
                ],
            ],

        ],
    ],

    'drink' => [
        'groups' => [

            'The Demala Couture Brews' => [
                'image' => 'demala-couture-brews.jpg',
                'items' => [
                    ['name' => 'Vanilla Sea Salt Velvet Foam', 'desc' => 'Perpaduan espresso dan vanilla, dengan lapisan cream sea salt gurih dan lembut, serta crumble sebagai topping.', 'price' => 38],
                    ['name' => 'Mocca Silk Cream Espresso', 'desc' => 'Kombinasi klasik coklat dan espresso, disajikan dingin dengan berlapis cream yang gurih.', 'price' => 38],
                    ['name' => 'Citrus Espresso Tonic', 'desc' => 'Sensasi menyegarkan dari espresso dingin yang berpadu dengan keasaman lemon dan sparkling tonic.', 'price' => 38],
                    ['name' => 'Butterscotch Peach Infused Coffee', 'desc' => 'Espresso dengan infusi aroma manis butterscotch, serta dilapisi cream yang gurih.', 'price' => 38],
                    ['name' => 'Roasted Almond Butterscotch Latte', 'desc' => 'Perpaduan espresso dan rasa kacang almond dengan sirup butterscotch khas Demala.', 'price' => 38],
                ],
            ],

            'Artisan Specialty Coffee' => [
                'image' => 'artisan-specialty-coffee.jpg',
                'items' => [
                    ['name' => 'Artisan Espresso Shot', 'desc' => 'Espresso murni, pekat dan aromatik.', 'price' => 22],
                    ['name' => 'Classic Americano (Hot / Iced)', 'desc' => 'Espresso dengan air panas atau es, ringan dan bersih rasanya.', 'price' => 25],
                    ['name' => 'V60 Single Origin Pour Over', 'desc' => 'Kopi single origin, diseduh manual dengan metode pour over.', 'price' => 25],
                    ['name' => 'Classic Espresso Affogato', 'desc' => 'Espresso panas dituang di atas es krim vanilla.', 'price' => 25],
                    ['name' => 'Heritage Sanger Espresso', 'desc' => 'Racikan kopi khas dengan sentuhan susu kental manis ala Heritage.', 'price' => 28],
                    ['name' => 'Javanese', 'desc' => 'Racikan kopi khas Nusantara dengan cita rasa lokal.', 'price' => 28],
                    ['name' => 'Velvety Cappuccino (Hot / Iced)', 'desc' => 'Espresso dengan foam susu lembut bertekstur velvety.', 'price' => 30],
                    ['name' => 'Mont Blanc', 'desc' => 'Racikan kopi signature dengan sentuhan rasa manis lembut.', 'price' => 30],
                    ['name' => 'Demala Premium Aren Coffee', 'desc' => 'Espresso, susu segar, dan gula aren asli pilihan Demala.', 'price' => 32],
                    ['name' => 'Toasted Hazelnut Latte', 'desc' => 'Espresso dengan susu dan sirup hazelnut panggang.', 'price' => 35],
                    ['name' => 'Buttery Caramel Latte', 'desc' => 'Espresso dengan susu dan sirup caramel gurih.', 'price' => 35],
                    ['name' => 'Gourmet Caramel Macchiato', 'desc' => 'Espresso berlapis susu dan saus caramel premium.', 'price' => 38],
                ],
            ],

            'Society Crafted Mocktails' => [
                'image' => 'society-crafted-mocktails.jpg',
                'items' => [
                    ['name' => 'Sapphire Blue Sparkling Botanical', 'desc' => 'Mocktail biru dengan soda botani dan keasaman sitrus yang memberikan kesegaran.', 'price' => 35],
                    ['name' => 'Crimson Sunset Spectrum', 'desc' => 'Gradasi warna sunset bertekstur asam dan sensasi rasa manis segar.', 'price' => 38],
                    ['name' => 'The Grand Rainbow Breeze', 'desc' => 'Sirup artisan buah tropis yang menghadirkan kesegaran dan kemanisan dalam satu gelas.', 'price' => 38],
                    ['name' => 'Zesty Orange Citrus Sparkling', 'desc' => 'Kesegaran dari ekstrak jeruk yang berpadu dengan air sparkling yang memberikan kesegaran.', 'price' => 35],
                    ['name' => 'Chilled Lemonade Fizz Sparkling', 'desc' => 'Kesegaran dari ekstrak lemonade yang berpadu dengan air sparkling yg memberikan kesegaran.', 'price' => 35],
                    ['name' => 'Classic Strawberry Virgin Mojito', 'desc' => 'Kombinasi klasik dari daun mint segar, potongan buah strawberry, jeruk nipis, dan soda.', 'price' => 35],
                ],
            ],

            'Fruit Smoothies & Elixirs' => [
                'image' => 'fruit-smoothies-elixirs.jpg',
                'items' => [
                    ['name' => 'Imperial Bangkok Mango Smoothies', 'desc' => 'Smoothies mangga segar ala Bangkok, creamy dan menyegarkan.', 'price' => 38],
                    ['name' => 'Velvet Dragon Fruit Smoothies', 'desc' => 'Smoothies buah naga dengan tekstur lembut dan warna cantik.', 'price' => 38],
                    ['name' => 'Strawberry Cream Cheese Elixir', 'desc' => 'Perpaduan strawberry segar dengan cream cheese yang lembut.', 'price' => 38],
                    ['name' => 'Autumn Apple & Cinnamon Blends', 'desc' => 'Smoothies apel dengan sentuhan kayu manis hangat.', 'price' => 38],
                    ['name' => 'Strawberry Banana Smoothies', 'desc' => 'Smoothies strawberry dan pisang, manis alami dan segar.', 'price' => 38],
                ],
            ],

            'Pure Juices' => [
                'image' => 'pure-juices.png',
                'items' => [
                    ['name' => 'Creamy Hass Avocado Puree', 'desc' => 'Jus alpukat Hass, creamy dan kaya rasa.', 'price' => 28],
                    ['name' => 'Sweet Arumanis Mango Nectar', 'desc' => 'Jus mangga arumanis manis alami.', 'price' => 28],
                    ['name' => 'Vibrant Dragon Fruit Elixir', 'desc' => 'Jus buah naga segar dengan warna yang vibrant.', 'price' => 28],
                    ['name' => 'Tropical Pineapple Juice', 'desc' => 'Jus nanas segar, asam manis menyegarkan.', 'price' => 28],
                    ['name' => 'Green Detox Pineapple Greens', 'desc' => 'Jus detox nanas dan sayuran hijau segar.', 'price' => 28],
                ],
            ],

            'Non-Coffee Blends' => [
                'image' => 'non-coffee-blends.jpg',
                'items' => [
                    ['name' => 'Rich Malty Milo', 'desc' => 'Minuman Milo malty yang kaya rasa.', 'price' => 30],
                    ['name' => 'Dark Chocolate Cocoa', 'desc' => 'Cokelat hitam pekat, hangat dan gurih.', 'price' => 30],
                    ['name' => 'Taro Root Latte', 'desc' => 'Latte dengan rasa talas yang lembut.', 'price' => 30],
                    ['name' => 'Red Velvet Infusion', 'desc' => 'Minuman red velvet creamy dan manis.', 'price' => 30],
                    ['name' => 'Matcha Green Tea Latte', 'desc' => 'Latte matcha premium, creamy dan earthy.', 'price' => 32],
                    ['name' => 'Klepon Pandan Latte', 'desc' => 'Latte pandan dengan cita rasa klepon khas Nusantara.', 'price' => 32],
                    ['name' => 'Strawberry Hokkaido Milk', 'desc' => 'Susu Hokkaido creamy dengan strawberry segar.', 'price' => 32],
                    ['name' => 'Strawberry Purple Blends', 'desc' => 'Perpaduan strawberry dan ubi ungu yang creamy.', 'price' => 30],
                    ['name' => 'Strawberry Matcha', 'desc' => 'Perpaduan matcha dan strawberry, segar dan creamy.', 'price' => 35],
                    ['name' => 'Tropical Coconut Matcha', 'desc' => 'Matcha dengan santan kelapa tropis yang gurih.', 'price' => 35],
                    ['name' => 'Demala Fermented Tapache Craft', 'desc' => 'Minuman fermentasi tapache khas racikan Demala.', 'price' => 28],
                    ['name' => 'Silky Egg Pudding Elixir', 'desc' => 'Minuman puding telur lembut ala Demala.', 'price' => 20],
                    ['name' => 'The Grand Society Fruit Consommé', 'desc' => 'Konsome buah segar racikan spesial Society.', 'price' => 38],
                ],
            ],

            'Ice Blended Frappé' => [
                'image' => 'ice-blended-frappe.jpg',
                'items' => [
                    ['name' => 'Buttery Caramel Macchiato Frappé', 'desc' => 'Frappé caramel macchiato yang creamy dan dingin.', 'price' => 32],
                    ['name' => 'Classic Espresso Cappuccino Frappé', 'desc' => 'Frappé cappuccino klasik, dingin dan berbusa.', 'price' => 32],
                    ['name' => 'Sweet Velvet Taro Frappé', 'desc' => 'Frappé talas manis dengan tekstur velvet.', 'price' => 32],
                    ['name' => 'Imperial Uji Matcha Frappé', 'desc' => 'Frappé matcha Uji premium yang creamy.', 'price' => 32],
                    ['name' => 'Crimson Red Velvet Frappé', 'desc' => 'Frappé red velvet yang manis dan creamy.', 'price' => 32],
                    ['name' => 'Artisan Cocoa Mocca Frappé', 'desc' => 'Frappé cokelat mocca, pekat dan menyegarkan.', 'price' => 32],
                ],
            ],

            'The Botanical Tea Selection' => [
                'image' => 'botanical-tea-selection.jpg',
                'items' => [
                    ['name' => 'House Ice Tea', 'desc' => 'Teh es racikan rumah, ringan dan menyegarkan.', 'price' => 10],
                    ['name' => 'Lemon Infused Tea', 'desc' => 'Teh dengan infusi lemon segar.', 'price' => 18],
                    ['name' => 'Traditional Egg, Milk & Tea Elixir', 'desc' => 'Teh tradisional dengan telur dan susu, hangat dan gurih.', 'price' => 20],
                    ['name' => 'Orchard Lychee Tea', 'desc' => 'Teh dengan cita rasa leci yang manis segar.', 'price' => 25],
                    ['name' => 'Ginger & Lemongrass Herbal Tea', 'desc' => 'Teh herbal jahe dan serai, hangat menenangkan.', 'price' => 25],
                    ['name' => 'Authentic Thai Tea', 'desc' => 'Teh Thailand otentik, manis dan creamy.', 'price' => 25],
                    ['name' => 'Green Tea', 'desc' => 'Teh hijau murni, ringan dan menyegarkan.', 'price' => 25],
                ],
            ],

        ],
    ],

];