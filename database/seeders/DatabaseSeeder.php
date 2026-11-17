<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Keahlian (Skills)
        DB::table('skills')->insert([
            ['name' => 'HTML & CSS', 'level' => 'Mahir', 'icon' => 'fa-brands fa-html5', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'level' => 'Menengah', 'icon' => 'fa-brands fa-laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP', 'level' => 'Menengah', 'icon' => 'fa-brands fa-php', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tailwind CSS', 'level' => 'Menengah', 'icon' => 'fa-solid fa-wind', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'level' => 'Dasar – Menengah', 'icon' => 'fa-brands fa-js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma (UI/UX)', 'level' => 'Mahir', 'icon' => 'fa-brands fa-figma', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL / SQLite', 'level' => 'Menengah', 'icon' => 'fa-solid fa-database', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Git & GitHub', 'level' => 'Dasar', 'icon' => 'fa-brands fa-git-alt', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Data Proyek (Projects)
        DB::table('projects')->insert([
            [
                'title' => 'Website Portofolio Digital (UKK)',
                'category' => 'Laravel • Filament • Tailwind CSS',
                'description' => 'Aplikasi web portofolio dinamis yang dilengkapi panel admin untuk mengelola profil, daftar keahlian, galeri proyek, sertifikat, hingga kotak masuk pesan pengunjung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sistem Informasi Perpustakaan Sekolah',
                'category' => 'PHP • Laravel • MySQL',
                'description' => 'Aplikasi berbasis web untuk memudahkan pencatatan data peminjaman buku, manajemen stok anggota, dan rekap laporan harian secara otomatis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Desain UI/UX Aplikasi Edukasi Mobile',
                'category' => 'Figma • UI/UX Design',
                'description' => 'Perancangan antarmuka pengguna mulai dari wireframe hingga prototype interaktif dengan fokus pada kenyamanan navigasi dan tampilan visual yang bersih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Data Pengalaman (Experiences)
        DB::table('experiences')->insert([
            [
                'position' => 'Peserta Praktik Kerja Lapangan (PKL) — Web Developer',
                'company' => 'Instansi / Perusahaan Mitra Banjarmasin',
                'period' => 'Juli 2026 – Desember 2026',
                'description' => 'Membantu pengembangan fitur website, melakukan pengujian antarmuka (testing), serta mengelola konten dan basis data.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position' => 'Anggota Tim Proyek Perangkat Lunak',
                'company' => 'SMKN 2 Banjarmasin (Jurusan PPLG)',
                'period' => '2024 – 2026',
                'description' => 'Berkolaborasi dalam tim untuk merancang desain antarmuka aplikasi dan membangun proyek web berbasis Laravel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. Data Sertifikat (Certificates)
        DB::table('certificates')->insert([
            [
                'title' => 'Uji Kompetensi Keahlian (UKK) PPLG',
                'issuer' => 'SMKN 2 Banjarmasin',
                'year' => '2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sertifikat Praktik Kerja Lapangan (PKL)',
                'issuer' => 'Industri Mitra Banjarmasin',
                'year' => '2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Belajar Dasar Pemrograman Web',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 5. Data Testimoni (Testimonials)
        DB::table('testimonials')->insert([
            [
                'name' => 'Guru Pembimbing PPLG',
                'role' => 'SMKN 2 Banjarmasin',
                'content' => 'Ruzainah memiliki ketelitian tinggi dalam merancang tampilan antarmuka web dan mampu menyelesaikan proyek tepat waktu dengan hasil yang rapi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembimbing Lapangan PKL',
                'role' => 'Senior Web Developer',
                'content' => 'Cepat beradaptasi dengan alur kerja tim, komunikatif, dan sangat membantu dalam pengembangan tampilan front-end website.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 6. Data Artikel (Articles)
        DB::table('articles')->insert([
            [
                'title' => 'Pengalaman Membangun Website Portofolio dengan Laravel & Filament',
                'content' => 'Membangun website portofolio dinamis memberikan pengalaman berharga dalam menghubungkan tampilan front-end yang estetis dengan panel admin yang praktis untuk mengelola konten secara mandiri.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pentingnya Desain UI/UX yang Bersih pada Aplikasi Web',
                'content' => 'Pemilihan palet warna yang nyaman di mata, tipografi yang jelas, serta tata letak yang terstruktur membuat pengunjung betah dan mudah memahami informasi di dalam website.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}