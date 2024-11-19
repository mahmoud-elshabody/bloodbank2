        <!--articles-->
        <div class="articles">
            <div class="container title">
                <div class="head-text">
                    <h2>المقالات</h2>
                </div>
            </div>
            <div class="view">
                <div class="container">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach ($posts as $post )
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{ asset('front') }}/imgs/p2.jpg" class="card-img-top" alt="...">
                                        <a href="article-details.html" class="click">المزيد</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">
                                        </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
