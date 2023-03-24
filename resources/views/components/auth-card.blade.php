<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="flex items-center justify-center ">
        <img src="{{asset('images/clic.jpg')}}" class="max-w-32 rounded-full max-h-32" alt="Descripción de la imagen">
      </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg border">
        {{ $slot }}
    </div>
</div>