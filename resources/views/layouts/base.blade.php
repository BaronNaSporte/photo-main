<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='title' content='{{ $meta_title ?? "meta-заголовок"}}'>
    <meta name="description" content='{{ $meta_description ?? "meta-описание"}}'>
    <meta name="keywords" content="{{ $meta_keywords ?? 'meta-вдоте'}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body class="bg-[url('unsplash.jpg')] bg-cover" x-data="{ openMenu : false }"
    :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @include('components.partials.header')

    @include('web.sections.intro.index')
    @include('layouts.all')
    @include('reviews.index')

    @include('components.partials.footer')
</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</html>
