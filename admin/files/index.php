<?php $_TITLE = "Fichiers | Administration"; ?>
<script>
    window.history.pushState({
        'html': null,
        'pageTitle': '.'
    }, '', '#/preload');
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<script>
    window.history.pushState({
        'html': null,
        'pageTitle': '.'
    }, '', '#/loading');
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<script>
    window.history.pushState({
        'html': null,
        'pageTitle': '.'
    }, '', '#/render');
</script>
<?php
// Navigation Config.
$secondary = true; // Whether or not show secondary navigation
$secConf = [
  'title' => "Gestion",
  'homeLink' => "/admin",
  'elements' => [
    [
      'title' => "Accueil",
      'href' => "/admin",
      'selected' => false,
    ],
    [
      'title' => "Blog",
      'href' => "/admin/blog",
      'selected' => false,
    ],
    [
      'title' => "Fichiers",
      'href' => "/admin/files",
      'selected' => true,
    ],
    [
      'title' => "Maintenances",
      'href' => "/admin/maintenance",
      'selected' => false,
    ],
    [
      'title' => "Télémétrie",
      'href' => "/admin/telemetry",
      'selected' => false,
    ],
  ],
]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<section id="page_content">
    <h1>Gestionnaire de fichiers PolFM</h1>
    <script>
        window.history.pushState({
            'html': null,
            'pageTitle': '.'
        }, '', '#/postload');
    </script>
    <iframe src="/admin/files/detach.php" frameborder="0" style="width:100%;height:50vh;border:#ddd 1px solid;" onload="url=document.getElementsByTagName('iframe')[0].contentWindow.location.href.replace('http://localhost:25501/admin/files/detach.php?', '');window.history.pushState({'html':null,'pageTitle':'.'},'', '#' + url);"></iframe>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>
<script>
    window.history.pushState({
        'html': null,
        'pageTitle': '.'
    }, '', '#/home');
</script>