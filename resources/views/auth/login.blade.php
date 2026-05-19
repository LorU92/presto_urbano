<x-layout>

 <!-- Login titolo -->
    <section class="container-fluid">
        <h1 class="evento-custom">ACCEDI</h1>
        <div class="linea"></div>
        <!-- LOGIN -->
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
                
                <form class="p-5 my-5 form-custom rounded" 
                method="POST" 
                action="{{route('login')}}">
                    @csrf

                    {{-- input email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"  name="email">
                    </div>

                    {{-- input password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">PASSWORD</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    {{-- tasto accedi --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-button-custom form-label-custom">{{__('ui.login')}}</button>
                    </div>

                    {{-- tasto rimando registrazione --}}
                    <div class="col-6">
                        <p class="btn btn-link">{{__('ui.noAccount')}} </br>
                        <a href="{{ route('register') }}">{{__('ui.register')}}</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>


</x-layout>