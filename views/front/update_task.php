<div class="container mb-5">
    <h1>Görev Güncelleme</h1>

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

    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($task['title']) ? $task['title'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?php echo isset($task['description']) ? $task['description'] : '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Görev Oluştur</button>
        <a href="/tasks" class="btn mt-2" style="background-color: #dc3545; color: white;">Geri Dön</a>
    </form>
</div>
