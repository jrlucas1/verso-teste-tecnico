<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= isset($user) ? 'Editar' : 'Novo' ?> Usuário</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-8">
  <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-6"><?= isset($user) ? 'Editar' : 'Novo' ?> Usuário</h1>

    <form action="index.php?controller=user&action=save" method="post" class="space-y-6">
      <?php if(isset($user)): ?>
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <?php endif; ?>

      <!-- Nome -->
      <div>
        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nome</label>
        <input type="text" name="name" id="name" required
               value="<?= $user['name'] ?? '' ?>"
               class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
        <input type="email" name="email" id="email" required
               value="<?= $user['email'] ?? '' ?>"
               class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
      </div>

      <div>
        <span class="block text-sm font-medium text-slate-700 mb-2">Cores</span>
        <div class="flex flex-wrap gap-3">
          <?php foreach($colors as $color): ?>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" name="colors[]" value="<?= $color['id'] ?>"
                <?= in_array($color['id'], $userColors) ? 'checked' : '' ?>
                class="w-4 h-4 text-emerald-500 border-slate-300 rounded focus:ring-emerald-500">
              <span class="text-sm text-slate-700"><?= htmlspecialchars($color['name']) ?></span>
              <span class="w-4 h-4 rounded-full border border-slate-300" 
                    style="background-color: <?= htmlspecialchars($color['name'] ?? '#ccc') ?>;"></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="flex space-x-4">
        <button type="submit" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium shadow transition">
          Salvar
        </button>
        <a href="index.php?controller=user&action=list"
           class="px-6 py-2 bg-slate-300 hover:bg-slate-400 text-slate-800 rounded-xl font-medium transition">
           Cancelar
        </a>
      </div>

    </form>
  </div>

</body>
</html>
