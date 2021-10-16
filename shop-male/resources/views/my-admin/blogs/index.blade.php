<x-admin-lte>
  <div class="row ">
    <div class="col-9 tm-block-col" >
      <div class="tm-bg-primary-dark tm-block tm-block-products" style="min-height: 70vh"> 
        {{-- start foreach blog --}}
        <div class="post-preview tm-footer tm-mt-small" style="padding: 25px;">
            <a href="https://ngocbao1512.github.io/post/day_code_len_github/" class="text-white">
                <h2 class="post-title">
                    Đẩy Code Lên GitHub 
                </h2>
                <div class="post-content-preview">
                  Giới Thiệu Có nhiều bạn mới học lập trình được giáo viên yêu câù nộp bài tập qua github, hay các bạn cuối kì làm xong bài tập đồ án. muốn lưu lại code, để nhỡ sau muốn học lại học cải thiện. nên hôm nay mình sẽ hướng dẫn các bạn cách đẩy code lên github
                  Giới thiệu qua về github thì nó là một hệ thống quản lý dự án và code, hoạt động giống như một mạng xã hội cho lập trình viên.
                </div>
            </a>
            <p class="post-meta">
                Posted by&nbsp; &nbsp;  bao  Tuesday, October 12, 2021
            </p>
        </div>  

      </div>
      <a href="/add-product" class="btn btn-primary btn-block text-uppercase mb-3">Add new blog</a>
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
        <hr class="hidden-sm hidden-xs">
        <h5>FEATURED TAGS</h5>
        <div class="tags">
          <a href="/tags/linux" title="tui" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px; ">
            tui
          </a>
          <a href="/tags/linux" title="quan" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px;">
            quan
          </a>
          <a href="/tags/linux" title="ao" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px;">
            ao
          </a>
        </div>
    </section>
    </div>      
  </div>

@include('partials.active-blog');

</x-admin-lte>