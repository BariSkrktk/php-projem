<div class="container mb-5">
    <h1>Yeni Görev Ekleme</h1>

    <form action="create/task" method="POST">

        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Görev başlığını girin">
        </div>

        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Görev açıklamasını girin"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Görev Oluştur</button>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3"> role ="alert">
                <?php echo ($error) ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo ($success) ?>
            <?php endif; ?>
            </div>
    </form>
</div>