<?php

namespace App\Models;

class Posts 
{
    private static $blogPosts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Farhan Aldiansyah",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa explicabo atque vero. Iusto quaerat id, iste labore temporibus alias obcaecati quam eligendi delectus eum neque voluptatum. Excepturi repellendus temporibus, eum blanditiis eos enim autem assumenda placeat ab veritatis reiciendis culpa fugit eius, fugiat necessitatibus et minima rerum earum illum vitae deleniti? Voluptate quo modi quas voluptatibus quod assumenda ipsum voluptates, dolore praesentium aperiam, ullam ratione quae illo odit quisquam, at aut totam velit. Delectus, fugit. Pariatur quae ab ut laudantium."
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Aldiansyah",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa explicabo atque vero. Iusto quaerat id, iste labore temporibus alias obcaecati quam eligendi delectus eum neque voluptatum. Excepturi repellendus temporibus, eum blanditiis eos enim autem assumenda placeat ab veritatis reiciendis culpa fugit eius, fugiat necessitatibus et minima rerum earum illum vitae deleniti? Voluptate quo modi quas voluptatibus quod assumenda ipsum voluptates, dolore praesentium aperiam, ullam ratione quae illo odit quisquam, at aut totam velit. Delectus, fugit. Pariatur quae ab ut laudantium."
        ],
    ];

    public static function all()
    {
        return collect(self::$blogPosts);
    }

    public static function findOne($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
