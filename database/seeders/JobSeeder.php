<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        JobVacancy::truncate();

        $jobs = [
            ['Backend Developer Laravel', 'PT Nusantara Digital', 'Jakarta Selatan', 12000000, 'Full-time',
             ['Minimal S1 Informatika/Sistem Informasi', 'Menguasai PHP & Laravel', 'Paham MySQL dan REST API', 'Pengalaman minimal 2 tahun'],
             '2026-10-18', 'Mengembangkan dan memelihara layanan backend untuk aplikasi e-commerce dengan Laravel.'],
            ['Frontend Developer', 'Kreasi Teknologi Indonesia', 'Tangerang Selatan', 9500000, 'Full-time',
             ['Menguasai HTML, CSS, JavaScript', 'Berpengalaman dengan Bootstrap/Tailwind', 'Mampu slicing desain Figma', 'Portofolio tersedia'],
             '2026-10-17', 'Membangun antarmuka web yang responsif dan mudah digunakan oleh pelanggan.'],
            ['UI/UX Designer', 'Studio Piksel', 'Bandung', 8500000, 'Kontrak',
             ['Menguasai Figma', 'Memahami user research', 'Mampu membuat prototype interaktif', 'Portofolio desain aplikasi'],
             '2026-10-16', 'Merancang pengalaman pengguna untuk produk mobile dan web klien kami.'],
            ['Data Analyst', 'Bank Mandala Sejahtera', 'Jakarta Pusat', 11000000, 'Full-time',
             ['Menguasai SQL dan Excel', 'Familiar dengan Power BI/Tableau', 'Kemampuan analisis yang kuat', 'Lulusan Statistik/SI/TI'],
             '2026-10-15', 'Mengolah data transaksi dan membuat dashboard untuk mendukung keputusan bisnis.'],
            ['Admin Media Sosial', 'Warung Kopi Senja', 'Depok', 4200000, 'Part-time',
             ['Aktif di Instagram dan TikTok', 'Mampu membuat konten sederhana', 'Komunikatif dan kreatif', 'Bisa bekerja 4 jam per hari'],
             '2026-10-14', 'Mengelola akun media sosial dan menjadwalkan konten promosi harian.'],
            ['Magang Web Developer', 'Unpam Tech Hub', 'Tangerang Selatan', 2000000, 'Magang',
             ['Mahasiswa semester 5 ke atas', 'Dasar PHP dan MySQL', 'Mau belajar Laravel', 'Bersedia magang 3 bulan'],
             '2026-10-13', 'Belajar langsung membangun aplikasi web bersama tim developer berpengalaman.'],
            ['Customer Support Remote', 'Layanan Prima Online', 'Remote', 6000000, 'Remote',
             ['Komunikasi tulis yang baik', 'Memiliki laptop dan internet stabil', 'Bersedia shift bergantian', 'Pengalaman CS diutamakan'],
             '2026-10-12', 'Melayani pertanyaan pelanggan melalui chat dan email dari mana saja.'],
            ['Mobile Developer Flutter', 'PT Aplikasi Cerdas', 'Surabaya', 13000000, 'Full-time',
             ['Menguasai Dart dan Flutter', 'Pernah merilis aplikasi di Play Store', 'Paham state management', 'Terbiasa memakai Git'],
             '2026-10-11', 'Mengembangkan aplikasi mobile lintas platform untuk layanan logistik.'],
            ['Content Writer', 'Media Teknologi Kita', 'Remote', 5000000, 'Remote',
             ['Mahir menulis artikel teknologi', 'Memahami dasar SEO', 'Mampu memenuhi tenggat', 'Portofolio tulisan'],
             '2026-10-10', 'Menulis artikel dan tutorial seputar teknologi dan pemrograman.'],
            ['Network Engineer', 'PT Jaringan Andalan', 'Bekasi', 10000000, 'Kontrak',
             ['Sertifikasi CCNA diutamakan', 'Memahami routing & switching', 'Bersedia kerja lapangan', 'Memiliki SIM C'],
             '2026-10-09', 'Instalasi dan pemeliharaan jaringan kantor klien di wilayah Jabodetabek.'],
            ['Quality Assurance Tester', 'Fintek Maju Bersama', 'Jakarta Barat', 8000000, 'Full-time',
             ['Memahami siklus pengujian software', 'Mampu membuat test case', 'Teliti dan sistematis', 'Pengalaman Postman nilai plus'],
             '2026-10-08', 'Menguji aplikasi keuangan digital sebelum dirilis ke pengguna.'],
            ['Magang Desain Grafis', 'Kreatif Muda Studio', 'Tangerang', 1800000, 'Magang',
             ['Menguasai Canva/Photoshop', 'Kreatif dan mau belajar', 'Mahasiswa aktif', 'Bersedia 20 jam per minggu'],
             '2026-10-07', 'Membantu tim membuat materi visual untuk kampanye digital klien.'],
        ];

        foreach ($jobs as [$title, $company, $location, $salary, $type, $req, $date, $desc]) {
            JobVacancy::create([
                'title'        => $title,
                'company'      => $company,
                'location'     => $location,
                'salary'       => $salary,
                'type'         => $type,
                'requirements' => implode("\n", $req),
                'posted_date'  => $date,
                'description'  => $desc,
            ]);
        }
    }
}
