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
<!--
            <a href="{{route('admin.blogs.edit',['blog'=>$blog->id])}}" class="btn btn-warning text-uppercase mb-3" >edit</a>

            <a href="{{route('admin.blogs.destroy',['blog'=>$blog->id])}}" class="btn btn-warning text-uppercase mb-3" >remove this post</a>
-->
            <form action="{{route('admin.blogs.destroy',['blog'=>$blog->id])}}" method="POST">
                <a href="{{route('admin.blogs.show',['blog'=>$blog->id])}}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>

                <a href="{{route('admin.blogs.edit',['blog'=>$blog->id])}}">
                    <i class="fas fa-edit  fa-lg"></i>
                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>
                </button>
            </form>
            <input type="checkbox" id="css" name="blogdlt" value="CSS" style="float:right; width: 40px; height: 40px; margin-top: -45px;">
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
            <a href="{{route('admin.tags.show',['tag'=>$tag->id])}}">
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