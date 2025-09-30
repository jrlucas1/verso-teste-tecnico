<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Cores</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-8">
  <?php include __DIR__ . '/../partials/navbar.php'; ?>
  <div class="mx-auto my-auto bg-white shadow-xl p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-slate-800">Cores</h1>
      <a href="index.php?controller=color&action=form" 
         class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium shadow transition">
         Nova Cor
      </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200">
      <table class="w-full text-left">
        <thead class="bg-slate-50 border-b border-slate-200">
          <tr>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">ID</th>
            <th class="py-3 px-5 text-sm font-semibold text-slate-600">Nome</th>
            <th class="py-3 px-5 text-sm font-semibold text-center text-slate-600">Ações</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
          <?php if(!empty($colors)): ?>
            <?php foreach($colors as $color): ?>
              <tr class="hover:bg-slate-50 transition">
                <td class="py-3 px-5 text-sm text-slate-700"><?= $color['id'] ?></td>
                <td class="py-3 px-5 text-sm flex items-center space-x-2">
                  <span class="w-4 h-4 rounded-full border border-slate-300" 
                        style="background-color: <?= htmlspecialchars($color['name'] ?? '#ccc') ?>;"></span>
                  <span><?= htmlspecialchars($color['name']) ?></span>
                </td>
                <td class="py-3 px-5 text-center space-x-2">
                  <a href="index.php?controller=color&action=form&id=<?= $color['id'] ?>"
                     class="px-3 py-1.5 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg text-xs font-medium shadow transition">
                     Editar
                  </a>
                  <a href="index.php?controller=color&action=delete&id=<?= $color['id'] ?>"
                     onclick="return confirm('Deseja realmente excluir?')"
                     class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-xs font-medium shadow transition">
                     Excluir
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="3" class="py-6 text-center text-slate-400 text-sm">Nenhuma cor encontrada.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
