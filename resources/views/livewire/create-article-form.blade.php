<div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                {{-- FORM --}}
                {{-- FORM LIVEWIRE:
                NEGLI INPUT
                1. NO ACTION
                2. NO METHOD
                3. ATTIBUTO ENCTYPE - CONSENTE PASSAGGIO DI DATI COMPLESSI COME I FILE
                4. WIRE:SUBMIT.PREVENT - COLLEGO UN ACTION
                5. WIRE:MODEL - RIFERIMENTO ATTRIBUTO

                csrf (cross site request forgery--}}
                
                <form class="p-5 my-5 form-custom rounded" 
                    enctype="multipart/form-data" 
                    wire:submit.prevent="store">
                    @csrf

                    {{-- TITOLO --}}
                    <div class="mb-3">
                        <label for="title" class="form-label form-label-custom">{{__('ui.titleArticle')}}</label>
                        <input type="text" class="form-control form-control-custom" id="title" wire:model.debounce.150ms="title">

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('title') {{ $message }} 
                                @enderror
                            </div>
                    </div>

                    {{-- DESCRIZIONE --}}
                    <div class="mb-3">
                        <label for="description" class="form-label form-label-custom">{{__('ui.description')}}</label>
                        <textarea class="form-control form-control-custom" id="description" cols="30" rows="10" wire:model.debounce.150ms="description"></textarea>

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('description') {{ $message }} 
                                @enderror
                            </div>  
                    </div>

                    {{-- IMMAGINE --}}
                    {{-- Livewire - caricamento di più immagini in tempo reale - mostrando un anteprima --}}
                    {{-- Componenti:
                        1. multiple - upload di più immagini
                        2. accept - accetta solo immagini
                        3. wire:model.debounce.150ms - collega la variabile di Livewire temporary_image (vedi cotroller) --}}
                    <div class="mb-3">
                        <label for="image" class="form-label form-label-custom">{{__('ui.uploadImage')}}</label>
                        <input 
                            type="file" 
                            class="form-control form-control-custom @error('temporary_images.*') is-invalid @enderror" 
                            placeholder="img/" 
                            wire:model.debounce.150ms="temporary_images" 
                            multiple>
                        {{-- MESSAGGIO DI ERRORE di validazione --}}
                        @error('temporary_images.*') 
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                        {{-- MESSAGGIO DI ERRORE di validazione ulteriori immagini --}}
                        @error('temporary_images') 
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- SEZIONE ANTEPRIMA --}}
                    {{-- se la variabile $images non e vuota mostro l'anteprima --}}
                    @if(!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>PHOTO PREVIEW</p>
                            <div class="row">
                                {{-- per ogni immagine in $image mostro l'anteprima --}}
                                @foreach ($images as $key => $image)
                                <div class="col d-flex flex-column align-items-center my-3">
                                    {{-- url temporaneo di Livewire per mostrare l'anteprima prima del salvataggio --}}
                                    <div class="img-preview mx-auto"
                                        style="background-image: url({{ $image->temporaryUrl() }})">
                                    </div>
                                    <button type="button" class="btn btn-button-custom mt-2" wire:click="removeImage({{ $key }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- PREZZO --}}
                    <div class="mb-3">
                        <label for="price" class="form-label form-label-custom">{{__('ui.price')}}</label>
                        <input type="text" class="form-control form-control-custom" id="price" wire:model.debounce.150ms="price">

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('price') {{ $message }} 
                                @enderror
                            </div>    
                    </div>

                    {{-- CATEGORIA --}}
                    <div class="mb-3">
                        <select wire:model="category" id="category" class="form-control form-control-custom">
                            <option label>{{__('ui.selectCategory')}}</option>
                            @foreach ($categories as $category)
                                <option class="text-uppercase" value="{{$category->id}}">{{__("ui.$category->name")}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- PUBBLICA ARTICOLO --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-button-custom form-label-custom">{{__('ui.publishArticle')}}</button>
                    </div>
                </div>
            </form>
        </div>
    <div class="linea"></div>
</div>
