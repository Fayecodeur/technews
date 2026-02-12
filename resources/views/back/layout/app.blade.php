<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    {{-- Dashboard - Links --}}
    @include('back.partials.styles')
    {{-- Fin Dashbord Link --}}
</head>

<body>
    {{-- Main wrapper  --}}
    <div class="main-wrapper">
        {{-- Debut Header --}}
        @include('back.partials.header')
        {{-- Fin Header  --}}

        {{-- Debut Sidebar  --}}
        @include('back.partials.sidebar')
        {{-- Fin Sidebar  --}}

        {{-- Contenu de la page  --}}
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12 mt-5">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">@yield('header-title')</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        {{-- Fin Contenu de la page  --}}
    </div>
    {{-- Scripts dashboard  --}}
    @include('back.partials.scripts')
    {{-- Fin Script Dashboard  --}}
    @if(session('success'))
        <script>
            iziToast.success({
                title: 'Succès !',
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        </script>
    @endif



</body>

</html>
