<?php

use Illuminate\Database\Seeder;
use App\Post ;
use App\Category ;
use App\Tag ;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $author1=\App\User::create([
            'name'=>'Ahmed Mohamed',
            'email'=>'ahmed@mohamed',
            'password'=>\Illuminate\Support\Facades\Hash::make('62646284'),

        ]);
        $author2=\App\User::create([
            'name'=>'Manar Mohamed',
            'email'=>'Manar@mohamed',
            'password'=>\Illuminate\Support\Facades\Hash::make('62646284'),

        ]);
        $category1=\App\Category::create([
            'name'=>'News',
        ]);
        $category2=\App\Category::create([
            'name'=>'Marketing',
        ]);
        $category3=\App\Category::create([
            'name'=>'Partnership',
        ]);
        $post1=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>' translation by H. Rackham',
            'content'=>'"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account',
            'category_id'=>$category1->id,
            'image' => 'posts/6.jpg',
            'user_id'=>$author1->id
        ]);

        $post2=Post::create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>' translation by H. Rackham',
            'content'=>'"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account',
            'category_id'=>$category2->id,
            'image' => 'posts/7.jpg',
            'user_id'=>$author2->id
        ]);

        $post3=Post::create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>' translation by H. Rackham',
            'content'=>'"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account',
            'category_id'=>$category3->id,
            'image' => 'posts/8.jpg',
            'user_id'=>$author1->id
        ]);

        $post4=Post::create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>' translation by H. Rackham',
            'content'=>'"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account',
            'category_id'=>$category2->id,
            'image' => 'posts/9.jpg',
            'user_id'=>$author2->id
        ]);

        $tag1=Tag::create([
            'name'=>'Job',
        ]);

        $tag2=Tag::create([
            'name'=>'Customers',
        ]);

        $tag3=Tag::create([
            'name'=>'Record',
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]) ;

        $post2->tags()->attach([$tag2->id,$tag3->id]) ;

        $post3->tags()->attach([$tag1->id,$tag3->id]) ;


    }
}
