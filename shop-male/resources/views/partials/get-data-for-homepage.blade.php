@section('get-data-for-home-page')
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
        var i = 0;
        if (request.status >= 200 && request.status < 400) {
            data.data.data.forEach((data) => {
            if ( i == 3 )
            { 
                return
            }
            i++;
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
            
            a.setAttribute('href',"http://localhost:8000/blogclients/"+data.id+"")

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
@endsection