@php
    $hero = data_get($content ?? [], 'hero', []);
    $stats = data_get($content ?? [], 'stats', []);
    $features = data_get($content ?? [], 'features', []);
    $roleCards = data_get($content ?? [], 'roles', []);
    $plans = collect($stripePlans ?? [])->isNotEmpty()
        ? $stripePlans
        : data_get($content ?? [], 'plans', []);
    $logoFiles = data_get($content ?? [], 'logos', []);
    $featuredJobs = $featuredJobs ?? collect();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'NovaHire') }}</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="NovaHire is an AI-first recruiting platform helping teams hire faster with structured screening and automated workflows.">
    <meta name="keywords" content="recruiting, AI screening, hiring platform, applicant tracking system, ATS">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? config('app.name', 'NovaHire') }}">
    <meta property="og:description" content="NovaHire is an AI-first recruiting platform helping teams hire faster with structured screening and automated workflows.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/logo/novahire-mark.svg') }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? config('app.name', 'NovaHire') }}">
    <meta name="twitter:description" content="NovaHire is an AI-first recruiting platform helping teams hire faster with structured screening and automated workflows.">
    <meta name="twitter:image" content="{{ asset('images/logo/novahire-mark.svg') }}">

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "name": "{{ config('app.name', 'NovaHire') }}",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ route('jobs.index') }}?search={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ config('app.name', 'NovaHire') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo/novahire-mark.svg') }}"
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @include('partials.vite-assets', ['jsEntry' => 'resources/js/public.js'])
    @livewireStyles
    <style>
        html {
            font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
        }

        @keyframes marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = saved ? saved === 'dark' : prefersDark;
            if (isDark) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>

<body
    class="bg-slate-50 text-[17px] text-slate-900 antialiased transition-colors dark:bg-slate-950 dark:text-slate-100">
    <div class="min-h-screen">
        <x-landing.header :app-name="config('app.name', 'NovaHire')" />

        <main class="relative overflow-x-clip">
            <x-landing.hero :hero="$hero" :stats="$stats" :roles="$roleCards" :features="$features" />
            <x-landing.jobs-market :jobs="$featuredJobs" />
            <x-landing.logo-strip :logos="$logoFiles" />
            <x-landing.features :features="$features" />
            <x-landing.roles :roles="$roleCards" />
            <x-landing.showcase />
            <x-landing.reviews />
            <x-landing.pricing :plans="$plans" />
        </main>

        <x-landing.footer />
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('theme-toggle');
            if (toggle) {
                toggle.addEventListener('click', () => {
                    document.documentElement.classList.toggle('dark');
                    const isDark = document.documentElement.classList.contains('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                });
            }
        });
    </script>
    @livewireScripts
</body>

</html>
