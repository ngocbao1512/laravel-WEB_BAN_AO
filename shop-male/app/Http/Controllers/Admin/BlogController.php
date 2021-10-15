<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Model\Blog;
use App\Http\Model\Tag;

class BlogController extends Controller
{
    protected $modelBlog;
    protected $modelTag;

    public function __contruct(
        Blog $blog,
        Tag $tag
        ){
        $this->modelBlog = $blog;
        $this->modelTag = $tag;
    }
    
    public function index()
    {
        $blogs = $this->modelBlog;
        if($blogs == null){
            $blogs = 'have nothing here';
        } else {
            $blogs = $blogs->paginate(config('blog.paginate10'));
        }
        $tags = $this->modelTag;
        $user = auth()->user()->name;

        return view('my-admin.blogs.index',[
            'blogs' => $blogs,
            'tags' => $tags,
            'user' => $user,
        ]);
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}