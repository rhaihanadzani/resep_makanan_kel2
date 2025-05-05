    <!-- Footer -->
    <footer class="bg-primary text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">ResepSehat</h3>
                    <p class="text-gray-300">Platform berbagi resep sehat untuk semua kalangan.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#resep" class="text-gray-300 hover:text-accent transition">Resep</a></li>
                        <li><a href="#tentang" class="text-gray-300 hover:text-accent transition">Tentang</a></li>
                        <li><a href="/resep/create" class="text-gray-300 hover:text-accent transition">Tambah Resep</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Kontak</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-envelope mr-2 text-accent"></i> hello@resepsehat.com</li>
                        <li class="flex items-center"><i class="fas fa-phone mr-2 text-accent"></i> +62 123 4567 890</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Sosial Media</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-accent text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-300 hover:text-accent text-xl"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-300 hover:text-accent text-xl"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-gray-300 hover:text-accent text-xl"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 text-center text-gray-300">
                <p>&copy; <?= date('Y') ?> ResepSehat. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <button id="backToTop" class="fixed bottom-8 right-8 bg-accent text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 3000
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session()->getFlashdata('error') ?>'
            });
        <?php endif; ?>
    </script>

    <?= $this->renderSection('scripts') ?>
    </body>

    </html>