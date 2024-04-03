<footer class="bg-dark text-white">
    <div class="container py-4 d-flex justify-content-between">
      <div>
        <h6>&copy; {{ env('APP_AUTHOR', 'CLASS:117 ,TEAM 5') }} {{ now()->year }}</h6>
        <p  style="font-size: 10px" class="fw-lighter">We are the best, fuck the rest!</p>
      </div>
      <div>
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('images/icon-footer.svg') }}" alt="Logo" height="40">
        </a>
      </div>
    </div>
</footer>

