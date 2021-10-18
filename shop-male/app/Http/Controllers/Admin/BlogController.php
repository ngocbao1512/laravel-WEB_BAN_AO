<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Imageable;
use App\Models\BlogTag;

class BlogController extends Controller
{
    protected $modelBlog;
    protected $modelTag;
    protected $modelBlogTag;
    protected $modelImage;
    protected $modelImageable;

    public function __construct(
        Blog $blog,
        Tag $tag,
        Image $image,
        Imageable $imageable,
        BlogTag $blogtag
        ){
        $this->modelBlog = $blog;
        $this->modelTag = $tag;
        $this->modelImage = $image;
        $this->modelImageable = $imageable;
        $this->modelBlogTag = $blogtag;
    }
    
    public function index()
    {
        $blogs = $this->modelBlog;
        if($blogs == null){
            $blogs = 'have nothing here';
        } else {
            $blogs = $blogs->all();
        }
        $tags = $this->modelTag->all();

        return view('my-admin.blogs.index',[
            'blogs' => $blogs,
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        $tags = $this->modelTag->all();
        return view('my-admin.blogs.create',[
            'tags' => $tags,
        ]);
        
    }

   
    public function store(Request $request)
    {
        $data_blog  = $request->only([
            'title',
            'content',
        ]);

        $data_blog['user_id'] = auth()->id();

        $data_tag['name'] = $request['tag'];
        $data_tag['user_id'] = auth()->id();

        try {
            /* create table blog */
            $data['user_id'] = auth()->id();

            /* create table tag */
            //dd($data_tag);
            $newtag = $this->modelTag->create($data_tag);
            $newblog = $this->modelBlog->create($data_blog);
            /* create table blogTag */
            $blogtag['blog_id'] = $newblog->id;
            $blogtag['tag_id'] = $newtag->id;
            $this->modelBlogTag->create($blogtag);
            /* create table imageable */

            $file = $request->file('image');
            if ($file) {
                $file->store('public/images');
                /* create table image */
                $imageinput['image'] = $file->hashName();
                $newimage = $this->modelImage->create($imageinput);

                /* create table imageable */
                $imageable['image_id'] = $newimage->id;
                $imageable['imageable_id'] = $newblog->id;
                $imageable['imageable_type'] = 'blog';

                $this->modelImageable->create($imageable);
                
                
            }
            return redirect()
                ->route('admin.blogs.create')
                ->with('msg','add success');


        }
        catch (\Exception $e){
            \Log::error($e);
            $error = 'Something went wrong.';

            return redirect()
            ->route('admin.blogs.create')
            ->with('error', $error);
        }
        //dd($data);
        
        
    }

    
    public function show($id)
    {
        $blog = $this->modelBlog->findOrFail($id);

        return view('my-admin.blogs.show',[
            'blog' => $blog,
        ]);
        
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
