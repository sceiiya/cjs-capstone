<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Testing CJS Laravel + TailwindCSS</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test TailwindCSS!
        </h1>
        <p class="p-8 text-white bg-slate-700 ">If the changes in classes is no t changing the design, go to your terminal na nagrrun ng npm run dev.. press q then enter command npm run dev lang ulit</p>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<swiper-container class="bg-green-200 p-2 m-4">
  <swiper-slide class="bg-violet-900">Slide 1</swiper-slide>
  <swiper-slide class="bg-red-600">Slide 2</swiper-slide>
  <swiper-slide class="bg-green-500">Slide 3</swiper-slide>
  <swiper-slide class="bg-orange-600">Slide ...</swiper-slide>
</swiper-container>
    </body>
</html>
