<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif




  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


          <footer
              class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
              <p class="ml-2">This project was developed with an educational purpose</p>
              @if (!Auth::check())
{{--              <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Open Ticket</a>--}}
              @endif
          </footer>


  </div>

  <div class="mt-6 p-4">

  </div>
</x-layout>
