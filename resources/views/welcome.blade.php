<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Ruzainah Safbrina' }} — Portfolio</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Cormorant Garamond & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-[#FAF7F2] dark:bg-[#191614] text-[#3E322B] dark:text-[#EFECE6] font-sans antialiased selection:bg-[#D8CBB8] selection:text-[#3E322B] transition-colors duration-300">

    <!-- Navbar Minimalis -->
    <header class="sticky top-0 z-50 bg-[#FAF7F2]/85 dark:bg-[#191614]/85 backdrop-blur-md border-b border-[#E8E0D5] dark:border-[#2E2925]">
        <nav class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#" class="font-serif text-2xl font-bold tracking-tight text-[#3E322B] dark:text-[#F5F1EB]">
                {{ $profile->full_name ?? 'Ruzainah.' }}
            </a>

            <div class="hidden md:flex items-center gap-7 text-sm text-[#7A6A5E] dark:text-[#A89F96]">
                <a href="#tentang" class="hover:text-[#3E322B] dark:hover:text-white transition">Tentang</a>
                <a href="#keahlian" class="hover:text-[#3E322B] dark:hover:text-white transition">Keahlian</a>
                <a href="#proyek" class="hover:text-[#3E322B] dark:hover:text-white transition">Proyek</a>
                <a href="#pengalaman" class="hover:text-[#3E322B] dark:hover:text-white transition">Pengalaman</a>
                <a href="#kontak" class="hover:text-[#3E322B] dark:hover:text-white transition">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                <!-- Tombol Dark / Light Mode -->
                <button id="theme-toggle" type="button" aria-label="Ganti Tema" class="w-9 h-9 rounded-full border border-[#E2D9CE] dark:border-[#332D29] bg-[#F3EDE4] dark:bg-[#24201D] text-[#7A6A5E] dark:text-[#D8CBB8] flex items-center justify-center text-sm hover:border-[#8C6D53] transition">
                    <i id="theme-toggle-dark-icon" class="fa-solid fa-moon hidden"></i>
                    <i id="theme-toggle-light-icon" class="fa-solid fa-sun hidden"></i>
                </button>

                @if(auth()->check())
                    <a href="/admin" class="px-4 py-2 rounded-full bg-[#6B5344] text-[#FAF7F2] text-xs font-medium hover:bg-[#544034] transition flex items-center gap-2">
                        <i class="fa-solid fa-gauge-high text-[11px]"></i>
                        <span>Kembali ke Admin</span>
                    </a>
                @else
                    <a href="/admin/login" class="px-5 py-2 rounded-full bg-[#6B5344] dark:bg-[#C5A88F] text-[#FAF7F2] dark:text-[#191614] text-xs font-semibold hover:opacity-90 transition">
                        Login
                    </a>
                @endif
            </div>
        </nav>
    </header>

    <main class="max-w-5xl mx-auto px-6">

        <!-- HERO SECTION -->
        <section id="tentang" class="py-16 md:py-24 border-b border-[#E8E0D5] dark:border-[#2E2925]">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
                
                <!-- Teks Profil -->
                <div class="md:col-span-7 order-2 md:order-1">
                    <p class="text-xs uppercase tracking-[0.25em] text-[#8C6D53] dark:text-[#C5A88F] font-semibold mb-3">
                        HAI! SAYA
                    </p>

                    <h1 class="font-serif text-5xl sm:text-6xl md:text-7xl font-semibold leading-[1.05] text-[#2E241E] dark:text-[#F7F3EC] mb-4">
                        {{ $profile->full_name ?? 'Ruzainah Safbrina' }}
                    </h1>

                    @if(!empty($profile->class_major))
                        <p class="font-serif italic text-xl md:text-2xl text-[#6D8596] dark:text-[#9CB3C4] mb-6 flex items-center gap-2.5">
                            <i class="fa-solid fa-graduation-cap text-base"></i>
                            <span>{{ $profile->class_major }}</span>
                        </p>
                    @endif

                    <p class="text-[#695B50] dark:text-[#B8AFA6] text-base leading-relaxed mb-8 max-w-xl whitespace-pre-line">
                        {{ $profile->about_me ?? 'Selamat datang di portofolio digital saya.' }}
                    </p>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-wrap items-center gap-3.5 mb-8">
                        <a href="#proyek" class="px-7 py-3 rounded-full bg-[#6B5344] dark:bg-[#C5A88F] text-[#FAF7F2] dark:text-[#191614] text-sm font-medium hover:opacity-90 transition">
                            Lihat Proyek
                        </a>

                        @if(!empty($profile->cv_file))
                            <a href="{{ asset('storage/' . $profile->cv_file) }}" target="_blank" download class="px-6 py-3 rounded-full bg-[#EEF3F6] dark:bg-[#1D2327] text-[#3B5566] dark:text-[#B3C8D6] border border-[#C6D6E0] dark:border-[#2E3A42] text-sm font-medium hover:opacity-90 transition inline-flex items-center gap-2">
                                <i class="fa-solid fa-file-arrow-down"></i>
                                <span>Download CV</span>
                            </a>
                        @endif

                        <a href="#kontak" class="px-6 py-3 rounded-full border border-[#CBBBA8] dark:border-[#3E3732] text-sm font-medium hover:bg-[#F1EAE0] dark:hover:bg-[#24201D] transition">
                            Hubungi Saya
                        </a>
                    </div>

                    <!-- Tautan Sosial Media (Hanya Instagram & Email) -->
                    <div class="flex flex-wrap items-center gap-5 text-[#7A6A5E] dark:text-[#A89F96]">
                        @if(!empty($profile->instagram))
                            <a href="{{ $profile->instagram }}" target="_blank" class="hover:text-[#3E322B] dark:hover:text-white transition inline-flex items-center gap-2 text-sm" aria-label="Instagram">
                                <i class="fa-brands fa-instagram text-lg text-[#8C6D53] dark:text-[#C5A88F]"></i>
                                <span>Instagram</span>
                            </a>
                        @endif
                        @if(!empty($profile->email))
                            <a href="mailto:{{ $profile->email }}" class="hover:text-[#3E322B] dark:hover:text-white transition inline-flex items-center gap-2 text-sm" aria-label="Email">
                                <i class="fa-regular fa-envelope text-lg text-[#6D8596] dark:text-[#9CB3C4]"></i>
                                <span>{{ $profile->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Bingkai Foto Profil Aesthetic (Arch Frame) -->
                <div class="md:col-span-5 order-1 md:order-2 flex justify-center md:justify-end">
                    <div class="w-64 sm:w-72 md:w-80 aspect-[4/5] rounded-t-full rounded-b-3xl p-3 bg-[#F1EAE0] dark:bg-[#24201D] border border-[#E2D9CE] dark:border-[#332D29] shadow-sm">
                        <div class="w-full h-full rounded-t-full rounded-b-2xl overflow-hidden bg-[#E5DDD2] dark:bg-[#2D2824]">
                            @if(!empty($profile->avatar))
                                <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->full_name ?? 'Foto Profil' }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-[#9E8E80]">
                                    <i class="fa-regular fa-user text-4xl mb-2"></i>
                                    <span class="text-xs">Foto Profil</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pendidikan & Tujuan Karir -->
            @if(!empty($profile->education) || !empty($profile->career_goal))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-16 pt-12 border-t border-[#E8E0D5] dark:border-[#2E2925]">
                    @if(!empty($profile->education))
                        <div class="p-7 rounded-2xl bg-[#F4EFE7] dark:bg-[#211D1A] border border-[#E6DDD1] dark:border-[#2F2A26]">
                            <span class="text-xs uppercase tracking-widest text-[#8C6D53] dark:text-[#C5A88F] font-semibold">Pendidikan</span>
                            <h3 class="font-serif text-2xl font-semibold mt-1 mb-3">Riwayat Pendidikan</h3>
                            <p class="text-sm text-[#695B50] dark:text-[#B8AFA6] leading-relaxed whitespace-pre-line">{{ $profile->education }}</p>
                        </div>
                    @endif

                    @if(!empty($profile->career_goal))
                        <div class="p-7 rounded-2xl bg-[#EEF3F6] dark:bg-[#1D2327] border border-[#DCE5EB] dark:border-[#2A3339]">
                            <span class="text-xs uppercase tracking-widest text-[#6D8596] dark:text-[#9CB3C4] font-semibold">Visi</span>
                            <h3 class="font-serif text-2xl font-semibold mt-1 mb-3">Tujuan Karir</h3>
                            <p class="text-sm text-[#586773] dark:text-[#B3C0C9] leading-relaxed whitespace-pre-line">{{ $profile->career_goal }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </section>

        <!-- KEAHLIAN & TEKNOLOGI -->
        <section id="keahlian" class="py-20 border-b border-[#E8E0D5] dark:border-[#2E2925]">
            <div class="mb-12">
                <span class="text-xs uppercase tracking-[0.2em] text-[#8C6D53] dark:text-[#C5A88F] font-semibold">Kemampuan</span>
                <h2 class="font-serif text-4xl md:text-5xl font-semibold mt-2">Keahlian & Teknologi</h2>
            </div>

            @if(count($skills) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($skills as $skill)
                        <div class="p-5 rounded-2xl bg-white/75 dark:bg-[#211D1A] border border-[#E8E0D5] dark:border-[#2E2925] hover:border-[#B59E88] transition">
                            <div class="w-10 h-10 rounded-xl bg-[#F3EDE4] dark:bg-[#2B2622] text-[#6B5344] dark:text-[#C5A88F] flex items-center justify-center text-base mb-4">
                                <i class="{{ $skill->icon ?? 'fa-solid fa-code' }}"></i>
                            </div>
                            <h3 class="font-medium text-sm text-[#2E241E] dark:text-[#F5F1EB]">{{ $skill->name ?? $skill->skill_name ?? 'Skill' }}</h3>
                            @if(!empty($skill->level ?? $skill->proficiency))
                                <p class="text-xs text-[#8C6D53] dark:text-[#A89F96] mt-1">{{ $skill->level ?? $skill->proficiency }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-[#9E8E80]">Belum ada data keahlian.</p>
            @endif
        </section>

        <!-- PROYEK TERBARU -->
        <section id="proyek" class="py-20 border-b border-[#E8E0D5] dark:border-[#2E2925]">
            <div class="mb-8">
                <span class="text-xs uppercase tracking-[0.2em] text-[#6D8596] dark:text-[#9CB3C4] font-semibold">Portofolio</span>
                <h2 class="font-serif text-4xl md:text-5xl font-semibold mt-2">Proyek Terbaru</h2>
            </div>

            <!-- Kotak Pencarian Proyek -->
            <div class="max-w-md mb-8 relative">
                <input type="text" id="projectSearch" onkeyup="filterProjects()" 
                    placeholder="Cari judul proyek atau teknologi..." 
                    class="w-full px-5 py-3 pl-12 rounded-full border border-[#E8E0D5] dark:border-[#2E2925] bg-white/80 dark:bg-[#211D1A] text-sm focus:outline-none focus:ring-2 focus:ring-[#6D8596] transition">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7E72]"></i>
            </div>
            <p id="noProjectResult" class="hidden text-sm text-[#8C7E72] mb-6">Proyek yang kamu cari tidak ditemukan.</p>

            @if(count($projects) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($projects as $project)
                        @php
                            $projectImg = $project->image ?? $project->thumbnail ?? $project->cover ?? null;
                            $projectLink = $project->link ?? $project->demo_url ?? $project->url ?? null;
                        @endphp
                        <article class="group rounded-3xl bg-white/80 dark:bg-[#211D1A] border border-[#E8E0D5] dark:border-[#2E2925] overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                            <div>
                                <div class="aspect-[16/10] bg-[#EFE8DD] dark:bg-[#2A2521] overflow-hidden">
                                    @if(!empty($projectImg))
                                        <img src="{{ asset('storage/' . $projectImg) }}" alt="{{ $project->title ?? 'Project' }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#B5A697] text-3xl">
                                            <i class="fa-solid fa-laptop-code"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-7">
                                    @if(!empty($project->category ?? $project->tech_stack))
                                        <span class="text-xs text-[#6D8596] dark:text-[#9CB3C4] font-medium">
                                            {{ $project->category ?? $project->tech_stack }}
                                        </span>
                                    @endif
                                    <h3 class="font-serif text-2xl font-semibold mt-1 mb-2">{{ $project->title ?? $project->name ?? 'Judul Proyek' }}</h3>
                                    <p class="text-sm text-[#695B50] dark:text-[#B8AFA6] leading-relaxed">{{ $project->description ?? '' }}</p>
                                </div>
                            </div>
                            @if(!empty($projectLink))
                                <div class="px-7 pb-6">
                                    <a href="{{ $projectLink }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-medium text-[#6D8596] dark:text-[#9CB3C4] hover:underline">
                                        Lihat Proyek <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                    </a>
                                </div>
                            @endif
                        </article>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-[#8C7E72]">Belum ada proyek yang ditampilkan.</p>
            @endif
        </section>

        <!-- PENGALAMAN & SERTIFIKAT -->
        <section id="pengalaman" class="py-20 border-b border-[#E8E0D5] dark:border-[#2E2925]">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                
                <!-- Pengalaman -->
                <div class="md:col-span-7">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#8C6D53] dark:text-[#C5A88F] font-semibold">Perjalanan</span>
                    <h2 class="font-serif text-4xl font-semibold mt-2 mb-8">Pengalaman</h2>

                    @if(count($experiences) > 0)
                        <div class="space-y-6">
                            @foreach($experiences as $exp)
                                <div class="p-6 rounded-2xl bg-white/75 dark:bg-[#211D1A] border border-[#E8E0D5] dark:border-[#2E2925]">
                                    <span class="text-xs text-[#6D8596] dark:text-[#9CB3C4] font-medium">{{ $exp->period ?? '' }}</span>
                                    <h3 class="font-serif text-2xl font-semibold mt-1">{{ $exp->position ?? $exp->role ?? 'Posisi' }}</h3>
                                    <p class="text-xs text-[#8C6D53] dark:text-[#C5A88F] font-medium mt-0.5 mb-3">{{ $exp->company ?? $exp->organization ?? '' }}</p>
                                    <p class="text-sm text-[#695B50] dark:text-[#B8AFA6] leading-relaxed">{{ $exp->description ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-[#9E8E80]">Belum ada data pengalaman.</p>
                    @endif
                </div>

                <!-- Sertifikat -->
                <div class="md:col-span-5">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#6D8596] dark:text-[#9CB3C4] font-semibold">Pencapaian</span>
                    <h2 class="font-serif text-4xl font-semibold mt-2 mb-8">Sertifikat</h2>

                    @if(count($certificates) > 0)
                        <div class="space-y-3">
                            @foreach($certificates as $cert)
                                @php
                                    $certFile = $cert->file ?? $cert->image ?? $cert->credential_url ?? null;
                                @endphp
                                <div class="p-4 rounded-2xl bg-white/75 dark:bg-[#211D1A] border border-[#E8E0D5] dark:border-[#2E2925] flex items-center justify-between gap-3">
                                    <div>
                                        <h3 class="font-medium text-sm">{{ $cert->title ?? $cert->name ?? 'Nama Sertifikat' }}</h3>
                                        <p class="text-xs text-[#8C6D53] dark:text-[#A89F96] mt-0.5">
                                            {{ $cert->issuer ?? $cert->organizer ?? '' }} {{ !empty($cert->year ?? $cert->issued_date) ? '• ' . ($cert->year ?? $cert->issued_date) : '' }}
                                        </p>
                                    </div>
                                    @if(!empty($certFile))
                                        <a href="{{ str_starts_with($certFile, 'http') ? $certFile : asset('storage/' . $certFile) }}" target="_blank" class="text-xs text-[#6D8596] dark:text-[#9CB3C4] hover:underline shrink-0">
                                            Lihat
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-[#9E8E80]">Belum ada data sertifikat.</p>
                    @endif
                </div>
            </div>
        </section>

        <!-- TESTIMONI -->
        @if(count($testimonials) > 0)
            <section class="py-20 border-b border-[#E8E0D5] dark:border-[#2E2925]">
                <h2 class="font-serif text-4xl font-semibold mb-8">Testimoni</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($testimonials as $testi)
                        <div class="p-6 rounded-2xl bg-[#F4EFE7] dark:bg-[#211D1A] border border-[#E6DDD1] dark:border-[#2F2A26]">
                            <p class="font-serif italic text-lg text-[#3E322B] dark:text-[#EFECE6] mb-4">"{{ $testi->content ?? $testi->message ?? $testi->feedback ?? '' }}"</p>
                            <h4 class="text-xs font-semibold uppercase tracking-wider">{{ $testi->name ?? $testi->client_name ?? 'Klien' }}</h4>
                            <span class="text-xs text-[#8C6D53] dark:text-[#A89F96]">{{ $testi->role ?? $testi->position ?? '' }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- KONTAK / KIRIM PESAN -->
        <section id="kontak" class="py-20">
            <div class="max-w-xl mx-auto">
                <div class="text-center mb-10">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#8C6D53] dark:text-[#C5A88F] font-semibold">Kontak</span>
                    <h2 class="font-serif text-4xl md:text-5xl font-semibold mt-2">Kirim Pesan</h2>
                    @if(!empty($profile->email))
                        <p class="text-sm text-[#7A6A5E] dark:text-[#A89F96] mt-2">
                            Atau kirim email ke <a href="mailto:{{ $profile->email }}" class="underline text-[#6B5344] dark:text-[#C5A88F]">{{ $profile->email }}</a>
                        </p>
                    @endif
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-[#EEF3F6] dark:bg-[#1D2327] border border-[#C6D6E0] dark:border-[#2E3A42] text-[#3B5566] dark:text-[#B3C8D6] text-sm text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('message.store') }}" method="POST" class="space-y-4 p-8 rounded-3xl bg-white/80 dark:bg-[#211D1A] border border-[#E8E0D5] dark:border-[#2E2925]">
                    @csrf
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-[#7A6A5E] dark:text-[#A89F96] mb-2">Nama Lengkap</label>
                        <input type="text" name="sender_name" required class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] dark:bg-[#191614] border border-[#E2D9CE] dark:border-[#332D29] text-sm focus:border-[#8C6D53] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-[#7A6A5E] dark:text-[#A89F96] mb-2">Email</label>
                        <input type="email" name="sender_email" required class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] dark:bg-[#191614] border border-[#E2D9CE] dark:border-[#332D29] text-sm focus:border-[#8C6D53] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-[#7A6A5E] dark:text-[#A89F96] mb-2">Pesan</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] dark:bg-[#191614] border border-[#E2D9CE] dark:border-[#332D29] text-sm focus:border-[#8C6D53] focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3.5 rounded-full bg-[#6B5344] dark:bg-[#C5A88F] text-[#FAF7F2] dark:text-[#191614] text-sm font-medium hover:opacity-90 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="border-t border-[#E8E0D5] dark:border-[#2E2925] py-8 text-center text-xs text-[#8C7B6E]">
        <p>&copy; {{ date('Y') }} {{ $profile->full_name ?? 'Ruzainah Safbrina' }}. All rights reserved.</p>
    </footer>

    <!-- Script Dark / Light Mode & Live Search -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });

        function filterProjects() {
            const keyword = document.getElementById('projectSearch').value.toLowerCase();
            const cards = document.querySelectorAll('#proyek article');
            let visibleCount = 0;

            cards.forEach(card => {
                const text = card.innerText.toLowerCase();
                if (text.includes(keyword)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const emptyMsg = document.getElementById('noProjectResult');
            if (emptyMsg) {
                emptyMsg.classList.toggle('hidden', visibleCount > 0 || keyword === '');
            }
        }
    </script>
</body>
</html>