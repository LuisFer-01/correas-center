<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Inline script to detect system dark mode preference and apply it immediately --}}
    <script>
        (function() {
            const appearance = '{{ $appearance ?? "system" }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Inline style to set the HTML background color based on our theme in app.css --}}
    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    @fonts

    {{-- ✅ Google Analytics 4 - Carga inicial del script --}}
    @if(env('VITE_GOOGLE_ANALYTICS_ID') && env('VITE_GOOGLE_ANALYTICS_ID') !== 'G-XXXXXXXXXX')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('VITE_GOOGLE_ANALYTICS_ID') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ env('VITE_GOOGLE_ANALYTICS_ID') }}', {
            page_path: window.location.pathname,
            send_page_view: true
        });
    </script>
    @endif

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])

    @inertiaHead
</head>
<body class="font-sans antialiased">
    @inertia
</body>
</html>
