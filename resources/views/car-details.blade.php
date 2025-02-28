<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
    <title>{{$car->brand}} {{$car->model}}</title>
    <link rel="icon" href="/images/slogo.png" type="image/png">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"><link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    header{
        height: 100vh;
        min-height: 40em;
        background: url('{{ Storage::url($car->main_image) }}') no-repeat center;
        background-size: cover;
    }
</style>
<body>
    <header>
        @include('partials.nav')
        <div class="header-body">
            <h1 class="title" data-aos="fade-up" data-aos-duration="1200">{{ $car->brand }} {{ $car->model }}</h1>
            <div>
                <div class="stats">
                    <div>
                        <div class="gauge">
                            <img src="/images/speedometer.png">
                            <h2>{{ $car->{'0-100km/h'} }}<span>s</span></h2>
                        </div>
                        <div>
                            <small>0-100 km/h</small>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h2><span>+</span>{{$car->top_speed}}<span>km/h</span></h2>
                        </div>
                        <div>
                            <small>Top Speed</small>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h2>{{$car->horsepower}}Hp</h2>
                        </div>
                        <div>
                            <small>Horse Power</small>
                        </div>
                    </div>
                    <a href="#" class="btn">Reserve Now</a>
                </div>
                <a href="#" class="btn btn-mobile">Reserve Now</a>
                <a href="#specs">
                    <img src="/images/arrow-down.svg" class="arrow"/>
                </a>
            </div>
        </div>
    </header>
    <section class="about">
        <img src="{{ Storage::url($car->second_image) }}" data-aos="fade-up" data-aos-duration="1200">
    </section>
    <section class="specs" id='specs'>
        <ul>
            <li><span>Base Specs</span></li>
            <li>
                <span>Brand</span>
                <span>{{$car->brand}}</span>
            </li>
            <li>
                <span>Model</span>
                <span>{{$car->model}}</span>
            </li>
            <li>
                <span>Category</span>
                <span>{{$car->category}}</span>
            </li>
            <li>
                <span>Year</span>
                <span>{{$car->year}}</span>
            </li>
            <li>
                <span>Engine</span>
                <span>{{$car->engine}}</span>
            </li>
            <li>
                <span>Horse Power</span>
                <span>{{$car->horsepower}} Hp</span>
            </li>
            <li>
                <span>Torque</span>
                <span>{{$car->torque}} Nm</span>
            </li>
            <li>
                <span>Acceleration 0-100 km/h</span>
                <span>{{ $car->{'0-100km/h'} }}</span>
            </li>
            <li>
                <span>Acceleration 0-160 km/h</span>
                <span>{{ $car->{'0-160km/h'} }}</span>
            </li>
            <li>
                <span>Acceleration 1/4 mile</span>
                <span>{{ $car->{'1/4mile'} }}</span>
            </li>
            <li>
                <span>Top Speed</span>
                <span>{{$car->top_speed}}km/h</span>
            </li>
            <li>
                <span>Weight</span>
                <span>{{$car->weight}} kg</span>
            </li>
            <li>
                <span>Transmission</span>
                <span>{{$car->transmission}}</span>
            </li>
            <li>
                <span>Seating</span>
                <span>{{$car->seating}}</span>
            </li>
            <li>
                <span>Drive</span>
                <span>{{$car->drive}}</span>
            </li>
            <li>
                <span>Price</span>
                <span>${{$car->price}}</span>
            </li>
        </ul>
    </section>
    <div class="info-container">
        <section class="info">
            <img src="{{ Storage::url($car->performance_image) }}" data-aos="fade-up" data-aos-duration="1200">
            <div data-aos="fade-up" data-aos-duration="1200">
                <h2>The Performance</h2>
                <p>{{$car->performance}}</p>
            </div>
        </section>
        <section class="info">
            <img src="{{ Storage::url($car->interior_image) }}" data-aos="fade-up" data-aos-duration="12000">
            <div data-aos="fade-up" data-aos-duration="1200">
                <h2>The Interior</h2>
                <p>{{$car->interior}}</p>
            </div>
        </section>
    </div>
    <section class="iframe-video" data-aos="fade-up" data-aos-duration="1200">
        <h2>For a Closer Look, Explore Our Detailed Walkaround Video of the {{$car->model}}</h2>
        <div style="padding:56.25% 0 0 0;position:relative">
            <iframe
                src="https://www.youtube.com/embed/{{ substr($car->video, strrpos($car->video, '/') + 1) }}"
                style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
    </section>
    @include('partials.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="/js/index.js"></script>
</html>