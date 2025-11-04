<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Görevler</h1>
        <a href="/tasks/create" class="btn btn-primary">Yeni Görev Ekle</a>
    </div>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tarih</th>
                <th scope="col">Başlık</th>
                <th scope="col">Açıklama</th>
                <th scope="col">Durum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <th scope="row"><?php echo $task['id']; ?></th>
                    <th scope="row"><?php echo $task['created_at']; ?></th>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['description']; ?></td>
                    <td>
                        <a href="/update/task/<?php echo ($task['id']) ?>" class="btn btn-sm btn-warning">Düzenle</a>
                        <a href="/delete/task/<?php echo ($task['id']) ?>" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
