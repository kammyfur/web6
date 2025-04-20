<?php $_TITLE = "Télémétrie | Administration"; ?>
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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/deny/telemetry.php"; ?>
    <h1>Données de télémétrie</h1>
    <p>Les données de télémétrie sont soumises à un délai de 24 heures, le temps d'être transmises entre tous les serveurs et traitées correctement.</p>
    <div id="telemetry">
        <?php
      $db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/admin/telemetry/tmdb.json"));
      $index = 0;
      ?>
      <table style="margin-left:20px;" class="telemetry-site"><tbody>
      <?php
      foreach ($db as $table) {
        $id = $table->site->id;
        echo('<tr><td><img style="vertical-align:middle;" width="36px" height="36px" src="' . $table->site->logo . '">&nbsp;' . $table->site->name . '</td><td>' . $table->value . '</td></tr>');
      }
      ?>
      </tbody></table>
    </div>
</section>
<script src="/admin/api.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>
