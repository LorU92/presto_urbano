
<div class="col-12 col-md-7 eventotitle-custom">
    <h1 class="titleevento">{{$article->title}}</h1>
    <h3 class="sottotitleevento">{{$article->price}} € </h3>
    <button class="button-news">
        <a href="{{route('show.article', compact('article'))}}"><h4>LEGGI TUTTO<h4></a>
    </button>
    <button class="button-news">
        {{-- rotta parametrica byCategory passando come parametro la cetegoria collegato all'articolo --}}
        <a href="{{route('byCategory', ['category' => $article->category])}}"><h4>{{$article->category?->name}}</h4></a>
    </button>
</div>
    <div class="col-12 col-md-5 eventotext-custom">{{Str::limit($article->description, 300)}}</div>
    <div class="linea"></div>
    
    