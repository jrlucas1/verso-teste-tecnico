<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>Cores</h1>
    <a href="index.php?controller=color&action=form" class="btn btn-primary mb-3">Nova cor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($colors)): ?>
            <?php foreach($colors as $color): ?>
                <tr>
                    <td><?= $color['id'] ?></td>
                    <td><?= htmlspecialchars($color['name']) ?></td>
                    <td>
                        <a href="index.php?controller=color&action=form&id=<?= $color['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?controller=color&action=delete&id=<?= $color['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhuma cor encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
