<x-admin-lte>
  <div class="row ">
    <div class="col-9 tm-block-col" >
      <div class="tm-bg-primary-dark tm-block tm-block-products" style="min-height: 70vh; overflow: scroll;"> 

        @foreach ($blogs as $blog)
          <div class="post-preview tm-footer tm-mt-small" style="padding: 25px;">
            <a href="{{route('admin.blogs.show',['blog'=>$blog->id])}}" class="text-white">
                <h2 class="post-title">
                    {{$blog->title}}
                </h2>
                <div class="post-content-preview">
                  {{$blog->content}}
                </div>
            </a>
            
            <p class="post-meta">
                Posted by&nbsp; &nbsp;  @if ($blog->user_id)
                  {{$blog->user->name}}
                @endif  {{$blog->created_at}}
            </p>
          </div>  
        @endforeach

      </div>
      <a href="{{route('admin.blogs.create')}}" class="btn btn-primary btn-block text-uppercase mb-3">Add new blog</a>
      <button class="btn btn-primary btn-block text-uppercase mb-3">Delete selected blogs</button>
    </div>

    <div class="
    col-lg-3 col-lg-offset-0
    col-md-3 col-md-offset-0
    col-sm-12
    col-xs-12
    sidebar-container
    ">  
    <section>
        <hr class="">
        <h5>FEATURED TAGS</h5>
        <div class="tags" style="min-height: 30vh; max-width: 20vw;">
          @foreach ($tags as $tag)
            <a href="{{route('admin.tags.index',['tag'=>$tag->id])}}">
              <span  style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; color: white; margin-right: 10px; margin-top : 20px; position : relative; ">
              {{$tag->name}}
              </span>
            </a>
          @endforeach
        </div>
    </section>
    </div>      
  </div>

@include('partials.active-blog');

</x-admin-lte>