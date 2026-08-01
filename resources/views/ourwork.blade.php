<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Work — Square One</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Plyr CSS & JS (Premium Video Player Integration) -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    
    <!-- GSAP Core & ScrollTrigger Core Engines -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    
    <style>
    
    .navbar_heading{
        font-family: "Montserrat", sans-serif !important;

        }
     *{
           font-family: "Inter Tight", sans-serif;
        }

        
        :root {
            --bg-page: #FCFDFA; 
            --plyr-color-main: #000000;
            --plyr-video-control-background-hover: rgba(0, 0, 0, 0.08);
        }
        body {
            background-color: var(--bg-page);
            color: #000000;
            font-optical-sizing: auto;
            font-variation-settings: "wdth" 100;
        }
        ::-webkit-scrollbar {
            display: none;
        }

        /* Plyr Interactive Background Overlay Modes */
        .bg-video-mode .plyr__controls,
        .bg-video-mode .plyr__volume {
            opacity: 0 !important;
            pointer-events: none !important;
            transition: opacity 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .interactive-mode .plyr__controls {
            opacity: 1 !important;
            pointer-events: auto !important;
        }
        
        /* High-Performance Smooth Marquee Layout System */
        .marquee-container {
            display: flex;
            overflow: hidden;
            user-select: none;
            width: 100%;
        }
        .marquee-wrapper {
            display: flex;
            white-space: nowrap;
            will-change: transform;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden flex flex-col justify-between relative">

    <!-- UNIVERSAL DEMO FORM MODAL -->
    @include('components.demo-modal')

    <!-- RESPONSIVE MOBILE NAVIGATION OVERLAY -->
    <div id="mobile-menu" class="fixed inset-0 w-full h-screen bg-black z-[999] hidden flex-col justify-between px-8 py-12 lg:hidden">
        <div class="flex justify-between items-center w-full">
            <span class="navbar_heading text-2xl font-extrabold tracking-tight text-white"><a href="{{ route('home') }}">S Q U A R E  O N E</a></span>
            <button id="menu-close-btn" class="p-2 text-white hover:text-neutral-400 transition focus:outline-none" aria-label="Close Menu">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <nav class="flex flex-col space-y-8 text-4xl font-bold tracking-tight text-left my-auto w-full">
            <a href="{{ route('services') }}" class="mobile-nav-link text-neutral-200 hover:text-white transition duration-300 flex items-center justify-between group py-2 border-b border-neutral-900">
                <span>Services</span> <span class="text-2xl text-neutral-500 group-hover:text-white transition">→</span>
            </a>
            <a href="{{ route('ourwork') }}" class="mobile-nav-link text-neutral-200 hover:text-white transition duration-300 flex items-center justify-between group py-2 border-b border-neutral-900">
                <span>Our work</span> <span class="text-2xl text-neutral-500 group-hover:text-white transition">→</span>
            </a>
            <a href="{{ route('whyus') }}" class="mobile-nav-link text-neutral-200 hover:text-white transition duration-300 flex items-center justify-between group py-2 border-b border-neutral-900">
                <span>Why us</span> <span class="text-2xl text-neutral-500 group-hover:text-white transition">→</span>
            </a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link text-neutral-200 hover:text-white transition duration-300 flex items-center justify-between group py-2 border-b border-neutral-900">
                <span>Pricing</span> <span class="text-2xl text-neutral-500 group-hover:text-white transition">→</span>
            </a>
        </nav>
        <div class="mobile-nav-footer w-full flex flex-col space-y-4 pt-6 border-t border-neutral-900">
            <button class="open-demo-trigger w-full bg-white text-black font-extrabold py-4 rounded-full text-center hover:bg-neutral-200 transition duration-300">
                Book a demo
            </button>
           
        </div>
    </div>

    <!-- MAIN INTERACTIVE HEADER -->
    <header class="w-full sticky top-0 z-50 px-6 md:px-12 py-5 bg-[#FCFDFA]">
        <div class="w-full mx-auto flex justify-between items-center gap-4 relative">
            
            <div class=" text-2xl font-extrabold tracking-tight text-black cursor-pointer shrink-0">
                <a  class="navbar_heading" href="{{ route('home') }}">  S Q U A R E  O N E</a>
            </div>
            
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8 text-sm font-semibold text-neutral-500 whitespace-nowrap overflow-hidden">
                <a href="{{ route('services') }}" class="hover:text-black transition duration-200">Services</a>
                <a href="{{ route('ourwork') }}" class="text-black transition duration-200">Our work</a>
                <a href="{{ route('whyus') }}" class="hover:text-black transition duration-200">Why us</a>
                <a href="{{ route('pricing') }}" class="hover:text-black transition duration-200">Pricing</a>
            </nav>
            
            <div class="flex items-center space-x-4 shrink-0">
              
                <button class="open-demo-trigger hidden sm:inline-block bg-black text-white font-bold px-6 py-2.5 rounded-full text-sm hover:bg-neutral-800 transition duration-300 shadow-md">
                    Book a demo
                </button>

                <button id="menu-open-btn" class="lg:hidden flex items-center justify-center p-2 text-black hover:text-neutral-600 transition focus:outline-none z-40" aria-label="Open Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

        </div>
    </header>

    <!-- CONTENT BODY SECTION GRID -->
    <main class="w-full flex-grow relative overflow-hidden p-0">
        
        <!-- SECTION 1: CINEMATIC PLYR WORK HERO CONTAINER -->
        <section id="our-work-hero" class="w-full bg-[#FCFDFA] pt-12 md:pt-16 pb-12 overflow-hidden relative">
            <div class="w-full mx-auto px-6 md:px-12 lg:px-16 flex flex-col items-center justify-center">
                
                <div id="cinema-video-container" class="w-full max-w-5xl rounded-2xl md:rounded-3xl overflow-hidden bg-zinc-900 shadow-[0_20px_55px_-15px_rgba(0,0,0,0.07)] border border-zinc-200/30 relative bg-video-mode group">
                    <div class="w-full h-[320px] sm:h-[460px] md:h-[600px] relative" id="plyr-container-box">
                        <video id="player" class="w-full h-full object-cover object-center" crossorigin playsinline autoplay muted loop>
                            <source src="{{ asset('assets/img/video1.mp4') }}" type="video/mp4">
                        </video>
                        
                        <!-- Floating Micro Pill Overlay Unmute Trigger Button -->
                        <div id="video-unmute-overlay" class="absolute inset-0 bg-black/10 flex items-center justify-center cursor-pointer transition-all duration-500 z-20 group-hover:bg-black/20">
                            <button class="bg-white/95 text-black font-semibold text-xs md:text-sm px-6 py-3 rounded-full flex items-center gap-2.5 shadow-xl hover:bg-white hover:scale-105 transition active:scale-95 border border-zinc-100">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77zM4.03 5.71L3 6.74 7.3 11H3v2h4l5 5v-6.3l4.3 4.3c-.39.29-.81.54-1.3.72v2.04c1.03-.22 1.97-.67 2.79-1.28l2.5 2.5 1.03-1.03L4.03 5.71zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                                
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 2: ADAPTIVE REAL VECTOR MARQUEE SHOWCASE (Autoplay + Scroll Speed Override Loop) -->
        <section id="brand-marquee-showcase" class="w-full bg-[#FCFDFA] py-16 md:py-20 border-t border-zinc-100/30">
            <div class="w-full text-center px-6 mb-12 md:mb-16">
                <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-[34px] font-normal tracking-tight max-w-4xl mx-auto text-neutral-900 leading-tight">
                    Selected live work from our recent client portfolio—real websites, storefronts, and digital experiences built to perform.
                </h3>
                <span class="text-[10px] md:text-xs font-bold tracking-[0.25em] uppercase text-neutral-400 block mt-10 md:mt-12">
                    TRUSTED BY THE WORLD'S BIGGEST BRANDS
                </span>
            </div>

            <!-- Custom Continuous Marquee Container Loop Layer -->
            <div class="marquee-container opacity-85 hover:opacity-100 transition-opacity duration-300">
                <div class="marquee-wrapper gap-10 md:gap-16 pr-10 md:pr-16 flex items-center">
                    <div class="flex items-center gap-8 md:gap-12 shrink-0">
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">WolaNin Aesthetics</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">YY Aesthetics</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Laser Zentrum Heidelberg</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Asandra MD</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Lvate</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Our Real Success</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">High Key Agency</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Roof Plumber Sydney</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Ammanah Legal</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Scribble MH</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Miras</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Rawayat</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Laam</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Echelon Financial</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Yingli Solar</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Sundial Home</span>
                    </div>
                    <div class="flex items-center gap-8 md:gap-12 shrink-0" aria-hidden="true">
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">WolaNin Aesthetics</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">YY Aesthetics</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Laser Zentrum Heidelberg</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Asandra MD</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Lvate</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Our Real Success</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">High Key Agency</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Roof Plumber Sydney</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Ammanah Legal</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Scribble MH</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Miras</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Rawayat</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Laam</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Echelon Financial</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Yingli Solar</span>
                        <span class="text-sm md:text-lg font-semibold tracking-wide text-neutral-700">Sundial Home</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- PREMIUM RESPONSIVE 8-PROJECT SCREEN BLOCK MATRIX -->
        <section id="interactive-projects-showcase" class="w-full bg-[#FCFDFA] relative overflow-hidden border-t border-zinc-200/40">
            
            <!-- ROW 1 (Projects 1 & 2) -->
            <div class="w-full min-h-[60vh] lg:h-screen grid grid-cols-1 lg:grid-cols-2 border-b border-zinc-200/30">
                <!-- Project 1: WolaNin Aesthetics -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden border-b lg:border-b-0 lg:border-r border-zinc-200/40 bg-[#FF5200] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="wolanin">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full grid grid-cols-2 grid-rows-2 p-4 gap-4 bg-[#FF5200] transition-all duration-500">
                            <div class="rounded-xl overflow-hidden shadow-md bg-[#e24900]"><img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover" alt="WolaNin Aesthetics"></div>
                            <div class="rounded-xl overflow-hidden shadow-md bg-[#e24900]"><img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover" alt="WolaNin Aesthetics"></div>
                            <div class="rounded-xl overflow-hidden shadow-md bg-[#e24900]"><img src="https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover" alt="WolaNin Aesthetics"></div>
                            <div class="rounded-xl overflow-hidden shadow-md bg-[#e24900]"><img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover" alt="WolaNin Aesthetics"></div>
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/50 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#FF5200] bg-white px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">Luxury aesthetics website with a refined booking experience</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We built a polished WordPress experience for a premium aesthetics brand with clear service messaging and a smoother lead journey.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-[#FF5200] mr-1.5">●</span> WordPress</div>
                                    <div><span class="text-[#FF5200] mr-1.5">●</span> Booking Flow</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-black/20 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">01 / WordPress</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">WolaNin Aesthetics</h3>
                        <a href="https://wolanin-aesthetics.de/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>

                <!-- Project 2: YY Aesthetics -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden bg-[#00A4EF] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="yyaesthetics">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#004B87] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1616469829581-73993eb86b02?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover brightness-95" alt="YY Aesthetics">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/50 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#00A4EF] bg-white px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">A modern multilingual site for a premium aesthetics practice</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We delivered a polished multilingual WordPress build focused on trust, clarity, and conversion for an international aesthetic brand.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-[#00A4EF] mr-1.5">●</span> WordPress</div>
                                    <div><span class="text-[#00A4EF] mr-1.5">●</span> Multilingual</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-black/20 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">02 / WordPress</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">YY Aesthetics</h3>
                        <a href="https://yyaesthetics.com/en/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>
            </div>

            <!-- ROW 2 (Projects 3 & 4) -->
            <div class="w-full min-h-[60vh] lg:h-screen grid grid-cols-1 lg:grid-cols-2 border-b border-zinc-200/30">
                <!-- Project 3: Laser Zentrum Heidelberg -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden border-b lg:border-b-0 lg:border-r border-zinc-200/40 bg-[#111111] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="laserzentrum">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#222222] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover opacity-80" alt="Laser Zentrum Heidelberg">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/60 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-white bg-neutral-800 px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">Medical website crafted for trust and clarity</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We shaped a clean, modern WordPress website for a medical clinic focused on patient confidence and local discovery.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-neutral-400 mr-1.5">●</span> WordPress</div>
                                    <div><span class="text-neutral-400 mr-1.5">●</span> Medical</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">03 / WordPress</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Laser Zentrum Heidelberg</h3>
                        <a href="https://laserzentrum-heidelberg.de/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>

                <!-- Project 4: Miras -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden bg-[#635BFF] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="miras">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#4d44e0] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover brightness-90" alt="Miras">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/50 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#635BFF] bg-white px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">Shopify storefront crafted for a fashion-first brand</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We helped shape a strong Shopify experience focused on product storytelling, visual clarity, and smoother conversions.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-[#635BFF] mr-1.5">●</span> Shopify</div>
                                    <div><span class="text-[#635BFF] mr-1.5">●</span> Conversion</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-black/20 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">04 / Shopify</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Miras</h3>
                        <a href="https://miras.com.pk/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>
            </div>

            <!-- ROW 3 (Projects 5 & 6) -->
            <div class="w-full min-h-[60vh] lg:h-screen grid grid-cols-1 lg:grid-cols-2 border-b border-zinc-200/30">
                <!-- Project 5: Rawayat -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden border-b lg:border-b-0 lg:border-r border-zinc-200/40 bg-[#FF5A5F] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="rawayat">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#e14f53] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Rawayat">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/50 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#FF5A5F] bg-white px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">Lifestyle storefront with stronger product presentation</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We shaped a polished Shopify build that made the brand feel more premium while improving product focus and shopping clarity.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-[#FF5A5F] mr-1.5">●</span> Shopify</div>
                                    <div><span class="text-[#FF5A5F] mr-1.5">●</span> Lifestyle</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-black/20 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">05 / Shopify</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Rawayat</h3>
                        <a href="https://rawayat.com.pk/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>

                <!-- Project 6: Laam -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden bg-[#58CC02] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="laam">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#4cb102] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Laam">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/50 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#58CC02] bg-white px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">A clean, conversion-focused retail storefront</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We built a streamlined Shopify experience that made the brand feel modern while improving browsing and purchase flow.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-[#58CC02] mr-1.5">●</span> Shopify</div>
                                    <div><span class="text-[#58CC02] mr-1.5">●</span> Retail</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-black/20 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">06 / Shopify</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Laam</h3>
                        <a href="https://laam.pk/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>
            </div>

            <!-- ROW 4 (Projects 7 & 8) -->
            <div class="w-full min-h-[60vh] lg:h-screen grid grid-cols-1 lg:grid-cols-2">
                <!-- Project 7: Asandra MD -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden border-b lg:border-b-0 lg:border-r border-zinc-200/40 bg-[#111111] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="asandra">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#1c1c1c] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover grayscale brightness-90 contrast-125" alt="Asandra MD">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/60 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-white bg-neutral-800 px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">A custom medical website built with strong trust signals</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We delivered a polished custom website experience for a healthcare brand with strong messaging, authority, and conversion focus.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-neutral-400 mr-1.5">●</span> Custom</div>
                                    <div><span class="text-neutral-400 mr-1.5">●</span> Healthcare</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">07 / Custom</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Asandra MD</h3>
                        <a href="https://asandra-md.com/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>

                <!-- Project 8: Echelon Financial -->
                <div class="project-column group relative h-[65vh] lg:h-full overflow-hidden bg-[#0A0A0A] flex flex-col justify-between p-8 md:p-14 text-white cursor-pointer" data-project="echelon">
                    <div class="absolute inset-0 z-0 scale-100 transition-transform duration-700 ease-out group-hover:scale-[1.02] overflow-hidden">
                        <div class="project-media-grid w-full h-full bg-[#151515] relative transition-all duration-500">
                            <img src="https://images.unsplash.com/photo-1617814076367-b759c7d7e738?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Echelon Financial">
                        </div>
                        <div class="project-blur-layer absolute inset-0 bg-black/60 backdrop-blur-xl opacity-0 pointer-events-none transition-all duration-500 flex flex-col justify-center px-6 md:px-16 text-left">
                            <div class="max-w-md space-y-4 transform translate-y-6 transition-transform duration-500 project-info-text">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-zinc-400 bg-white/10 px-3 py-1 rounded-full">Live Project</span>
                                <h3 class="text-2xl md:text-4xl font-normal text-white font-serif">A premium custom website for a financial services brand</h3>
                                <p class="text-xs md:text-sm text-zinc-200 leading-relaxed font-light">We built a polished experience focused on trust, authority, and clear conversion paths for a financial services client.</p>
                                <div class="pt-2 flex items-center gap-4 text-[11px] font-bold tracking-wider uppercase text-white">
                                    <div><span class="text-zinc-500 mr-1.5">●</span> Custom</div>
                                    <div><span class="text-zinc-500 mr-1.5">●</span> Finance</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 flex justify-between items-center w-full project-header-meta">
                        <span class="text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">08 / Custom</span>
                    </div>
                    <div class="custom-hover-circle absolute pointer-events-none opacity-0 scale-50 bg-white text-black font-semibold text-xs rounded-full hidden lg:flex items-center justify-center shadow-2xl z-30 transition-all duration-300 ease-out" style="width: 90px; height: 90px; transform: translate(-50%, -50%);">
                        <span class="circle-text font-bold">Visit</span>
                    </div>
                    <div class="relative z-10 w-full pt-12 project-footer-meta">
                        <h3 class="text-2xl md:text-3xl tracking-tight font-normal mb-1">Echelon Financial</h3>
                        <a href="https://echelonfinancial.com/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs text-white/80 font-medium hover:text-white transition">Open live site →</a>
                    </div>
                </div>
            </div>

        </section>

        <!-- SECTION 4: 🎨 GRAPHIC DESIGN & CREATIVE SHOWCASE GALLERY -->
        <section id="graphic-design-showcase" class="w-full bg-[#FCFDFA] py-20 md:py-28 border-t border-zinc-200/50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16">
                
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 md:mb-16 gap-6">
                    <div class="space-y-4 max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-zinc-100 border border-zinc-200/60 text-zinc-800 text-[10px] md:text-xs font-bold tracking-widest uppercase">
                            <span class="w-2 h-2 rounded-full bg-black"></span>
                            <span>Graphic & Brand Design</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl md:text-5xl font-normal tracking-tight text-neutral-950 leading-tight">
                            Visual Identities, Posters <br class="hidden sm:inline">
                            <span class="italic font-serif font-light text-zinc-500">& Creative Collateral</span>
                        </h2>
                        <p class="text-xs md:text-sm text-neutral-500 leading-relaxed font-normal">
                            Explore our portfolio of brand graphics, social media artwork, posters, and marketing visuals crafted for modern brands.
                        </p>
                    </div>

                    <!-- Category Filter Buttons -->
                    <div class="flex items-center flex-wrap gap-2 text-xs font-semibold shrink-0">
                        <button class="graphic-filter-btn active bg-black text-white px-4 py-2 rounded-full transition-all duration-300 shadow-sm" data-category="all">
                            All Work (28)
                        </button>
                        <button class="graphic-filter-btn bg-zinc-100 hover:bg-zinc-200 text-zinc-700 px-4 py-2 rounded-full transition-all duration-300" data-category="branding">
                            Branding
                        </button>
                        <button class="graphic-filter-btn bg-zinc-100 hover:bg-zinc-200 text-zinc-700 px-4 py-2 rounded-full transition-all duration-300" data-category="social">
                            Social Media
                        </button>
                        <button class="graphic-filter-btn bg-zinc-100 hover:bg-zinc-200 text-zinc-700 px-4 py-2 rounded-full transition-all duration-300" data-category="marketing">
                            Marketing & Posters
                        </button>
                    </div>
                </div>

                <!-- Graphic Design Grid Gallery (28 Items) -->
                <div id="graphic-design-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @for ($i = 1; $i <= 28; $i++)
                        @php
                            $categories = ['branding', 'social', 'marketing'];
                            $cat = $categories[($i - 1) % 3];
                            $catName = match($cat) {
                                'branding' => 'Branding & Identity',
                                'social' => 'Social Media Art',
                                'marketing' => 'Poster & Marketing',
                            };
                        @endphp
                        <div class="graphic-item group relative bg-zinc-100 rounded-2xl md:rounded-3xl overflow-hidden border border-zinc-200/60 shadow-sm hover:shadow-2xl transition-all duration-500 cursor-pointer transform hover:-translate-y-1" 
                             data-category="{{ $cat }}" 
                             data-index="{{ $i - 1 }}"
                             data-src="{{ asset('assets/img/graphics/graphic-' . $i . '.jpg') }}"
                             data-title="Creative Artwork #{{ sprintf('%02d', $i) }}"
                             data-tag="{{ $catName }}">
                            
                            <!-- Image Container -->
                            <div class="w-full aspect-[4/5] relative overflow-hidden bg-zinc-200">
                                <img src="{{ asset('assets/img/graphics/graphic-' . $i . '.jpg') }}" 
                                     alt="Graphic Design Artwork {{ $i }}" 
                                     loading="lazy"
                                     class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700 ease-out">
                                
                                <!-- Hover Overlay Glass Layer -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-between p-5 text-white">
                                    <div class="flex justify-between items-center">
                                        <span class="text-[10px] font-bold tracking-widest uppercase bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20">
                                            {{ $catName }}
                                        </span>
                                        <div class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white border border-white/20">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <h4 class="text-base font-semibold tracking-tight text-white">Graphic Work #{{ sprintf('%02d', $i) }}</h4>
                                        <p class="text-[11px] text-zinc-300 font-light flex items-center gap-1">Click to view full preview →</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </section>

        <!-- GRAPHIC LIGHTBOX PREVIEW MODAL -->
        <div id="graphic-lightbox" class="fixed inset-0 z-[1000] bg-black/95 backdrop-blur-xl hidden flex-col justify-between p-4 md:p-8 transition-opacity duration-300">
            <!-- Modal Header -->
            <div class="w-full max-w-7xl mx-auto flex items-center justify-between text-white border-b border-zinc-800 pb-4 z-10">
                <div class="flex items-center gap-3">
                    <span id="lightbox-tag" class="text-[10px] md:text-xs font-bold tracking-widest uppercase bg-zinc-800 text-zinc-300 px-3 py-1 rounded-full">
                        Graphic Design
                    </span>
                    <span id="lightbox-counter" class="text-xs text-zinc-400 font-medium">
                        1 of 28
                    </span>
                </div>
                <button id="lightbox-close" class="p-2 text-zinc-400 hover:text-white transition rounded-full hover:bg-zinc-900 focus:outline-none" aria-label="Close modal">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Modal Body (Centered Image & Navigation) -->
            <div class="relative w-full flex-grow flex items-center justify-center py-4 px-2 overflow-hidden">
                <!-- Previous Button -->
                <button id="lightbox-prev" class="absolute left-2 md:left-6 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center backdrop-blur-md border border-white/10 transition hover:scale-110 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <!-- Image View -->
                <div class="max-w-4xl max-h-[80vh] flex items-center justify-center p-2">
                    <img id="lightbox-img" src="" alt="Graphic Preview" class="max-w-full max-h-[78vh] object-contain rounded-xl shadow-2xl transition-all duration-300 scale-95">
                </div>

                <!-- Next Button -->
                <button id="lightbox-next" class="absolute right-2 md:right-6 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center backdrop-blur-md border border-white/10 transition hover:scale-110 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <!-- Modal Footer -->
            <div class="w-full max-w-7xl mx-auto flex items-center justify-between text-zinc-400 text-xs border-t border-zinc-800 pt-4 z-10">
                <span id="lightbox-title" class="font-medium text-white text-sm md:text-base">Creative Artwork</span>
                <span class="hidden md:inline text-zinc-500">Press ESC to close • Use ← → arrows to navigate</span>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterBtns = document.querySelectorAll('.graphic-filter-btn');
                const graphicItems = document.querySelectorAll('.graphic-item');

                filterBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        filterBtns.forEach(b => {
                            b.classList.remove('active', 'bg-black', 'text-white');
                            b.classList.add('bg-zinc-100', 'text-zinc-700');
                        });
                        btn.classList.add('active', 'bg-black', 'text-white');
                        btn.classList.remove('bg-zinc-100', 'text-zinc-700');

                        const targetCat = btn.getAttribute('data-category');
                        graphicItems.forEach(item => {
                            if (targetCat === 'all' || item.getAttribute('data-category') === targetCat) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });

                const lightbox = document.getElementById('graphic-lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                const lightboxTag = document.getElementById('lightbox-tag');
                const lightboxTitle = document.getElementById('lightbox-title');
                const lightboxCounter = document.getElementById('lightbox-counter');
                const closeBtn = document.getElementById('lightbox-close');
                const prevBtn = document.getElementById('lightbox-prev');
                const nextBtn = document.getElementById('lightbox-next');

                let currentIndex = 0;
                const totalItems = graphicItems.length;

                function openLightbox(index) {
                    currentIndex = index;
                    const item = graphicItems[currentIndex];
                    const src = item.getAttribute('data-src');
                    const title = item.getAttribute('data-title');
                    const tag = item.getAttribute('data-tag');

                    lightboxImg.src = src;
                    lightboxTitle.textContent = title;
                    lightboxTag.textContent = tag;
                    lightboxCounter.textContent = `${currentIndex + 1} of ${totalItems}`;

                    lightbox.classList.remove('hidden');
                    lightbox.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                    setTimeout(() => lightboxImg.classList.remove('scale-95'), 10);
                }

                function closeLightbox() {
                    lightboxImg.classList.add('scale-95');
                    lightbox.classList.add('hidden');
                    lightbox.classList.remove('flex');
                    document.body.style.overflow = '';
                }

                function showNext() {
                    currentIndex = (currentIndex + 1) % totalItems;
                    openLightbox(currentIndex);
                }

                function showPrev() {
                    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                    openLightbox(currentIndex);
                }

                graphicItems.forEach((item, idx) => {
                    item.addEventListener('click', () => openLightbox(idx));
                });

                closeBtn.addEventListener('click', closeLightbox);
                nextBtn.addEventListener('click', showNext);
                prevBtn.addEventListener('click', showPrev);

                lightbox.addEventListener('click', (e) => {
                    if (e.target === lightbox) closeLightbox();
                });

                document.addEventListener('keydown', (e) => {
                    if (lightbox.classList.contains('flex')) {
                        if (e.key === 'Escape') closeLightbox();
                        if (e.key === 'ArrowRight') showNext();
                        if (e.key === 'ArrowLeft') showPrev();
                    }
                });
            });
        </script>

        <!-- SECTION 3: ✨ THE PREMIUM 'OUR DIFFERENCE' COMPROMISE FEATURE MATRIX LAYER -->
        <!-- <section id="our-difference-matrix" class="w-full bg-[#FCFDFA] py-20 md:py-32 border-t border-zinc-100/50">
            <div class="max-w-6xl mx-auto px-6 md:px-12 text-center">
                
                <div class="space-y-3 mb-16 md:mb-24">
                    <span class="text-[10px] md:text-xs font-bold tracking-[0.25em] uppercase text-zinc-400 block">OUR DIFFERENCE</span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-[54px] font-normal tracking-tight text-neutral-950 leading-[1.1]">
                        Square One is built for brands that <br class="hidden sm:inline">
                        <span class="italic font-light text-zinc-500 font-serif">refuse to compromise</span>
                    </h2>
                </div>

            
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16 text-left pt-6">
     
                    <div class="space-y-4 group">
                        <div class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-800 transition duration-300 group-hover:bg-black group-hover:text-white">
                    
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold tracking-widest text-zinc-400 uppercase block">SCALABLE</span>
                            <h4 class="text-lg font-semibold tracking-tight text-neutral-900">Boost your in-house creative</h4>
                            <p class="text-xs md:text-sm text-neutral-500 leading-relaxed font-normal">
                                We handle the heavy lifting so you can focus on strategic, high impact work without adding overhead to the team.
                            </p>
                        </div>
                    </div>

                 
                    <div class="space-y-4 group">
                        <div class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-800 transition duration-300 group-hover:bg-black group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold tracking-widest text-zinc-400 uppercase block">FLEXIBLE</span>
                            <h4 class="text-lg font-semibold tracking-tight text-neutral-900">Say yes to more projects</h4>
                            <p class="text-xs md:text-sm text-neutral-500 leading-relaxed font-normal">
                                Whether you need more bandwidth or different skills, Square One has whatever resources you need to get the job done.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4 group">
                        <div class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-800 transition duration-300 group-hover:bg-black group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.961 0 1.36 1.256.588 1.81l-3.974 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.974-2.888a1 1 0 00-1.176 0l-3.974 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.974-2.888c-.773-.554-.373-1.81.588-1.81h4.906a1 1 0 00.95-.69l1.519-4.674z"/></svg>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold tracking-widest text-zinc-400 uppercase block">RESPONSIVE</span>
                            <h4 class="text-lg font-semibold tracking-tight text-neutral-900">Don't sacrifice quality for speed</h4>
                            <p class="text-xs md:text-sm text-neutral-500 leading-relaxed font-normal">
                                We pair deep creative expertise with AI-first systems to keep the work strong, no matter how fast your business moves.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4 group">
                        <div class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-800 transition duration-300 group-hover:bg-black group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        </div>
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold tracking-widest text-zinc-400 uppercase block">SEAMLESS</span>
                            <h4 class="text-lg font-semibold tracking-tight text-neutral-900">One platform, total control</h4>
                            <p class="text-xs md:text-sm text-neutral-500 leading-relaxed font-normal">
                                Bring briefs, feedback, brand knowledge, and delivery into one connected system, giving you clarity and full visibility across every project.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->
        
    </main>

    @include('components.contact-emails', ['variant' => 'light'])

    <!-- PRE-FOOTER CTA MATRIX SECTION -->
    <section id="pre-footer-cta-matrix" class="w-full bg-black text-white py-28 md:py-40 overflow-hidden relative flex items-center justify-center">
        <div class="absolute inset-0 z-0 pointer-events-none select-none overflow-hidden">
            <img src="{{ asset('assets/img/ourwork-prefooter.png') }}" 
                 alt="Creative team synergy texture" 
                 class="w-full h-full object-cover object-center opacity-25 brightness-125 contrast-[1.05] filter scale-[1.02]">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black"></div>
        </div>
        <div class="max-w-5xl mx-auto px-6 md:px-12 lg:px-16 relative z-10 text-center flex flex-col items-center justify-center space-y-12 md:space-y-16">
            <div class="space-y-6 max-w-4xl">
                <span class="text-xs md:text-sm font-semibold tracking-[0.3em] uppercase text-zinc-400 block">Get Started Instantly</span>
                <h2 class="text-4xl sm:text-6xl md:text-[68px] lg:text-[76px] xl:text-[84px] leading-[1.05] tracking-tight font-normal text-white">
                    Ready to transform <br class="hidden sm:inline">
                    your <span class="italic font-serif font-light text-zinc-300">creative velocity?</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-12 sm:gap-24 border-t border-b border-zinc-800/60 py-10 w-full max-w-3xl justify-center">
                <div class="space-y-2 text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-normal tracking-tight text-white flex items-baseline justify-center">
                        12-24<span class="text-xl md:text-2xl text-zinc-400 font-light ml-1">hrs</span>
                    </div>
                    <p class="text-xs md:text-sm text-zinc-400 font-medium tracking-tight uppercase">Average asset delivery velocity</p>
                </div>
                <div class="space-y-2 text-center">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-normal tracking-tight text-white">500+</div>
                    <p class="text-xs md:text-sm text-zinc-400 font-medium tracking-tight uppercase">Global enterprises scaling safely</p>
                </div>
            </div>
            <div class="pt-2">
                <button class="open-demo-trigger inline-flex items-center justify-center px-10 py-5 rounded-full bg-white text-black text-sm md:text-base font-semibold hover:bg-zinc-200 transition-all duration-300 hover:scale-[1.03] shadow-2xl group">
                    <span>Book a live platform tour</span>
                    <span class="ml-2.5 transform group-hover:translate-x-1 transition-transform duration-300">→</span>
                </button>
            </div>
        </div>
    </section>

    <!-- BRAND FOOTER LAYER -->
    <footer id="main-brand-footer" class="w-full bg-black text-white pt-20 pb-12 overflow-hidden border-t border-zinc-900/60">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-12 gap-10 md:gap-8 lg:gap-12 pb-16 border-b border-zinc-900">
                <div class="col-span-2 md:col-span-4 lg:col-span-4 space-y-5">
                    <div class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-white"></span>
                        <span>Square One</span>
                    </div>
                    <p class="text-xs md:text-sm text-zinc-400 leading-relaxed max-w-sm">
                        The modern creative subscription model engineered for fast-growing enterprises, product teams, and high-velocity marketing pipelines.
                    </p>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2 space-y-4">
                    <h4 class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Platform</h4>
                    <ul class="space-y-2.5 text-xs md:text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-white transition">Capabilities</a></li>
                        <li><a href="#" class="hover:text-white transition">How it Works</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-white transition">Pricing Models</a></li>
                    </ul>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2 space-y-4">
                    <h4 class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Solutions</h4>
                    <ul class="space-y-2.5 text-xs md:text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-white transition">Enterprise Scale</a></li>
                        <li><a href="#" class="hover:text-white transition">Growth Marketing</a></li>
                    </ul>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2 space-y-4">
                    <h4 class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Resources</h4>
                    <ul class="space-y-2.5 text-xs md:text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-white transition">Case Studies</a></li>
                        <li><a href="#" class="hover:text-white transition">Design Ops Guides</a></li>
                    </ul>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2 space-y-4">
                    <h4 class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Support</h4>
                    <ul class="space-y-2.5 text-xs md:text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Help Desk</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 text-[11px] font-medium tracking-tight text-zinc-500">
                <div>&copy; 2026 Square One Technologies Inc. All rights reserved.</div>
                <div class="flex items-center flex-wrap gap-5">
                    <a href="#" class="hover:text-zinc-300 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-zinc-300 transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE ENGINE SCRIPTS CONTAINER -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            // Initialize Plyr Custom Context
            const player = new Plyr('#player', {
                controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
                clickToPlay: true,
                hideControls: true,
                resetOnEnd: false
            });

            const videoContainer = document.getElementById("cinema-video-container");
            const unmuteOverlay = document.getElementById("video-unmute-overlay");
            const plyrContainerBox = document.getElementById("plyr-container-box");

            // Handle the premium toggle unmute action
            unmuteOverlay.addEventListener("click", () => {
                player.muted = false;
                player.volume = 0.85;
                player.play();

                plyrContainerBox.classList.remove("h-[320px]", "sm:h-[460px]", "md:h-[600px]");
                plyrContainerBox.classList.add("h-auto", "aspect-video");

                videoContainer.classList.remove("bg-video-mode");
                videoContainer.classList.add("interactive-mode");
                
                gsap.to(unmuteOverlay, {
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => unmuteOverlay.remove()
                });
            });

            // Cinema Box Expansion Sequence
            gsap.to("#cinema-video-container", {
                maxWidth: "72rem",
                borderRadius: "20px",
                scrollTrigger: {
                    trigger: "#our-work-hero",
                    start: "top top",
                    end: "bottom center",
                    scrub: 1,
                    invalidateOnRefresh: true
                }
            });

            // ⚡ DUAL-INTERACTIVITY MARQUEE ENGINE (Continuous Autoplay + Scroll Velocity Injection)
            const marqueeContainer = document.querySelector('.marquee-container');
            const marqueeWrapper = document.querySelector('.marquee-wrapper');
            
            // Seamless infinite clone injection
            const clone = marqueeWrapper.cloneNode(true);
            marqueeContainer.appendChild(clone);

            let baseVelocity = 0.4; 
            let currentX = 0;

            function updateMarquee() {
                currentX += baseVelocity;
                if (currentX >= marqueeWrapper.offsetWidth) {
                    currentX = 0;
                }
                gsap.set([marqueeWrapper, clone], { x: -currentX });
                requestAnimationFrame(updateMarquee);
            }
            requestAnimationFrame(updateMarquee);

            // Scroll velocity linkage mapping
            ScrollTrigger.create({
                trigger: "#brand-marquee-showcase",
                start: "top bottom",
                end: "bottom top",
                onUpdate: (self) => {
                    let scrollVelocity = Math.abs(self.getVelocity() * 0.04);
                    let targetVelocity = 0.4 + Math.min(scrollVelocity, 6);
                    
                    gsap.to({ v: baseVelocity }, {
                        v: targetVelocity,
                        duration: 0.25,
                        onUpdate: function() { baseVelocity = this.targets()[0].v; }
                    });
                },
                onLeave: () => { baseVelocity = 0.4; },
                onEnterBack: () => { baseVelocity = 0.4; }
            });

            // ================= PREMIUM 8-PROJECTS SHOWCASE INTERACTIVE LOGIC =================
            const projectColumns = document.querySelectorAll('.project-column');

            projectColumns.forEach(column => {
                const circle = column.querySelector('.custom-hover-circle');
                const blurLayer = column.querySelector('.project-blur-layer');
                const infoText = column.querySelector('.project-info-text');
                const circleText = column.querySelector('.circle-text');
                let isExpanded = false;

                // Track Mouse Rotation for Follower Circle (Fired only on Desktop screens)
                column.addEventListener('mousemove', (e) => {
                    if (window.innerWidth >= 1024) {
                        const rect = column.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        
                        gsap.to(circle, {
                            x: x,
                            y: y,
                            opacity: 1,
                            scale: 1,
                            duration: 0.2,
                            ease: "power2.out"
                        });
                    }
                });

                // FIX: Mouseleave par circle ko absolute zero target or hidden state me instantly fadeout out krna
                column.addEventListener('mouseleave', () => {
                    if (window.innerWidth >= 1024) {
                        gsap.to(circle, {
                            opacity: 0,
                            scale: 0.5,
                            duration: 0.25,
                            ease: "power2.in"
                        });
                    }
                });

                // Toggle Info View on Click
                column.addEventListener('click', () => {
                    isExpanded = !isExpanded;

                    if (isExpanded) {
                        blurLayer.style.pointerEvents = "auto";
                        gsap.to(blurLayer, { opacity: 1, duration: 0.45, ease: "power2.out" });
                        gsap.to(infoText, { y: 0, duration: 0.5, ease: "power3.out" });
                        if (circleText) circleText.textContent = "Close —";
                        if (circle) gsap.to(circle, { backgroundColor: "#000000", color: "#ffffff", duration: 0.25 });
                    } else {
                        blurLayer.style.pointerEvents = "none";
                        gsap.to(blurLayer, { opacity: 0, duration: 0.35, ease: "power2.in" });
                        gsap.to(infoText, { y: 25, duration: 0.35, ease: "power2.in" });
                        if (circleText) circleText.textContent = "Expand +";
                        if (circle) gsap.to(circle, { backgroundColor: "#ffffff", color: "#000000", duration: 0.25 });
                    }
                });
            });

            // Standard Navigation Links / Overlay Modals Trigger Handlers
            const menuOpenBtn = document.getElementById("menu-open-btn");
            const menuCloseBtn = document.getElementById("menu-close-btn");
            const mobileMenu = document.getElementById("mobile-menu");
            const mobileLinks = document.querySelectorAll(".mobile-nav-link");
            const mobileFooter = document.querySelector(".mobile-nav-footer");

            const demoModal = document.getElementById("demo-modal");
            const modalCard = document.getElementById("modal-card");
            const modalCloseBtn = document.getElementById("modal-close-btn");
            const openDemoTriggers = document.querySelectorAll(".open-demo-trigger");

            const menuTl = gsap.timeline({ paused: true });
            menuTl.set(mobileMenu, { display: "flex" }) 
                  .to(mobileMenu, { opacity: 1, duration: 0.35, ease: "power2.out" })
                  .fromTo(mobileLinks, { y: 25, opacity: 0 }, { y: 0, opacity: 1, stagger: 0.08, duration: 0.35, ease: "power2.out" }, "-=0.15")
                  .fromTo(mobileFooter, { y: 15, opacity: 0 }, { y: 0, opacity: 1, duration: 0.3, ease: "power2.out" }, "-=0.15");

            menuOpenBtn.addEventListener("click", () => {
                document.body.style.overflow = "hidden";
                menuTl.play();
            });
            menuCloseBtn.addEventListener("click", () => {
                document.body.style.overflow = "auto";
                menuTl.reverse();
            });

            const modalTl = gsap.timeline({ paused: true });
            modalTl.set(demoModal, { display: "flex" })
                   .to(demoModal, { opacity: 1, duration: 0.3, ease: "power1.out" })
                   .fromTo(modalCard, { opacity: 0, y: 35, scale: 0.96 }, { opacity: 1, y: 0, scale: 1, duration: 0.4, ease: "power3.out" }, "-=0.15");

            openDemoTriggers.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (mobileMenu.style.display === "flex") menuTl.reverse();
                    document.body.style.overflow = "hidden"; 
                    modalTl.play();
                });
            });

            modalCloseBtn.addEventListener("click", () => {
                document.body.style.overflow = "auto";
                modalTl.reverse();
            });
            demoModal.addEventListener("click", (e) => {
                if (e.target === demoModal) {
                    document.body.style.overflow = "auto";
                    modalTl.reverse();
                }
            });
        });
    </script>
</body>
</html>