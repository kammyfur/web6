<?php $_TITLE = "Maintenance | Administration"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
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
      'selected' => false,
    ],
    [
      'title' => "Maintenances",
      'href' => "/admin/maintenance",
      'selected' => true,
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
    <h1>Opérations de maintenance</h1>
    <p>Le <b>mode maintenance</b> est un mode spécial de ce site qui permet de refuser l'accès aux pages autres que l'administration dans le cas où vous devez effectuer une opération de maintenance qui demande d'interrompre l'accès au site.</p>
    <p>
        <a href="/maintenance.php">Voir la page qui s'affiche lors d'une opération de maintenance ›</a><br>
        <?= file_exists($_SERVER['DOCUMENT_ROOT'] . "/.maintenance") ? "La maintenance est actuellement <b>activée</b>, <i>seule l'administration est accessible</i>." : "La maintenance est actuellement <b>désactivée</b>, <i>tout le site est accessible</i>." ?>
    </p>
    <p>
        <button onclick="toggleMaintenance();"><?= file_exists($_SERVER['DOCUMENT_ROOT'] . "/.maintenance") ? "Désactiver" : "Activer" ?> la maintenance</button>
    </p>
</section>
<script src="/admin/api.js"></script>
<script>
    function toggleMaintenance() {
        Polymermin.apiCommand("v1", "maintenance/toggle", {}, "post", ".", () => {
            alert("Impossible de désactiver la maintenance, vérifiez que vous n'avez pas bloqué le disque en lecture seule");
        })
    }
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>