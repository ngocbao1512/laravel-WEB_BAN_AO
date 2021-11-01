<x-male-shop>

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
           <div class="container">
               <div class="row d-flex justify-content-center">
                   <div class="col-lg-9 text-center">
                       <div class="blog__hero__text">
                           <h2 id="title"></h2>
                           <ul>
                               <li class="author"></li>
                               <li id="created_at"></li>
                               <li id="number_comment"></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Blog Details Hero End -->
       <script>
        var request = new XMLHttpRequest()

        request.open('GET',
                    <?php
                    $link = route('blogs.show',['blog'=>$id]);
                    $linkconnect = "'".$link."'"; 
                    echo($linkconnect);
                    ?>
                    ,true)


        console.log(<?php echo "'".route('blogs.show',['blog'=>$id])."'"; ?>)

        request.onload = function () {
            // Begin accessing JSON data here
            var data = JSON.parse(this.response)
            if (request.status >= 200 && request.status < 400) {
                console.log(data)
                post = data.data
                console.log(post.title)
                const title = document.getElementById('title')
                const author = document.getElementsByClassName('author')
                const created_at = document.getElementById('created_at')
                const number_comment = document.getElementById('number_comment')
                const img = document.getElementById('image')
                const content = document.getElementById('content')
                const tags = document.getElementById('tags')


                title.textContent = post.title
                author[0].textContent = post.user_name
                author[1].textContent = post.user_name
                created_at.textContent = post.created_at
                number_comment.textContent = Math.floor(Math.random() * 35) + " comments"
                img.setAttribute('src',post.images)
                content.textContent = post.content
                
                console.log(post.tags[0].name)
                for(var i = 0; i < post.tags.length; i++ ){
                    const tag = document.createElement('a')
                    var text = ' #' + post.tags[i].name
                    tag.textContent = text
                    tags.appendChild(tag)
                }



                

            } else {
                console.log('connect database fail')
            }
        }
        request.send()
       
        </script>
   
       <!-- Blog Details Section Begin -->
       <section class="blog-details spad">
           <div class="container">
               <div class="row d-flex justify-content-center">
                   <div class="col-lg-12">
                       <div class="blog__details__pic">
                           <img id="image" style="max-height: 550px;">
                       </div>
                   </div>
                   <div class="col-lg-8">
                       <div class="blog__details__content">
                           <div class="blog__details__share">
                               <span>share</span>
                               <ul>
                                   <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                   <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                   <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                   <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                               </ul>
                           </div>
                           <div class="blog__details__text" id="content">
                              
                           </div>
                           
                           <div class="blog__details__option">
                               <div class="row">
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                       <div class="blog__details__author">
                                           <div class="blog__details__author__pic">
                                               <img src="/male-shop/img/blog/details/blog-author.jpg" alt="">
                                           </div>
                                           <div class="blog__details__author__text">
                                               <h5 class="author">Aiden Blair</h5>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                       <div class="blog__details__tags" id="tags">
                                           
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="blog__details__btns">
                               <div class="row">
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                       <a href="" class="blog__details__btns__item">
                                           <p><span class="arrow_left"></span> Previous Pod</p>
                                           <h5>It S Classified How To Utilize Free Classified Ad Sites</h5>
                                       </a>
                                   </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                       <a href="" class="blog__details__btns__item blog__details__btns__item--next">
                                           <p>Next Pod <span class="arrow_right"></span></p>
                                           <h5>Tips For Choosing The Perfect Gloss For Your Lips</h5>
                                       </a>
                                   </div>
                               </div>
                           </div>
                           <div class="blog__details__comment">
                               <h4>Leave A Comment</h4>
                               <form action="#">
                                   <div class="row">
                                       <div class="col-lg-4 col-md-4">
                                           <input type="text" placeholder="Name">
                                       </div>
                                       <div class="col-lg-4 col-md-4">
                                           <input type="text" placeholder="Email">
                                       </div>
                                       <div class="col-lg-4 col-md-4">
                                           <input type="text" placeholder="Phone">
                                       </div>
                                       <div class="col-lg-12 text-center">
                                           <textarea placeholder="Comment"></textarea>
                                           <button type="submit" class="site-btn">Post Comment</button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Blog Details Section End -->\

       
   
   </x-male-shop>