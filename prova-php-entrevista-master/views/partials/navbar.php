<?php
$navItems = [
    ['label' => 'Usuários', 'link' => 'index.php?controller=user&action=list', 'id' => 'user'],
    ['label' => 'Cores', 'link' => 'index.php?controller=color&action=list', 'id' => 'color']
];

$currentController = $_GET['controller'] ?? '';
?>

<nav class="bg-white shadow-md">
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between items-center h-16">

      <div class="font-bold text-xl text-slate-800">VersoTech</div>

      <div class="hidden md:flex md:space-x-6">
        <?php foreach($navItems as $item): ?>
          <a href="<?= $item['link'] ?>"
             class="px-3 py-2 rounded-md text-sm font-medium <?= $currentController === $item['id'] ? 'bg-slate-100 font-bold' : 'text-slate-700 hover:bg-slate-100' ?> transition">
            <?= $item['label'] ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Hamburger mobile -->
      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-slate-700 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

    </div>
  </div>

  <!-- Menu mobile -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pt-2 pb-4 space-y-1">
    <?php foreach($navItems as $item): ?>
      <a href="<?= $item['link'] ?>"
         class="block px-3 py-2 rounded-md text-base font-medium <?= $currentController === $item['id'] ? 'bg-slate-100 font-bold' : 'text-slate-700 hover:bg-slate-50' ?>">
        <?= $item['label'] ?>
      </a>
    <?php endforeach; ?>
  </div>
</nav>

<script>
const btn = document.getElementById('mobile-menu-button');
const menu = document.getElementById('mobile-menu');
btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
</script>
