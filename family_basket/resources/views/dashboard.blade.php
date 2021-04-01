<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>        
    </x-slot>
    
    <br>

    <div class= "container">
      <div class="row">      
        <div class="col-sm-2 order-1 order-sm-2">
          @yield('nav')
        </div>        

       
        <div class="container-fluid col-sm-10 order-2 order-sm-1">
          @yield('main')
        </div>      
        
      </div>
      <footer class="text-center">
        <p>&copy; 2021 Shareppy Internacional derechos reservados</p>
      </footer>
    </div>    
    <script type="text/javascript">
      $('li a').click(function(e) {
        //e.preventDefault();
        var $this = $(this);
        $this.closest('ul').find('li.active,a.active').removeClass('active');
        $this.addClass('active');
        $this.parent().addClass('active');
      });
      //$(".nav .nav-link").on("click", function(){
        //$(".nav").find(".active").removeClass("active");
        //$(this).addClass("active");
      //});
    </script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    
</x-app-layout>