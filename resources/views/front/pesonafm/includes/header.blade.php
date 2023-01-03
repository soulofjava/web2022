<nav class="hidden lg:flex items-center justify-between flex-wrap bg-red-500 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <a href="{{url('/')}}">
      <img src="{{ asset('assets/front/pesonafm/Radio Pesona 2 red bg.jpg') }}" class="scale-125 sm:scale-150">
    </a>
    <a href="{{url('/')}}">
      <h1 class="text-3xl font-bold text-center mx-10"> <span class=" from-white "> 92.1 FM Radio Pesona</span>
      </h1>
    </a>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      <div class="flex space-x-4 font-medium sm:text-lg">
        <a href="{{url('/newsall')}}" class="hover:scale-125  text-white">News</a>
        <a href="{{url('/photos')}}" class="hover:scale-125 text-white">Tips & Trick</a>
        <a href="https://api.whatsapp.com/send?phone=6282323839996" target="_blank"
          class="hover:scale-125 text-white">Contact</a>
      </div>
    </div>
    <div>
      <a href="{{ url('/login') }}"
        class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Login</a>
    </div>
  </div>
</nav>