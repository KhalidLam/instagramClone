@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-3 p-5">
            <img src="img/img1.jpg" class="rounded-circle">
        </div>

        <div class="col-9 pt-5">
            <div><h1>FreeCodeCamp</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>22,523</strong> posts</div>
                <div class="pr-5"><strong>51,7m</strong> followers</div>
                <div class="pr-5"><strong>30</strong> following</div>
            </div> 
            <div class="pt-4 font-weight-bold ">9GAG: Go Fun The World</div>
            <div>
                🌟 Get our app for the latest and funniest MEMES and VIDEOS 👉🏻@9gagmobile
                <br>
                -
                <br>
                Get your hamster tissue box cover 🐹 by @takemymoney👇🏻
            </div>
            <div class="font-weight-bold"><a href="https://bit.ly/hamsterbox">https://bit.ly/hamsterbox</a> </div>
        
        </div>
        
        <div class="row pt-5">
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=1" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=2" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=3" class="w-100">
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=4" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=5" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://picsum.photos/320/290?random=6" class="w-100">
            </div>
        </div>
    </div>
</div>
@endsection
