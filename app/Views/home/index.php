<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Beranda | ResepSehat<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Banner -->

<section class="relative py-20 bg-primary text-white">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'); background-size: cover;"></div>
    <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
        <div class="inline-block bg-white/20 p-3 rounded-full mb-6">
            <i class="fas fa-heart text-2xl"></i>
        </div>
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Mulai Perjalanan Makan Sehat Anda Hari Ini</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Bergabunglah dengan <span class="font-semibold">10.000+</span> anggota komunitas kami yang telah merasakan manfaat hidup lebih sehat melalui resep-resep bergizi.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
            <a href="/resep/create" class="bg-white text-primary hover:bg-gray-100 font-semibold px-8 py-4 rounded-lg transition duration-300 transform hover:scale-105">
                <i class="fas fa-share-alt mr-2"></i> Bagikan Resep Anda
            </a>
            <a href="#resep" class="bg-transparent border-2 border-white hover:bg-white/20 font-semibold px-8 py-4 rounded-lg transition duration-300 transform hover:scale-105">
                <i class="fas fa-book-open mr-2"></i> Jelajahi Resep
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-6 text-sm text-white/80">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>Resep Teruji</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>Ahli Gizi</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>100% Alami</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>Mudah Dibuat</span>
            </div>
        </div>
    </div>
</section>

<!-- Resep Section -->

<!-- Pengenalan Resep Sehat -->
<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Apa Itu Resep Sehat?</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                    alt="Resep Sehat" class="rounded-lg shadow-lg w-full">
            </div>
            <div>
                <p class="text-gray-600 mb-4">
                    Resep sehat adalah panduan memasak yang dirancang khusus untuk menghasilkan hidangan bergizi seimbang
                    dengan memperhatikan kandungan nutrisi, kalori, dan bahan-bahan alami.
                </p>
                <ul class="space-y-3 text-gray-600 mb-6">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                        <span>Menggunakan bahan-bahan segar dan alami</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                        <span>Mempertimbangkan kebutuhan gizi harian</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                        <span>Proses memasak yang menjaga nutrisi</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                        <span>Keseimbangan antara rasa dan kesehatan</span>
                    </li>
                </ul>
                <a href="#resep" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg transition duration-300">
                    Lihat Contoh Resep
                </a>
            </div>
        </div>
    </div>
</section>


<section id="resep" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Resep Terbaru</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($reseps as $resep): ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <!-- Badge Tingkat Kesulitan -->
                    <div class="absolute top-4 right-4 z-10">
                        <?php
                        $badgeColor = [
                            'Mudah' => 'bg-primary',
                            'Sedang' => 'bg-secondary text-dark',
                            'Sulit' => 'bg-accent'
                        ];
                        ?>
                        <span class="<?= $badgeColor[$resep['tingkat_kesulitan']] ?> text-white text-xs font-semibold px-3 py-1 rounded-full">
                            <?= $resep['tingkat_kesulitan'] ?>
                        </span>
                    </div>

                    <!-- Gambar Resep -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="/uploads/resep/<?= $resep['gambar'] ?>" alt="<?= $resep['judul'] ?>" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    <!-- Konten Card -->
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-dark line-clamp-1"><?= $resep['judul'] ?></h3>
                            <span class="text-sm text-gray-500 flex items-center">
                                <i class="far fa-clock mr-1"></i> <?= $resep['waktu_masak'] ?> menit
                            </span>
                        </div>

                        <p class="text-gray-600 mb-4 line-clamp-2"><?= $resep['deskripsi'] ?></p>

                        <div class="flex justify-between items-center">
                            <a href="/resep/detail/<?= $resep['id'] ?>" class="text-primary hover:text-primary-dark font-medium flex items-center">
                                Lihat Resep <i class="fas fa-chevron-right ml-1 text-sm"></i>
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty State -->
        <?php if (empty($reseps)): ?>
            <div class="text-center py-12">
                <div class="inline-block p-4 bg-primary/10 rounded-full mb-4">
                    <i class="fas fa-utensils text-primary text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-dark mb-2">Belum Ada Resep</h3>
                <p class="text-gray-500 mb-4">Mulailah dengan menambahkan resep pertama Anda</p>
                <a href="/resep/create" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg transition duration-300">
                    <i class="fas fa-plus mr-1"></i> Tambah Resep
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Komponen Resep Sehat -->
<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Komponen Penting dalam Resep Sehat</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Apa saja yang membuat sebuah resep dikategorikan sehat?</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">1</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Bahan Berkualitas</h3>
                        <p class="text-gray-600">Mengutamakan bahan segar, organik, dan minim proses pengolahan pabrik</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">2</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Keseimbangan Nutrisi</h3>
                        <p class="text-gray-600">Perpaduan tepat antara karbohidrat, protein, lemak baik, vitamin dan mineral</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">3</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Teknik Memasak</h3>
                        <p class="text-gray-600">Metode memasak yang mempertahankan nutrisi seperti steaming, grilling, atau stir-fry</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">4</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Porsi Sesuai</h3>
                        <p class="text-gray-600">Takaran yang sesuai kebutuhan kalori harian tanpa berlebihan</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">5</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Variasi</h3>
                        <p class="text-gray-600">Kombinasi berbagai jenis makanan untuk memenuhi semua kebutuhan nutrisi</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mr-4">
                        <span class="font-bold">6</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-dark mb-2">Minim Tambahan</h3>
                        <p class="text-gray-600">Sedikit atau tanpa tambahan gula, garam berlebih, pengawet, atau MSG</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Manfaat Resep Sehat -->
