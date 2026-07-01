@props(['variant' => 'light'])

@php
$wrapperClasses = $variant === 'dark'
    ? 'border-white/10 bg-[#111111] text-white shadow-[0_20px_60px_-25px_rgba(255,255,255,0.18)]'
    : 'border-neutral-200 bg-[#fcfdfa] text-neutral-900 shadow-[0_20px_60px_-25px_rgba(0,0,0,0.16)]';
$eyebrowClasses = $variant === 'dark' ? 'text-neutral-400' : 'text-neutral-500';
$titleClasses = $variant === 'dark' ? 'text-white' : 'text-neutral-900';
$descriptionClasses = $variant === 'dark' ? 'text-neutral-300' : 'text-neutral-600';
$linkClasses = $variant === 'dark' ? 'text-white hover:text-neutral-200' : 'text-neutral-900 hover:text-neutral-600';
@endphp

<div class="w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-16 py-8 md:py-12">
    <div class="rounded-[28px] border px-6 py-7 md:px-8 md:py-8 {{ $wrapperClasses }}">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-[11px] font-semibold uppercase tracking-[0.25em] {{ $eyebrowClasses }}">Contact us</p>
                <h3 class="mt-3 text-2xl font-semibold tracking-tight {{ $titleClasses }}">Need a fast reply? We’re here to help.</h3>
                <p class="mt-3 text-sm leading-relaxed {{ $descriptionClasses }}">Reach us directly with either of these emails whenever you want to discuss a project, ask a question, or book a call.</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:gap-4">
                <a href="mailto:Squareone474@gmail.com" class="inline-flex items-center justify-center rounded-full border border-current/20 px-4 py-2.5 text-sm font-semibold transition {{ $linkClasses }}">
                    Squareone474@gmail.com
                </a>
                <a href="mailto:Squareonewww.hot@gmail.com" class="inline-flex items-center justify-center rounded-full border border-current/20 px-4 py-2.5 text-sm font-semibold transition {{ $linkClasses }}">
                    Squareonewww.hot@gmail.com
                </a>
            </div>
        </div>
    </div>
</div>
