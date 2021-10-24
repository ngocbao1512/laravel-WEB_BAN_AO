<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Http\Resources\UserResource;

class BlogController extends Controller
{
    protected $modelBlog;

    public function __construct(Blog $blog)
    {
        $this->modelBlog = $blog;
    }

    public function index()
    {

        $blogs = $this->modelBlog
        ->with('user')
        ->orderBy('id', 'DESC')
        ->paginate(config('blog.paginate9'));
        
        
        $blogcollection = new BlogCollection(
            $blogs,
        );

        return $this->ResponseSuccess("show database ", $blogcollection);
    }

    public function show($id)
    {
        $blog = $this->modelBlog->findOrFail($id);

        return $this->ResponseSuccess("show product : $blog->name ", new BlogResource($blog));
    }
  
}
