<?php $_TITLE = "Administration"; ?>
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
      'selected' => true,
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
    <h1>Bienvenue <?= ucwords(str_replace(".", " ", str_replace("_", " ", str_replace("-", " ", $_SERVER['REMOTE_USER'])))); ?></h1>
    <h2>Blog</h2>
    <div class="row u-equal-height u-clearfix">
        <?php
        $posts = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
        $processed = 0;
        foreach ($posts as $item) {
            if ($processed < 3) {
                $date = str_split($item->date);
                $day = (int)(str_split($item->date)[0] . str_split($item->date)[1]);
                $monthn = (int)(str_split($item->date)[2] . str_split($item->date)[3]);
                $year = (int)(str_split($item->date)[4] . str_split($item->date)[5] . str_split($item->date)[6] . str_split($item->date)[7]);
                switch ($monthn) {
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
                switch ($item->category) {
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
                        $catp = $item->category;
                        break;
                }
                $preintro = strip_tags($item->content);
                if (strlen($preintro) > 100) {
                    $intro = substr($preintro, 0, 101) . "…";
                } else {
                    $intro = $preintro;
                }
                echo('<div class="col-4 blog-p-card--post"><header class="blog-p-card__header--' . $item->category . '"><h5 class="p-muted-heading u-no-margin--bottom">' . $catp . '</h5></header><div class="blog-p-card__content"><h3 class="p-heading--four"><a href="/blog/article/?id=' . $item->id . '">' . $item->title . '</a></h3><p>' . $intro . '</p><p><em>le ' . $day . " " . $month . " " . $year . '</em></p></div></div>');
            }
            $processed = $processed + 1;
        }
        ?>
    </div>
    <ul>
        <li><a href="/admin/blog/create">Poster un nouvel article</a></li>
    </ul>
    <h2>Options disponibles</h2>
    <ul>
        <li><a href="/admin/blog">Modification du blog</a></li>
        <li><a href="/admin/files">Gestionnaire de fichiers PolFM</a></li>
        <li><a href="/admin/maintenance">Opérations de maintenance</a></li>
        <li><a href="/admin/telemetry">Données analytiques et télémétrie</a></li>
    </ul>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>