<x-admin-lte>
    
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{$blog->title}}</h2>
                        <ul>
                            <li>By {{$blog->user->name}}</li>
                            <li>{{$blog->created_at}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        @foreach ($blog->images as $image)
                        <img src="{{showBlogImage($image->name)}}" alt="" style="max-height: 500px;filter: grayscale(100%);">
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        
                        <div class="blog__details__text">
                            <p>{{$blog->content}}</p>
                        </div>
                        
                        
                        <div class="blog__details__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="/male-shop/img/blog/details/blog-author.jpg" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h5>{{$blog->user->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__tags">
                                        @foreach ($blog->tags as $tag) 
                                            <a href="#">#{{$tag->name}}</a>
                                        @endforeach

                                        
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
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('partials.active-blog');
@section('css')
<style>
/*---------------------
Blog Hero
-----------------------*/

.blog-hero {
  background: #f3f2ee;
  padding-top: 125px;
  padding-bottom: 190px;
}

.blog__hero__text h2 {
  color: #111111;
  font-size: 42px;
  font-weight: 700;
  line-height: 50px;
  margin-bottom: 18px;
}

.blog__hero__text ul li {
  list-style: none;
  font-size: 15px;
  color: #3d3d3d;
  display: inline-block;
  margin-right: 40px;
  position: relative;
}

.blog__hero__text ul li:after {
  position: absolute;
  right: -25px;
  top: 0;
  content: "|";
}

.blog__hero__text ul li:last-child {
  margin-right: 0;
}

.blog__hero__text ul li:last-child:after {
  display: none;
}

/*---------------------
Blog Details
-----------------------*/

.blog-details {
  margin-top: -115px;
  padding-top: 0;
}

.blog__details__content {
  position: relative;
}

.blog__details__pic {
  margin-bottom: 60px;
}

.blog__details__pic img {
  min-width: 100%;
  border-radius: 5px;
}

.blog__details__share {
  text-align: center;
  position: absolute;
  left: -120px;
  top: 0;
}

.blog__details__share span {
  color: #111111;
  font-size: 20px;
  text-transform: uppercase;
  font-weight: 700;
  display: block;
  margin-bottom: 30px;
}

.blog__details__share ul li {
  list-style: none;
  margin-bottom: 15px;
}

.blog__details__share ul li a {
  color: #ffffff;
  font-size: 18px;
  height: 46px;
  display: inline-block;
  width: 46px;
  border-radius: 50%;
  line-height: 46px;
  text-align: center;
  background: #4267b2;
}

.blog__details__share ul li a.twitter {
  background: #1da1f2;
}

.blog__details__share ul li a.youtube {
  background: #fe0003;
}

.blog__details__share ul li a.linkedin {
  background: #0173b2;
}

.blog__details__text {
  margin-bottom: 50px;
}

.blog__details__text p {
  font-size: 18px;
  line-height: 34px;
}

.blog__details__text p:last-child {
  margin-bottom: 0;
}

.blog__details__quote {
  background: #f3f2ee;
  padding: 50px 40px 35px;
  border-radius: 5px;
  position: relative;
  margin-bottom: 45px;
}

.blog__details__quote i {
  font-size: 16px;
  color: #ffffff;
  height: 50px;
  width: 50px;
  background: #e53637;
  border-radius: 50%;
  line-height: 50px;
  text-align: center;
  position: absolute;
  left: 40px;
  top: -25px;
}

.blog__details__quote p {
  color: #111111;
  font-size: 18px;
  font-weight: 600;
  font-style: italic;
  margin-bottom: 20px;
}

.blog__details__quote h6 {
  color: #e53637;
  font-size: 15px;
  font-weight: 700;
  text-transform: uppercase;
}

.blog__details__option {
  border-top: 1px solid #e5e5e5;
  padding-top: 15px;
  margin-bottom: 70px;
}

.blog__details__author__pic {
  display: inline-block;
  margin-right: 15px;
}

.blog__details__author__pic img {
  height: 46px;
  width: 46px;
  border-radius: 50%;
}

.blog__details__author__text {
  display: inline-block;
}

.blog__details__author__text h5 {
  color: #111111;
  font-weight: 700;
}

.blog__details__tags {
  text-align: right;
}

.blog__details__tags a {
  display: inline-block;
  color: #111111;
  font-weight: 700;
  margin-right: 10px;
}

.blog__details__tags a:last-child {
  margin-right: 0;
}

.blog__details__btns {
  margin-bottom: 40px;
}

.blog__details__btns__item {
  display: block;
  border: 1px solid #ebebeb;
  padding: 25px 30px 30px;
  margin-bottom: 30px;
}

.blog__details__btns__item.blog__details__btns__item--next {
  text-align: right;
}

.blog__details__btns__item.blog__details__btns__item--next p span {
  margin-right: 0;
  margin-left: 5px;
}

.blog__details__btns__item p {
  color: #b7b7b7;
  margin-bottom: 10px;
}

.blog__details__btns__item p span {
  font-size: 20px;
  position: relative;
  top: 4px;
  margin-right: 5px;
}

.blog__details__btns__item h5 {
  color: #111111;
  font-size: 20px;
  line-height: 30px;
  font-weight: 700;
}

.blog__details__comment h4 {
  color: #333333;
  font-weight: 700;
  margin-bottom: 35px;
  text-align: center;
}

.blog__details__comment form input {
  height: 50px;
  width: 100%;
  border: 1px solid #e1e1e1;
  padding-left: 20px;
  font-size: 15px;
  color: #b7b7b7;
  margin-bottom: 30px;
  -webkit-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  transition: all, 0.3s;
}

.blog__details__comment form input::-webkit-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form input::-moz-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form input:-ms-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form input::-ms-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form input::placeholder {
  color: #b7b7b7;
}

.blog__details__comment form input:focus {
  border-color: #000000;
}

.blog__details__comment form textarea {
  height: 120px;
  width: 100%;
  border: 1px solid #e1e1e1;
  padding-left: 20px;
  padding-top: 12px;
  font-size: 15px;
  color: #b7b7b7;
  margin-bottom: 24px;
  resize: none;
  -webkit-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  transition: all, 0.3s;
}

.blog__details__comment form textarea::-webkit-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form textarea::-moz-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form textarea:-ms-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form textarea::-ms-input-placeholder {
  color: #b7b7b7;
}

.blog__details__comment form textarea::placeholder {
  color: #b7b7b7;
}

.blog__details__comment form textarea:focus {
  border-color: #000000;
}

.blog__details__comment form button {
  letter-spacing: 4px;
  padding: 14px 35px;
}
</style>
@endsection
</x-admin-lte>