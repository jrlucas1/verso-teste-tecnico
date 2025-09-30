<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-8">
  <?php include __DIR__ . '/../partials/navbar.php'; ?>
  <div class="mx-auto my-auto bg-white shadow-xl  p-8">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Usuários</h1>
      <a href="index.php?controller=user&action=form" 
         class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-medium shadow-sm transition">
         + Novo Usuário
      </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200">
      <table class="w-full text-left">
        <thead class="bg-slate-50 border-b border-slate-200">
          <tr>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">ID</th>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">Nome</th>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">Email</th>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">Cores</th>
            <th class="py-3 px-5 text-sm font-semibold text-center text-slate-600">Ações</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
          <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
              <tr class="hover:bg-slate-50 transition">
                <td class="py-3 px-5 text-sm text-slate-700"><?= $user['id'] ?></td>
                <td class="py-3 px-5 text-sm font-medium text-slate-900"><?= htmlspecialchars($user['name']) ?></td>
                <td class="py-3 px-5 text-sm text-slate-600"><?= htmlspecialchars($user['email']) ?></td>
                <td class="py-3 px-5">
                  <?php if(!empty($user['colors'])): ?>
                    <?php foreach(explode(',', $user['colors']) as $color): ?>
                      <span class="inline-block w-5 h-5 rounded-full mr-1 border border-slate-300"
                            style="background-color: <?= htmlspecialchars(trim($color)) ?>;">
                      </span>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <span class="text-xs text-slate-400 italic">-</span>
                  <?php endif; ?>
                </td>
                <td class="py-3 px-5 text-center space-x-2">
                  <a href="index.php?controller=user&action=form&id=<?= $user['id'] ?>"
                     class="px-3 py-1.5 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg text-xs font-medium shadow transition">
                     Editar
                  </a>
                  <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>"
                     onclick="return confirm('Deseja realmente excluir?')"
                     class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-xs font-medium shadow transition">
                     Excluir
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="py-6 text-center text-slate-400 text-sm">Nenhum usuário encontrado.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
