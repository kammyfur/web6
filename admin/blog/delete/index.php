<?php
if (!isset($_GET['id'])) {
    header("Location: /blog");
    die();
} else {
    $id = $_GET['id'];
}
$articles = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
foreach ($articles as $article) {
    if ($article->id == $id) {
        $selected = $article;
    }
}
if (!isset($selected)) {
    header("Location: /admin/blog");
    die();
}
?>
<?php $_TITLE = "Supprimer l'article | Blog | Administration"; ?>
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
    <h1>Supprimer l'article de blog</h1>
    <div class="row u-equal-height u-clearfix">
        <div></div>
        <?php
        $posts = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
        $processed = 0;
        foreach ($posts as $item) {
            if ($item->id == $id) {
                if ($processed < 1) {
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
        }
        ?>
    </div>
    <p>Vous allez supprimer cet article. Tous les liens pointant vers lui ne seront plus valides et renverront une erreur (404, <a href="/errorbox/404.php" target="_blank"><small>voir ici</small></a>). Cette action est irréversible et l'article supprimé ne pourra pas être récupéré. L'article ne sera plus présent sur la page <a href="/blog" target="_blank">du blog</a> et dans la base de données.</p>
    <p>
        <button onclick="rmart()">Supprimer l'article</button> &nbsp; <small><a href="/admin/blog">Ne pas supprimer</a></small>
    </p>
</section>
<script src="/admin/api.js"></script>
<script>
    function rmart() {
        id = "<?= $id ?>";
        Polymermin.apiCommand("v1", "blog/delete", {
            id: id
        }, "post", "/admin/blog/?message=Article+supprimé,+il+ne+sera+plus+disponible+après+une+vidange+du+cache", () => {
            alert("Impossible de supprimer l'article");
        })
    }
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>