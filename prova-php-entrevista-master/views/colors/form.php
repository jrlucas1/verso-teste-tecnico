<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($color) ? 'Editar' : 'Novo' ?> Cor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1><?= isset($color) ? 'Editar' : 'Novo' ?> Cor</h1>
    <form action="index.php?controller=color&action=save" method="post">
        <?php if(isset($color)): ?>
            <input type="hidden" name="id" value="<?= $color['id'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required value="<?= $color['name'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?controller=color&action=list" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
