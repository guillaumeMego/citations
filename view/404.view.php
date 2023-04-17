<?php 
$title = 'Page introuvable';
ob_start();
?>
<div class="404 text-center">
    
<p>Rien n'est jamais perdu tant qu'il reste quelque chose a trouver</p>
<cite>Pierre Dac</cite>
<br>
<img src="../public/asset/img/404.jpg" height="400px" alt="">
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template.php';
?>
