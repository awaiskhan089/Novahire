@props(['logos' => []])

@php
    $curatedLogos = config('partners.uk', []);

    $incomingLogos = collect($logos)
        ->filter()
        ->map(function ($logo): array {
            if (is_array($logo)) {
                return [
                    'name' => (string) ($logo['name'] ?? 'Partner'),
                    'path' => (string) ($logo['path'] ?? ''),
                ];
            }

            return [
                'name' => 'Partner',
                'path' => (string) $logo,
            ];
        })
        ->filter(fn (array $logo): bool => $logo['path'] !== '')
        ->values();

    $looksLikeLegacyPlaceholderSet = $incomingLogos->isEmpty()
        || $incomingLogos->contains(
            fn (array $logo): bool => str_starts_with($logo['path'], '/images/brand/brand-')
        );

    $displayLogos = ($looksLikeLegacyPlaceholderSet ? collect($curatedLogos) : $incomingLogos)
        ->take(40)
        ->values();

    $rowSplitIndex = (int) ceil($displayLogos->count() / 2);
    $firstRow = $displayLogos->slice(0, $rowSplitIndex)->values();
    $secondRow = $displayLogos->slice($rowSplitIndex)->values();

    if ($secondRow->isEmpty()) {
        $secondRow = $firstRow;
    }

    $firstTrack = $firstRow->merge($firstRow)->values();
    $secondTrack = $secondRow->merge($secondRow)->values();
@endphp

<section class="cv-auto relative overflow-hidden border-y border-slate-200/70 bg-white/60 py-14 backdrop-blur dark:border-slate-800/80 dark:bg-slate-950/60">
    <div class="pointer-events-none absolute inset-0 opacity-40">
        <div class="absolute -left-24 top-10 h-72 w-72 rounded-full bg-brand-500/10 blur-3xl"></div>
        <div class="absolute -right-24 -bottom-10 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>
    </div>
    <div class="relative nh-container">
        <h2 data-animate="reveal" class="nh-reveal text-center">
            <span class="nh-logo-trust-title">Trusted by modern UK hiring teams</span>
        </h2>
        <div class="nh-logo-marquee mt-7">
            <div class="nh-logo-marquee-row">
                <div class="nh-logo-marquee-track nh-logo-marquee-track-left">
                    @foreach($firstTrack as $logo)
                        <div class="nh-logo-marquee-item">
                            <div class="nh-logo-orbit-card">
                                <img src="{{ $logo['path'] }}"
                                    alt="{{ $logo['name'] }} logo"
                                    width="120" height="40"
                                    loading="lazy"
                                    decoding="async"
                                    class="nh-logo-brand">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="nh-logo-marquee-row">
                <div class="nh-logo-marquee-track nh-logo-marquee-track-right">
                    @foreach($secondTrack as $logo)
                        <div class="nh-logo-marquee-item">
                            <div class="nh-logo-orbit-card">
                                <img src="{{ $logo['path'] }}"
                                    alt="{{ $logo['name'] }} logo"
                                    width="120" height="40"
                                    loading="lazy"
                                    decoding="async"
                                    class="nh-logo-brand">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
