<x-male-shop>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="/male-shop/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row" id="root" >
                <script>
                    const root = document.getElementById('root')

                    var request = new XMLHttpRequest()

                    var urlconnectdata = <?php
                    $linkconnect = "'".route('blogs.index')."'"; 
                    echo($linkconnect);
                    ?>

                    request.open('GET',urlconnectdata,true)

                    request.onload = function () {
                        // Begin accessing JSON data here
                        var data = JSON.parse(this.response)
                        console.log(data);

                        if (request.status >= 200 && request.status < 400) {
                            
                            data.data.data.forEach((data) => {
                            const card = document.createElement('div')
                            card.setAttribute('class', 'col-lg-4 col-md-6 col-sm-6')
                            const blog__item = document.createElement('div')                            
                            blog__item.setAttribute('class', 'blog__item')
                            const created_at = document.createElement('span')
                            created_at.textContent = data.created_at
                            const img = document.createElement('div')
                            img.setAttribute('class', 'blog__item__pic set-bg')
                            img.setAttribute('data-setbg',data.images)
                            const linkimg = data.images
                            const str = "url("+linkimg+")"
                            img.style.backgroundImage = str
                            const blog__item__text = document.createElement('div')
                            blog__item__text.setAttribute('class','blog__item__text')
                            const title = document.createElement('h5')
                            title.textContent = data.title
                            const a = document.createElement('a')
                            
                            a.setAttribute('href',"http://baobao:8000/blogclients/"+data.id+"")

                            a.textContent = 'Read More'

                            root.appendChild(card)
                            card.appendChild(blog__item)
                            blog__item.appendChild(img)
                            blog__item.appendChild(blog__item__text)
                            blog__item__text.appendChild(created_at)
                            blog__item__text.appendChild(title)
                            blog__item__text.appendChild(a)
                            } 
                            )

                            var btnmore = document.getElementById("btnmore")
                            console.log(btnmore)
                            btnmore.addEventListener("click", function() {
                                console.log('ok');
                                urlconnectdata = data.data.links.nextpage
                                request.open('GET',urlconnectdata,true)
                                request.onload = function () {
                                // Begin accessing JSON data here
                                var data = JSON.parse(this.response)
                                console.log(data);
                                }
                                
                            });
                            console.log(data.data.links.nextpage)

                        } else {
                            console.log('error')
                        }
                    }

                    request.send()
                </script>
            </div>
            <div class="row" style="display: flex; justify-content: center; align-item: center;">
                <button style=" border: 1px solid black; padding : 4px 25px; border-radius: 14px; color: black;" id="btnmore">More</button>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="/male-shop/img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="/male-shop/img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

</x-male-shop>