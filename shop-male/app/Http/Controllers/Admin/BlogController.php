<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Image;
use App\Models\BlogTag;
use App\Models\BlogImage;

class BlogController extends Controller
{
    protected $modelBlog;
    protected $modelTag;
    protected $modelBlogTag;
    protected $modelImage;
    protected $modelBlogImage;

    public function __construct(
        Blog $blog,
        Tag $tag,
        Image $image,
        BlogTag $blogtag,
        BlogImage $blogimage
        ){
        $this->modelBlog = $blog;
        $this->modelTag = $tag;
        $this->modelImage = $image;
        $this->modelBlogTag = $blogtag;
        $this->modelBlogImage = $blogimage;
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
        $data_tag['user_id'] = auth()->id();
        $tags = arrayTag($request['tag']);

        try {
            /* create table blogs */
            $data_blog['user_id'] = auth()->id();
            $new_blog = $this->modelBlog->create($data_blog);

            foreach($tags as $tag)
            {
                if($tag != null) 
                {
                    $tag_arr = $this->modelTag->all()->toArray();

                    if(!haveTagInArray($tag,$tag_arr)){
                        /* create table tags */
                        $data_tag['name'] = $tag;
                        $new_tag = $this->modelTag->create($data_tag);

                        /* create table blog_tags */
                        $data_blogtag['blog_id'] = $new_blog->id;
                        $data_blogtag['tag_id'] = $new_tag->id;
                        $this->modelBlogTag->create($data_blogtag);
                    } else 
                    {
                        /* get tags id in database*/
                        $tag_id = haveTagInArray($tag,$tag_arr);
                        /* create table blog_tags */
                        $data_blogtag['blog_id'] = $new_blog->id;
                        $data_blogtag['tag_id'] = $tag_id;
                        $this->modelBlogTag->create($data_blogtag);
                    }
                }
                

                
                
            }

            /* create table images */
            $file = $request->file('image');
            if ($file) {
               // $file->hashName = encodeImage($file);
                $image_name = encodeImage($file);
                $file->move('storage/blogs',$image_name);
                $data_image['name'] = $image_name;
                $new_image = $this->modelImage->create($data_image);

                /* create table blog_images */
                $data_blogimage['blog_id'] = $new_blog->id;
                $data_blogimage['image_id'] = $new_image->id;
                $this->modelBlogImage->create($data_blogimage);     
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
        $blog = $this->modelBlog->findOrFail($id);
        $tags = $this->modelTag->all();

        return view('my-admin.blogs.edit',[
            'blog' => $blog,
            'tags' => $tags,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $oldblog = $this->modelBlog->findOrFail($id);

        $data_blog  = $request->only([
            'title',
            'content',
        ]);
        $data_blog['user_id'] = auth()->id();
        $data_tag['user_id'] = auth()->id();
        $tags = arrayTag($request['tag']);

        try {
            /* create table blogs */
            $data_blog['user_id'] = auth()->id();
            $new_blog = $oldblog->update($data_blog);

            foreach($tags as $tag)
            {
                if($tag != null) 
                {
                    $tag_arr = $this->modelTag->all()->toArray();

                    if(!haveTagInArray($tag,$tag_arr)){
                        /* create table tags */
                        $data_tag['name'] = $tag;
                        $new_tag = $this->modelTag->create($data_tag);

                        /* create table blog_tags */
                        $data_blogtag['blog_id'] = $id;
                        $data_blogtag['tag_id'] = $new_tag->id;
                        $this->modelBlogTag->create($data_blogtag);
                    } else 
                    {
                        /* get tags id in database*/
                        $tag_id = haveTagInArray($tag,$tag_arr);

                        /* check blog_tags is available or not */
                        if(!checkTableBlogTag($tag_id,$oldblog->id,$this->modelBlogTag->all()->toArray()))
                        {
                            /* create table blog_tags */
                            $data_blogtag['blog_id'] = $id;
                            $data_blogtag['tag_id'] = $tag_id;
                            $this->modelBlogTag->create($data_blogtag);
                        }

                    }
                }       
            }

            /* create table images */
            $file = $request->file('image');
            if ($file) {
               // $file->hashName = encodeImage($file);
                $image_name = encodeImage($file);
                $file->move('storage/blogs',$image_name);
                $data_image['name'] = $image_name;
                $new_image = $this->modelImage->create($data_image);

                /* create table blog_images */
                $data_blogimage['blog_id'] = $id;
                $data_blogimage['image_id'] = $new_image->id;
                $this->modelBlogImage->create($data_blogimage);     
            }
            return redirect()
                ->route('admin.blogs.create')
                ->with('msg','update success');

        }
        catch (\Exception $e){
            \Log::error($e);
            $error = 'Something went wrong.';

            return redirect()
            ->route('admin.blogs.create')
            ->with('error', $error);
        }    
    }

    
    public function destroy($id)
    {
        $blog = $this->modelBlog->findOrFail($id);
        
        try {
            $blog->delete();

            return redirect()
                ->route('admin.blogs.index')
                ->with('msg','Delete success!');

        } catch (\Exception $e) {
            
            \Log::error($e);

            return redirect()
                ->route('admin.blogs.index')
                ->with('error','Delete failed. Please try again later!');
        } 
    }
}
