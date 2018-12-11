<div class="swiper-container">
    <div class="swiper-wrapper">

        @foreach($swipers as $swiper)
        <div class="swiper-slide">
            <a href="{{$swiper->url}}">
                <img src="{{$swiper->icon}}" alt="">
            </a>
        </div>
            @endforeach


    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<script>
    window.onload = function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay:true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

</script>