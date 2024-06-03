<section class="">
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($siteSettings->settings['banners'] as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                <img src="{{ $banner['image'] }}" style="height: 450px;" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                <div class="carousel-caption  d-md-block">
                    <h5>{{ $banner[app()->getLocale()]['title'] }}</h5>
                    <p>{{ $banner[app()->getLocale()]['details'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>