<!-- app/Views/resep/add.php -->
<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Tambah Resep <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Main Form -->
<div class="max-w-4xl mx-auto px-4 py-8 bg-page">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Form Header -->
        <div class="bg-primary text-white p-6">
            <h1 class="text-2xl font-bold flex items-center">
                <i class="fas fa-plus-circle mr-3"></i> Tambah Resep Baru
            </h1>
            <p class="mt-2 opacity-90">Bagikan resep sehatmu dengan komunitas kami</p>
        </div>

        <!-- Form Content -->
        <div class="p-6 bg-primary-light">
            <?php if (session('errors')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="font-bold flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i> Perhatian
                    </div>
                    <ul class="mt-2 ml-5 list-disc">
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/resep/store" method="post" enctype="multipart/form-data" class="space-y-6">
                <!-- Judul -->
                <div>
                    <label for="judul" class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-heading text-primary mr-2"></i> Judul Resep
                    </label>
                    <input type="text" id="judul" name="judul"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400"
                        placeholder="Contoh: Salad Quinoa Segar" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-align-left text-primary mr-2"></i> Deskripsi Singkat
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400"
                        placeholder="Jelaskan tentang resep ini..." required></textarea>
                </div>

                <!-- Bahan-bahan -->
                <div>
                    <label for="bahan" class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-carrot text-primary mr-2"></i> Bahan-bahan
                    </label>
                    <div class="bg-white p-3 rounded-lg border border-gray-300">
                        <textarea id="bahan" name="bahan" rows="5"
                            class="w-full px-4 py-2 focus:outline-none placeholder-gray-400 resize-none"
                            placeholder="Pisahkan setiap bahan dengan enter&#10;Contoh:&#10;- 200g quinoa&#10;- 1 buah mentimun&#10;- 2 sdm minyak zaitun" required></textarea>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Gunakan tanda "-" untuk list bahan</p>
                </div>

                <!-- Langkah-langkah -->
                <div>
                    <label for="langkah" class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-list-ol text-primary mr-2"></i> Langkah Pembuatan
                    </label>
                    <div class="bg-white p-3 rounded-lg border border-gray-300">
                        <textarea id="langkah" name="langkah" rows="8"
                            class="w-full px-4 py-2 focus:outline-none placeholder-gray-400 resize-none"
                            placeholder="Pisahkan setiap langkah dengan enter&#10;Contoh:&#10;1. Cuci bersih quinoa&#10;2. Rebus quinoa selama 15 menit" required></textarea>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Nomor langkah akan otomatis dibuat</p>
                </div>

                <!-- Info Tambahan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Waktu Masak -->
                    <div>
                        <label for="waktu_masak" class="block text-dark font-medium mb-2 flex items-center">
                            <i class="fas fa-clock text-primary mr-2"></i> Waktu Masak (menit)
                        </label>
                        <input type="number" id="waktu_masak" name="waktu_masak" min="1"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                    </div>

                    <!-- Tingkat Kesulitan -->
                    <div>
                        <label for="tingkat_kesulitan" class="block text-dark font-medium mb-2 flex items-center">
                            <i class="fas fa-signal text-primary mr-2"></i> Tingkat Kesulitan
                        </label>
                        <select id="tingkat_kesulitan" name="tingkat_kesulitan"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none" required>
                            <option value="" disabled selected>Pilih tingkat kesulitan</option>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                    </div>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-tags text-primary mr-2"></i> Kategori
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        <?php foreach ($kategories as $kategori): ?>
                            <label class="flex items-center space-x-2 bg-white p-3 rounded-lg border border-gray-200 hover:border-primary transition cursor-pointer">
                                <input type="checkbox" name="kategories[]" value="<?= $kategori['id'] ?>"
                                    class="rounded text-primary border-gray-300 focus:ring-primary">
                                <span><?= $kategori['nama_kategori'] ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label for="gambar" class="block text-dark font-medium mb-2 flex items-center">
                        <i class="fas fa-camera text-primary mr-2"></i> Foto Resep
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 hover:border-primary rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-500">Unggah foto resep Anda</p>
                                <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (max 2MB)</p>
                            </div>
                            <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden" required>
                        </label>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4 flex justify-end space-x-4">
                    <a href="/" class="px-6 py-3 border border-gray-300 text-dark rounded-lg hover:bg-gray-100 transition">
                        <i class="fas fa-times mr-2"></i> Batal
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Resep
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('bahan').addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            const cursorPos = this.selectionStart;
            const textBefore = this.value.substring(0, cursorPos);
            const textAfter = this.value.substring(cursorPos);

            this.value = textBefore + '\n- ' + textAfter;
            this.selectionStart = this.selectionEnd = cursorPos + 3;
        }
    });

    document.getElementById('langkah').addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            const cursorPos = this.selectionStart;
            const textBefore = this.value.substring(0, cursorPos);
            const textAfter = this.value.substring(cursorPos);

            const lastNumberMatch = textBefore.match(/\d+(?=\.)/g);
            const nextNumber = lastNumberMatch ? parseInt(lastNumberMatch.pop()) + 1 : 1;

            this.value = textBefore + '\n' + nextNumber + '. ' + textAfter;
            this.selectionStart = this.selectionEnd = cursorPos + (nextNumber.toString().length) + 3;
        }
    });

    const inputGambar = document.getElementById('gambar');

    inputGambar.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const previewWrapper = e.target.closest('label');

                [...previewWrapper.children].forEach(child => {
                    if (child.tagName !== 'INPUT') {
                        previewWrapper.removeChild(child);
                    }
                });

                const previewHTML = document.createElement('div');
                previewHTML.className = "relative w-full h-full rounded-lg overflow-hidden";
                previewHTML.innerHTML = `
                    <img src="${event.target.result}" alt="Preview" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                        <span class="text-white bg-black/50 px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-sync-alt mr-1"></i> Ganti Foto
                        </span>
                    </div>
                `;
                previewWrapper.insertBefore(previewHTML, e.target);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<?= $this->endSection() ?>