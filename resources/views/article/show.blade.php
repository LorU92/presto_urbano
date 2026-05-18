<x-layout>
    
    <!-- section annunci -->
    <section class="container">
        <h1 class="evento-custom">{{$article->title}}</h1>
        <!-- annunci row -->
        <div class="linea"></div>
        {{-- carousel --}}
        <div class="row">
            <div class="col-12 col-md-6 col-mb-3 py-5">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://picsum.photos/600/400" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://picsum.photos/600/400" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://picsum.photos/600/400" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>                
            </div>
            <div class="col-12 col-md-6 col-mb-3 py-5 ">
                <h2 class="display-5"><span class="titleevento">{{$article->title}}</span></h2>
                <div class="d-flex justify-content-center flex-column">
                    <h3 class="">{{__('ui.price')}}</h3>
                    <h2 class="">{{$article->price}} €</h2>
                    <h3 class="">{{__('ui.description')}}</h3>
                    <p class="sottotitleevento">{{$article->description}}</p>
                </div>
            </div>
        </div> 
    </section>
    <!-- footer -->
    <x-footer></x-footer>
    
</x-layout>