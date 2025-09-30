<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= isset($color) ? 'Editar' : 'Nova' ?> Cor</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-8">

  <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-6"><?= isset($color) ? 'Editar' : 'Nova' ?> Cor</h1>

    <form action="index.php?controller=color&action=save" method="post" class="space-y-6">
      <?php if(isset($color)): ?>
        <input type="hidden" name="id" value="<?= $color['id'] ?>">
      <?php endif; ?>

      <div>
        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nome</label>
        <input type="text" name="name" id="name" required
               value="<?= $color['name'] ?? '' ?>"
               class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
      </div>

      <div class="flex space-x-4">
        <button type="submit" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium shadow transition">
          Salvar
        </button>
        <a href="index.php?controller=color&action=list"
           class="px-6 py-2 bg-slate-300 hover:bg-slate-400 text-slate-800 rounded-xl font-medium transition">
           Cancelar
        </a>
      </div>

    </form>
  </div>

</body>
</html>
