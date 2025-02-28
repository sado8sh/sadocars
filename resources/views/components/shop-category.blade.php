<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"><link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
@props(['category'])
<style>
    header{
    height: 100vh;
    min-height: 40em;
    background: url({{$category['img']}}) no-repeat center;
    background-size: cover;
}
.header-body{
    flex-direction: column;
    text-align: center;
    height: 90%;
    padding: 0 2em;
}
.header-body p{
    padding-top: 27%;
    margin: 1em auto 3em auto;
}
.title{
    font-size: 3.4em;
    color: #fff;
    margin: 0.3em 0;
}
@keyframes arrow {
    40% {transform: translateY(0px);}
    45% {transform: translateY(8px);}
    55% {transform: translateY(0px);}
    60% {transform: translateY(8px);}
    65% {transform: translateY(0px);}
    100% {transform: translateY(8px);}
}
@media screen and (max-width:850px){
    .header-body p{
        padding-top: 60%;
        margin: 1em auto 3em auto;
    }
}
@media screen and (max-width: 450px) {
    html {
        font-size: 14px;
    }
    .header-body p{
        padding-top: 10%;
        margin: 1em auto 3em auto;
    }
}
</style>
<header>
    @include('partials.nav')
    <div class="header-body">
        <h1 class="title" data-aos="fade-down">{{$category['title']}} Cars</h1>
        <p data-aos="fade-up">{{$category['description']}}</p>
    </div>
</header>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>