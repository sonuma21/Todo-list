<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/src/styles.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">


</head>

<body class="flex flex-col min-h-screen">
    @include('sweetalert::alert')

    <header class="sticky top-0 z-50">
        <x-frontend-navbar />
    </header>
    <main class="flex-grow">
        {{ $slot }}
    </main>
    <footer >
        <x-frontend-footer />
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 100
                },
                color: {
                    value: '#491534'
                },
                shape: {
                    type: 'star'
                },
                opacity: {
                    value: 0.5,
                    random: true
                },
                size: {
                    value: 5,
                    random: true
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: true,
                    out_mode: 'bounce'
                }
            },
            interactivity: {
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    }
                },
                modes: {
                    grab: {
                        distance: 200, // Distance from cursor where particles are affected
                        line_linked: {
                            opacity: 1 // Opacity of the connecting lines
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>
