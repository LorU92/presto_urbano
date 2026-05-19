<x-layout>
    
    <!-- REGISTRATI titolo -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.register')}}</h1>
        <div class="linea"></div>
        <!-- REGISTRATI -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                
                {{-- FORM --}}
                {{-- ELEMENTI LATO BACKEND DI UN FORM:
                NEGLI INPUT
                1. ATTRIBUTO NAME - ETICHETTA
                NEL TAG DI APERTURA DEL FORM
                2. ATTRIBUTO METHOD - VALORE GET O POST 
                3. ATTRIBUTO ACTION - VALORE ROTTA DELLA FUNZIONE CHE DEVE SCATTARE NEL MOMENTO IN CUI IL CLIENTE CLICCA IL BOTTONE / SI RICHIAMA ATTRAVERSO LA ROTTA POST. NON RICHIAMI DIRETTAMENTE LA LOGICA (CONTROLLER) MA LA ROTTA.
                4. ATTIBUTO ENCTYPE - CONSENTE PASSAGGIO DI DATI COMPLESSI COME I FILE
                csrf (cross site request forgery--}}
                
                {{-- rotta --}}
                <form class="p-5 my-5 form-custom rounded" 
                method="POST" 
                action="{{route('register')}}">
                @csrf

                {{-- input name --}}
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                {{-- input email --}}
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                {{-- input password --}}
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                {{-- input password confirmation --}}
                <div class="form-group">
                    <label for="password_confirmation">CONFIRM PASSWORD</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                {{-- tasto registrati --}}
                <div class="d-flex justify-content-center">
                    <div class="col-6">
                        <button type="submit" class="btn btn-button-custom form-label-custom">{{__('ui.register')}}</button>
                    </div>
                </div>

                {{-- tasto rimando login --}}
                <div class="col-6">
                    <p class="btn btn-link">{{__('ui.haveAccount')}}
                        <a href="{{ route('login') }}">{{__('ui.login')}}</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
    
    
</x-layout>