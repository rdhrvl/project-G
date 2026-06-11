<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('template/dist/assets/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/iconly/bold.css') }}">

{{--  Flux  --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('template/dist/assets/css/app.css') }}">
<link rel="stylesheet" href="app.css">
<link rel="shortcut icon" href="{{ asset('template/dist/assets/images/favicon.svgs') }}" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/css/app.css')
@livewireStyles
@fluxAppearance
