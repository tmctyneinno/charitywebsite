<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    //

    public function Index(){
        return view('frontend.blogs', 
        ['blogs' => Blog::latest()->get(), 
        'popular' => Blog::where('views', '>', 0)->get(),
        'title' => 'Blogs'
        ]
    );
    }

    public function Details($blog_id){
        return view('frontend.blog_details', [
            'blog' => Blog::where('id',decrypt($blog_id))->first(),
            'popular' => Blog::latest()->take(5)->get(),
            'title' => 'Blogs'
        ]);
    }
}
