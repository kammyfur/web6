<?php $_TITLE = $_POST['title'] . " | Blog"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = true; // Whether or not show secondary navigation
$secConf = [
  'title' => "Blog",
  'homeLink' => "/blog",
  'elements' => [
    [
      'title' => "Vue d'ensemble",
      'href' => "/blog",
      'selected' => false,
    ],
    [
      'title' => "Maintenances",
      'href' => "/blog/maintenances",
      'selected' => false,
    ],
    [
      'title' => "Annonces",
      'href' => "/blog/announcements",
      'selected' => false,
    ],
    [
      'title' => "Serveurs",
      'href' => "/blog/servers",
      'selected' => false,
    ],
    [
      'title' => "IA",
      'href' => "/blog/ai",
      'selected' => false,
    ],
    [
      'title' => "Recrutement",
      'href' => "/blog/jobs",
      'selected' => false,
    ],
    [
      'title' => "Événements",
      'href' => "/blog/events",
      'selected' => false,
    ],
  ],
]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<article>
    <header class="p-strip--image is-shallow" style="background-image: url('/static/assets/article.png');">
        <div class="row">
            <div class="col-8">
                <h1><?= $_POST['title'] ?></h1>
            </div>
        </div>
        <?php
        switch (date('m')) {
            case 1:
                $month = "janvier";
                break;
            case 2:
                $month = "février";
                break;
            case 3:
                $month = "mars";
                break;
            case 4:
                $month = "avril";
                break;
            case 5:
                $month = "mai";
                break;
            case 6:
                $month = "juin";
                break;
            case 7:
                $month = "juillet";
                break;
            case 8:
                $month = "août";
                break;
            case 9:
                $month = "septembre";
                break;
            case 10:
                $month = "octobre";
                break;
            case 11:
                $month = "novembre";
                break;
            case 12:
                $month = "décembre";
                break;
            default:
                $month = $monthn;
                break;
        }
        switch ($_POST['category']) {
            case "maintenances":
                $catp = "Maintenance";
                break;
            case "announcements":
                $catp = "Annonce";
                break;
            case "servers":
                $catp = "Serveur";
                break;
            case "ai":
                $catp = "Intelligence artificielle";
                break;
            case "jobs":
                $catp = "Recrutement";
                break;
            case "events":
                $catp = "Événement";
                break;
            default:
                $catp = $_POST['category'];
                break;
        }
        ?>
        <div class="row">
            <div class="col-8">
                <div class="p-media-object">
                    <div class="p-media-object__details">
                        <p class="p-media-object__content">Publié le <?= date('d') ?> <?= $month ?> <?= date('Y') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <p>
                    <strong>Catégorie :</strong>
                    <?= $catp ?>
                </p>
            </div>
        </div>
    </header>
    <section class="p-strip is-shallow" style="overflow-x: initial;">
        <div class="row u-equal-height">
            <div class="col-8">
                <div class="p-post__content">
                    <?= $_POST['content'] ?>
                </div>
            </div>
        </div>
    </section>
</article>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>