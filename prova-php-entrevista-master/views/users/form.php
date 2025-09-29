<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($user) ? 'Editar' : 'Novo' ?> Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1><?= isset($user) ? 'Editar' : 'Novo' ?> Usuário</h1>
    <form action="index.php?controller=user&action=save" method="post">
        <?php if(isset($user)): ?>
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required value="<?= $user['name'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?= $user['email'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?controller=user&action=list" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
