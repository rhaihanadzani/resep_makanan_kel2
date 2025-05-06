<!-- app/Views/layouts/header.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'ResepSehat' ?> | Temukan Resep Makanan Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <style>
        .bg-primary {
            background-color: #4CAF50;
        }

        .bg-secondary {
            background-color: #FFEB3B;
        }

        .bg-accent {
            background-color: #FF7043;
        }

        .bg-page {
            background-color: #F1F8E9;
        }

        .text-primary {
            color: #4CAF50;
        }

        .text-secondary {
            color: #FFEB3B;
        }

        .text-accent {
            color: #FF7043;
        }

        .text-dark {
            color: #2E7D32;
        }

        .border-primary {
            border-color: #4CAF50;
        }

        .hover\:bg-primary-dark:hover {
            background-color: #388E3C;
        }

        .hover\:bg-accent-dark:hover {
            background-color: #F1F8E9;
        }

        body {
            background-color: #F1F8E9;
            color: #2E7D32;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #4CAF50 0%, #81C784 100%);
        }
    </style>
    <?= $this->renderSection('head') ?>
</head>

<body class="bg-page text-dark min-h-screen">

    <!-- Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-primary flex items-center">
                    <i class="fas fa-leaf mr-2"></i> ResepSehat
                </h1>
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="text-dark hover:text-primary transition duration-300">Home</a>
                <a href="/#resep" class="text-dark hover:text-primary transition duration-300">Resep</a>
                <a href="/#tentang" class="text-dark hover:text-primary transition duration-300">Tentang Kami</a>
                <a href="/#manfaat" class="text-dark hover:text-primary transition duration-300">Manfaat</a>

            </nav>
            <button class="md:hidden text-primary">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </header>