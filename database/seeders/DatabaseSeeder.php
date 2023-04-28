<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Farhan Afif Aldiansyah',
            'username' => 'farhanaldiansyah',
            'email' => 'farhan.aldiansyah245@gmail.com',
            'password' => bcrypt('user123')
        ]);

        User::factory(3)->create();
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Android Developer',
            'slug' => 'android-developer'
        ]);
        Posts::factory(20)->create();

        // Posts::create([
        //     'title' => 'Judul Pertama Post',
        //     'slug' => 'judul-pertama-post',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit eius, porro sunt animi voluptate asperiores maxime blanditiis consequuntur! Voluptates, reprehenderit expedita? Fugiat, reiciendis sunt! Architecto nobis blanditiis autem temporibus quibusdam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem rerum corrupti iste quam porro veritatis esse in, totam vel dignissimos aliquam pariatur minima aperiam enim aut fugit eos assumenda, autem quidem. Iure, officia, voluptatum, saepe adipisci cumque dolorum illum rem cum fugit optio dolor aspernatur nihil! Numquam et distinctio, dolor, sit eveniet est non amet alias odio optio eos nulla ipsam possimus beatae nihil tenetur, illo tempore enim aperiam doloremque illum veniam accusamus maxime. Neque non recusandae eos quasi pariatur sint distinctio rem repellat, dicta sequi qui nam cum fuga laudantium voluptatem illo, a explicabo temporibus consectetur omnis earum? Alias earum ut possimus distinctio fugiat, voluptate adipisci vero id eius. Sint delectus consequatur exercitationem assumenda excepturi esse aperiam eos, asperiores quidem amet rerum voluptates magnam dolores placeat nesciunt provident, possimus inventore, tempora totam! Laboriosam laborum, repellat corporis error facilis mollitia nemo quaerat soluta atque in ratione numquam tempore quas. Officia?'
        // ]);
        // Posts::create([
        //     'title' => 'Judul Kedua Post',
        //     'slug' => 'judul-kedua-post',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit eius, porro sunt animi voluptate asperiores maxime blanditiis consequuntur! Voluptates, reprehenderit expedita? Fugiat, reiciendis sunt! Architecto nobis blanditiis autem temporibus quibusdam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem rerum corrupti iste quam porro veritatis esse in, totam vel dignissimos aliquam pariatur minima aperiam enim aut fugit eos assumenda, autem quidem. Iure, officia, voluptatum, saepe adipisci cumque dolorum illum rem cum fugit optio dolor aspernatur nihil! Numquam et distinctio, dolor, sit eveniet est non amet alias odio optio eos nulla ipsam possimus beatae nihil tenetur, illo tempore enim aperiam doloremque illum veniam accusamus maxime. Neque non recusandae eos quasi pariatur sint distinctio rem repellat, dicta sequi qui nam cum fuga laudantium voluptatem illo, a explicabo temporibus consectetur omnis earum? Alias earum ut possimus distinctio fugiat, voluptate adipisci vero id eius. Sint delectus consequatur exercitationem assumenda excepturi esse aperiam eos, asperiores quidem amet rerum voluptates magnam dolores placeat nesciunt provident, possimus inventore, tempora totam! Laboriosam laborum, repellat corporis error facilis mollitia nemo quaerat soluta atque in ratione numquam tempore quas. Officia?'
        // ]);
        // Posts::create([
        //     'title' => 'Judul Ketiga Post',
        //     'slug' => 'judul-ketiga-post',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit eius, porro sunt animi voluptate asperiores maxime blanditiis consequuntur! Voluptates, reprehenderit expedita? Fugiat, reiciendis sunt! Architecto nobis blanditiis autem temporibus quibusdam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem rerum corrupti iste quam porro veritatis esse in, totam vel dignissimos aliquam pariatur minima aperiam enim aut fugit eos assumenda, autem quidem. Iure, officia, voluptatum, saepe adipisci cumque dolorum illum rem cum fugit optio dolor aspernatur nihil! Numquam et distinctio, dolor, sit eveniet est non amet alias odio optio eos nulla ipsam possimus beatae nihil tenetur, illo tempore enim aperiam doloremque illum veniam accusamus maxime. Neque non recusandae eos quasi pariatur sint distinctio rem repellat, dicta sequi qui nam cum fuga laudantium voluptatem illo, a explicabo temporibus consectetur omnis earum? Alias earum ut possimus distinctio fugiat, voluptate adipisci vero id eius. Sint delectus consequatur exercitationem assumenda excepturi esse aperiam eos, asperiores quidem amet rerum voluptates magnam dolores placeat nesciunt provident, possimus inventore, tempora totam! Laboriosam laborum, repellat corporis error facilis mollitia nemo quaerat soluta atque in ratione numquam tempore quas. Officia?'
        // ]);
    }
}
