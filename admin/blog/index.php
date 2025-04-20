<?php $_TITLE = "Blog | Administration"; ?>
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
      'selected' => true,
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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/deny/blog.php"; ?>
    <h1>Articles du blog</h1>
    <p><a href="/admin/blog/create">Poster un nouvel article&nbsp;&rsaquo;</a></p>
    <p>
        <table>
            <thead>
                <th>Titre de l'article</th>
                <th>Date de publication</th>
                <th>Catégorie</th>
                <th>Actions disponibles</th>
            </thead>
            <tbody>
                <?php
        $posts = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
        $processed = 0;
        foreach ($posts as $item) {
            if (true) {
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
                echo('<tr><td>' . $item->title . '</td><td>' . $day . " " . $month . " " . $year . '</td><td>' . $catp . '</td><td><small><a href="/blog/article/?id=' . $item->id . '">lire</a>, <a href="/admin/blog/edit/?id=' . $item->id . '">modifier</a>, <a href="/admin/blog/delete/?id=' . $item->id . '">supprimer</a></small></td></tr>');
            }
        }
        ?>
            </tbody>
        </table>
    </p>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>