<section class="py-16 bg-white" id="manfaat">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Manfaat Menggunakan Resep Sehat</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Mengapa Anda harus mulai memasak dengan resep sehat?</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 p-6 rounded-lg text-center hover:bg-primary hover:text-white transition duration-300 group">
                <div class="bg-primary/10 text-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 group-hover:text-white">
                    <i class="fas fa-heartbeat text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 group-hover:text-white">Kesehatan Jantung</h3>
                <p class="text-gray-600 group-hover:text-gray-200">Mengontrol kolesterol dan tekanan darah melalui bahan makanan yang tepat</p>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg text-center hover:bg-primary hover:text-white transition duration-300 group">
                <div class="bg-primary/10 text-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 group-hover:text-white">
                    <i class="fas fa-weight text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 group-hover:text-white">Manajemen Berat Badan</h3>
                <p class="text-gray-600 group-hover:text-gray-200">Membantu mencapai dan mempertahankan berat badan ideal</p>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg text-center hover:bg-primary hover:text-white transition duration-300 group">
                <div class="bg-primary/10 text-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 group-hover:text-white">
                    <i class="fas fa-brain text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 group-hover:text-white">Energi Optimal</h3>
                <p class="text-gray-600 group-hover:text-gray-200">Memberikan energi lebih stabil sepanjang hari</p>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg text-center hover:bg-primary hover:text-white transition duration-300 group">
                <div class="bg-primary/10 text-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 group-hover:text-white">
                    <i class="fas fa-smile text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2 group-hover:text-white">Mood Lebih Baik</h3>
                <p class="text-gray-600 group-hover:text-gray-200">Nutrisi seimbang membantu meningkatkan kesehatan mental</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary py-12">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Siap Memasak Sehat Hari Ini?</h2>
        <p class="text-white mb-6">Bergabunglah dengan komunitas kami dan bagikan resep sehat Anda!</p>
        <a href="/resep/create" class="inline-block bg-white text-primary hover:bg-gray-100 font-semibold px-6 py-3 rounded-lg transition duration-300 transform hover:scale-105">
            <i class="fas fa-share-alt mr-2"></i> Bagikan Resep Anda
        </a>
    </div>
</section>



<!-- Tentang Kami -->
<section id="tentang" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Tentang ResepSehat</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <img src="/home/bg-cover.jpg" alt="Tentang Kami" class="rounded-lg shadow-lg w-full">
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-dark mb-4">Platform Resep Sehat No.1</h3>
                <p class="text-gray-600 mb-4">ResepSehat adalah komunitas pecinta makanan sehat yang bertujuan untuk menyebarkan pola makan sehat melalui resep-resep bergizi.</p>
                <p class="text-gray-600 mb-6">Kami percaya bahwa makanan sehat bisa lezat dan mudah dibuat.</p>
                <div class="flex space-x-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">10K+</div>
                        <div class="text-gray-500">Resep</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">500+</div>
                        <div class="text-gray-500">Koki</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">1M+</div>
                        <div class="text-gray-500">Pengunjung</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="py-16 bg-primary/5">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-dark mb-4">Apa Kata Mereka</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Testimoni dari komunitas ResepSehat</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User" class="w-12 h-12 rounded-full mr-4 object-cover">
                    <div>
                        <h4 class="font-semibold text-dark">Sarah Wijaya</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Resep-resep di sini sangat mudah diikuti dan hasilnya selalu enak. Berat badan saya turun 5kg dalam 2 bulan!"</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="User" class="w-12 h-12 rounded-full mr-4 object-cover">
                    <div>
                        <h4 class="font-semibold text-dark">Budi Santoso</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Sebagai pemula di dapur, resep-resep di sini sangat membantu. Instruksinya jelas dan gambarnya bagus."</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="w-12 h-12 rounded-full mr-4 object-cover">
                    <div>
                        <h4 class="font-semibold text-dark">Dewi Lestari</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Anak-anak yang biasanya susah makan sayur sekarang jadi suka berkat resep kreatif dari sini. Terima kasih!"</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Minimalis - Background Putih -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
            <h2 class="text-2xl md:text-3xl font-bold text-dark mb-4">Siap Memulai Gaya Hidup Sehat?</h2>
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Bergabunglah dengan komunitas kami sekarang dan dapatkan akses ke ratusan resep sehat eksklusif!</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/register" class="bg-primary hover:bg-primary-dark text-white font-semibold px-8 py-3 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Gratis
                </a>
                <a href="#resep" class="bg-transparent border-2 border-primary text-primary hover:bg-primary/10 font-semibold px-8 py-3 rounded-lg transition duration-300">
                    <i class="fas fa-book-open mr-2"></i> Jelajahi Menu
                </a>
            </div>

            <div class="mt-6 text-sm text-gray-500 flex items-center justify-center">
                <i class="fas fa-lock mr-2 text-primary"></i>
                <span>Keamanan data Anda terjamin</span>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Page-specific scripts can go here -->
<?= $this->endSection() ?>