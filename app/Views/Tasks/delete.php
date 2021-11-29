<?= $this->extend('layouts/default') ?>

<?= $this->section ('title') ?>Delete Service<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Delete Service</h1>

<p>Are you sure you want to delete this?</p>

<?= form_open("tasks/delete/" . $task->id) ?>

    <button>Yes</button>
    <a href="<?= site_url('/tasks/show/' . $task->id) ?>">Cancel</a>

</form>

<?= $this->endSection() ?>  