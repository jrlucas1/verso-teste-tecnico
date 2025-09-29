<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1>Usuários</h1>
    <a href="index.php?controller=user&action=form" class="btn btn-primary mb-3">Novo Usuário</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cores</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= !empty($user['colors']) ? $user['colors'] : '-' ?></td>
                    <td>
                        <a href="index.php?controller=user&action=form&id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
