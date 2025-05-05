<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Detail Resep <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Main Form -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="lg:w-2/3">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <img src="/uploads/resep/<?= esc($resep['gambar']) ?>" alt="<?= esc($resep['judul']) ?>"
                    class="w-full h-96 object-cover rounded-t-xl">

                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-4xl font-bold text-green-800 mb-2"><?= esc($resep['judul']) ?></h1>
                        <div class="flex space-x-2">
                            <a href="/resep/edit/<?= esc($resep['id']) ?>" class="p-2 rounded-full bg-green-100 text-green-700 hover:bg-green-200 transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="deleteForm" action="/resep/delete/<?= esc($resep['id']) ?>" method="post" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <button type="button" onclick="confirmDelete()" class="p-2 rounded-full bg-red-100 text-red-700 hover:bg-red-200 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>




                    <p class="text-lg text-gray-600 mb-6 leading-relaxed"><?= esc($resep['deskripsi']) ?></p>

                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                            <i class="fas fa-clock text-green-600 mr-2"></i>
                            <span class="text-sm font-medium"><?= esc($resep['waktu_masak']) ?> menit</span>
                        </div>
                        <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                            <i class="fas fa-signal text-green-600 mr-2"></i>
                            <span class="text-sm font-medium"><?= esc($resep['tingkat_kesulitan']) ?></span>
                        </div>
                        <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                            <i class="fas fa-utensils text-green-600 mr-2"></i>
                            <span class="text-sm font-medium">
                                <?php
                                $bahanArray = json_decode($resep['bahan'], true) ?: [];
                                echo count($bahanArray) . ' bahan';
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-green-800 mb-4 pb-2 border-b border-green-100">
                                <i class="fas fa-list-ul text-green-600 mr-2"></i>Bahan-bahan
                            </h2>
                            <ul class="space-y-3">
                                <?php
                                $bahanArray = json_decode($resep['bahan'], true) ?: [];
                                foreach ($bahanArray as $bahan):
                                    $cleanBahan = trim(str_replace(['-', '\r', '\n'], '', $bahan));
                                    if (!empty($cleanBahan)):
                                ?>
                                        <li class="flex items-start">
                                            <span class="inline-block bg-green-100 text-green-800 rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                                <i class="fas fa-check text-xs"></i>
                                            </span>
                                            <span><?= esc($cleanBahan) ?></span>
                                        </li>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </ul>
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-green-800 mb-4 pb-2 border-b border-green-100">
                                <i class="fas fa-tags text-green-600 mr-2"></i>Kategori Makanan
                            </h2>
                            <div class="space-y-3">
                                <?php foreach ($kategoriResep as $kategori): ?>
                                    <div class="flex items-center">
                                        <span class="inline-block bg-green-100 text-green-800 rounded-full w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-tag text-xs"></i>
                                        </span>
                                        <span class="font-medium"><?= esc($kategori['nama_kategori']) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-green-800 mb-4 pb-2 border-b border-green-100">
                            <i class="fas fa-list-ol text-green-600 mr-2"></i>Langkah-langkah
                        </h2>
                        <ol class="space-y-6">
                            <?php
                            $langkahArray = json_decode($resep['langkah'], true) ?: explode("\n", $resep['langkah']);
                            foreach ($langkahArray as $index => $langkah):
                                $cleanLangkah = trim(str_replace(['\r', '\n'], '', $langkah));
                                if (!empty($cleanLangkah)):
                            ?>
                                    <li class="flex">
                                        <span class="inline-block bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-0.5 flex-shrink-0 font-bold">
                                            <?= $index + 1 ?>
                                        </span>
                                        <div>
                                            <p class="text-gray-700 leading-relaxed"><?= esc($cleanLangkah) ?></p>
                                            <?php if ($index < count($langkahArray) - 1): ?>
                                                <div class="border-l-2 border-green-200 h-6 ml-4 mt-2"></div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sidebar - Recommendations -->
        <div class="lg:w-1/3">
            <div class="bg-white p-6 rounded-xl shadow-lg sticky top-20">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-100">
                    <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Rekomendasi Resep
                </h2>
                <div class="space-y-5">
                    <?php foreach ($rekomendasi as $r): ?>
                        <a href="/resep/detail/<?= esc($r['id']) ?>" class="flex group">
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-lg">
                                <img src="/uploads/resep/<?= esc($r['gambar']) ?>" alt="<?= esc($r['judul']) ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-700 transition"><?= esc($r['judul']) ?></h3>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <span class="flex items-center mr-3">
                                        <i class="fas fa-clock text-xs mr-1 text-green-600"></i>
                                        <?= esc($r['waktu_masak']) ?>m
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-signal text-xs mr-1 text-green-600"></i>
                                        <?= esc($r['tingkat_kesulitan']) ?>
                                    </span>
                                </div>
                                <div class="mt-2 flex">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <i class="fas fa-star text-xs <?= $i < 4 ? 'text-yellow-400' : 'text-gray-300' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tips Memasak</h3>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                        <p class="text-sm text-yellow-800">Gunakan bahan-bahan segar untuk hasil terbaik. Simpan sayuran dalam kulkas sebelum digunakan untuk menjaga kesegarannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Konfirmasi Hapus</h3>
        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus resep ini? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex justify-end space-x-3">
            <button id="cancelDelete" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Batal</button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Resep ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
<?= $this->endSection() ?>