{{-- form per cambiare lingua --}}
<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="btn bg-transparent">
        <img src="{{ asset('vendor/blade-flags/country-' . $lang . '.svg') }}" width="20" height="20" alt="flags">
    </button>
</form>