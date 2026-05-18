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
                    <div class="mb-3">
                        <label for="title" class="form-label form-label-custom">{{__('ui.titleArticle')}}</label>
                        <input type="text" class="form-control form-control-custom" id="title" wire:model.debounce.150ms="title">

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('title') {{ $message }} 
                                @enderror
                            </div>

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label form-label-custom">{{__('ui.description')}}</label>
                        <textarea class="form-control form-control-custom" id="description" cols="30" rows="10" wire:model.debounce.150ms="description"></textarea>

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('description') {{ $message }} 
                                @enderror
                            </div>
                            
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label form-label-custom">{{__('ui.price')}}</label>
                        <input type="text" class="form-control form-control-custom" id="price" wire:model.debounce.150ms="price">

                        {{-- MESSAGGIO DI ERRORE di validazione - Livewire --}}
                            <div>
                                @error('price') {{ $message }} 
                                @enderror
                            </div>
                            
                    </div>
                    <div class="mb-3">
                        <select wire:model="category" id="category" class="form-control form-control-custom">
                            <option label>{{__('ui.selectCategory')}}</option>
                            @foreach ($categories as $category)
                                <option class="text-uppercase" value="{{$category->id}}">{{__("ui.$category->name")}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-button-custom form-label-custom">{{__('ui.publishArticle')}}</button>
                    </div>
                </div>
            </form>
        </div>
    <div class="linea"></div>
</div>
