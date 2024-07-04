<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '4RCE Builders' }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* width */
        .scrollContent::-webkit-scrollbar {
            width: 1px !important;
        }

        /* Track */
        .scrollContent::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        .scrollContent::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        .scrollContent::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    @vite('resources/css/app.css')
    @livewireStyles
    @filamentStyles
</head>

<body class="bg-[#F1F1F1]">
    {{ $slot }}

    @filamentScripts
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
