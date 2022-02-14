<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') |
        @endif
        {{ config('app.name') }}
    </title>

    <livewire:styles/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
   
    

    
</head>
<body>
    <livewire:layouts.nav/>

    <main class="container my-3">
        @hasSection('content')
            @yield('content')
        @else
        <div class="container">
            @yield('content')
        </div>
        @endif
    </main>
    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="https://www.facebook.com/profile.php?id=100017197869080"
              role="button"
              data-mdb-ripple-color="dark"
              target="_blank"
              ><i class="fa-brands fa-facebook"></i>

            </a>
      
            <!-- Linkedin -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="https://hr.linkedin.com/in/rade-jasenovcanin-545184204"
              role="button"
              data-mdb-ripple-color="dark"
              target="_blank"
              ><i class="fab fa-linkedin"></i
            ></a>
            <!-- Github -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="https://github.com/rade901"
              role="button"
              data-mdb-ripple-color="dark"
              target="_blank"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © <?php echo date("Y");?> Copyright:
            {{ config('app.name') }}
          </div>
        <!-- Copyright -->
      </footer>
    <livewire:scripts/>
    <livewire:modals/>
   
    <script src="{{ asset('js/app.js') }}"></script>
    
    
    
</body>
</html>
