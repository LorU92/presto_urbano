
<div class="col-12 col-md-2 eventotitle-custom">
    <div>
        <img src="{{ $article->img == 'default' ? asset('img/default.png') : Storage::url($article->img)}}" class="card-img-top">
    </div>
</div>
<div class="col-12 col-md-5 eventotitle-custom">
    <h1 class="titleevento">{{$article->title}}</h1>
    <h3 class="sottotitleevento">{{$article->price}} € </h3>
    <button class="button-news">
        <a href="{{route('show.article', compact('article'))}}"><h4>LEGGI TUTTO<h4></a>
        </button>
    </div>
    <div class="col-12 col-md-5 eventotext-custom">{{Str::limit($article->description, 300)}}</div>
    <div class="linea"></div>
    
    