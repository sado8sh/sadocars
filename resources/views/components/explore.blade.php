@props(['info'])
<section class="explore-section">
    <div class="container">
        <div class="explore-content">
            <div class="explore-image" data-aos="fade-down">
                <img src={{$info['img']}} alt="SUVs" />
            </div>
            <div class="explore-description" data-aos="fade-down">
                <h2>Explore Our {{$info['title']}} Cars</h2>
                <p>{{$info['description']}}</p>
                <a href={{$info['link']}} class="explore-link">Explore Now &gt;</a>
            </div>
        </div>
    </div>
</section>