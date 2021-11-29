<?= $this->extend('layouts/default') ?>

<?= $this->section ('title') ?>Edit Service<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Edit Service</h1>

<?php if (session() ->has ('errors')): ?>

    <ul>
        <?php foreach (session('errors') as $error): ?>

            <li><?= $error ?></li>

        <?php endforeach; ?>
    </ul>

<?php endif ?>

<!-- <form method="POST" action="/tasks/create">  -->

<?= form_open("/tasks/update/" . $task->id) ?>

<?= $this->include('Tasks/form') ?>

<button>Save</button>
<a href="<?= site_url("/tasks/show/" . $task->id) ?>">Cancel</a>

</form>

<?= $this->endSection() ?>  