<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Görevler</h1>
        <a href="/tasks/create" class="btn btn-primary">Yeni Görev Ekle</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">Açıklama</th>
                <th scope="col">Durum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <th scope="row"><?php echo $task['id']; ?></th>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['description']; ?></td>
                    <td>
                        <a href="/tasks/edit/<?= htmlspecialchars($task['id']) ?>" class="btn btn-sm btn-warning">Düzenle</a>
                        <a href="/tasks/delete/<?= htmlspecialchars($task['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bu görevi silmek istediğinize emin misiniz?');">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>