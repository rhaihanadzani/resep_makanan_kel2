<!-- app/Views/layouts/default.php -->
<?= $this->include('layouts/header') ?>

<main>
    <?= $this->renderSection('content') ?>
</main>

<?= $this->include('layouts/footer') ?>