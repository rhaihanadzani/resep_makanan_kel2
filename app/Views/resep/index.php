<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Resep</h1>
    <form method="post" enctype="multipart/form-data" class="space-y-4">
        <input type="text" name="judul" placeholder="Judul" class="w-full border p-2">
        <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border p-2"></textarea>
        <textarea name="bahan" placeholder="Bahan (pisah dengan enter)" class="w-full border p-2"></textarea>
        <textarea name="langkah" placeholder="Langkah-langkah (pisah dengan enter)" class="w-full border p-2"></textarea>
        <input type="number" name="waktu_masak" placeholder="Waktu (menit)" class="w-full border p-2">
        <select name="tingkat_kesulitan" class="w-full border p-2">
            <option>Mudah</option>
            <option>Sedang</option>
            <option>Sulit</option>
        </select>
        <label class="block">Kategori:</label>

        <input type="file" name="gambar" class="w-full">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
    </form>
</body>

</html>