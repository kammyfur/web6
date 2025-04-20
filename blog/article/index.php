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
    header("Location: /blog");
    die();
}
?>
<?php $_TITLE = $selected->title . " | Blog"; ?>
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
        'title' => $lang->blog->metacat[2],
        'href' => "/blog",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->categories2[0],
        'href' => "/blog/maintenances",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->categories2[1],
        'href' => "/blog/announcements",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->categories2[2],
        'href' => "/blog/servers",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->metacat[0],
        'href' => "/blog/ai",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->categories2[4],
        'href' => "/blog/jobs",
        'selected' => false,
      ],
      [
        'title' => $lang->blog->categories2[5],
        'href' => "/blog/events",
        'selected' => false,
      ],
    ],
  ]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/deny/bloguser.php"; ?>
<article>
    <header class="p-strip--image is-shallow" style="background-image: url('/static/assets/article.png');">
        <div class="row">
            <div class="col-8">
                <h1><?= $selected->title ?></h1>
            </div>
        </div>
        <?php
        $date = str_split($selected->date);
        $day = (int)(str_split($selected->date)[0] . str_split($selected->date)[1]);
        $monthn = (int)(str_split($selected->date)[2] . str_split($selected->date)[3]);
        $year = (int)(str_split($selected->date)[4] . str_split($selected->date)[5] . str_split($selected->date)[6] . str_split($selected->date)[7]);
        switch ($monthn) {
            case 1:
                $month = $lang->blog->months[0];
                break;
              case 2:
                $month = $lang->blog->months[1];
                break;
              case 3:
                $month = $lang->blog->months[2];
                break;
              case 4:
                $month = $lang->blog->months[3];
                break;
              case 5:
                $month = $lang->blog->months[4];
                break;
              case 6:
                $month = $lang->blog->months[5];
                break;
              case 7:
                $month = $lang->blog->months[6];
                break;
              case 8:
                $month = $lang->blog->months[7];
                break;
              case 9:
                $month = $lang->blog->months[8];
                break;
              case 10:
                $month = $lang->blog->months[9];
                break;
              case 11:
                $month = $lang->blog->months[10];
                break;
              case 12:
                $month = $lang->blog->months[11];
                break;
            default:
                $month = $monthn;
                break;
        }
        switch ($selected->category) {
            case "maintenances":
                $catp = $lang->blog->categories[0];
                break;
            case "announcements":
                $catp = $lang->blog->categories[1];
                break;
            case "servers":
                $catp = $lang->blog->categories[2];
                break;
            case "ai":
                $catp = $lang->blog->categories[3];
                break;
            case "jobs":
                $catp = $lang->blog->categories[4];
                break;
            case "events":
                $catp = $lang->blog->categories[5];
                break;
            default:
                $catp = $selected->category;
                break;
        }
        ?>
        <div class="row">
            <div class="col-8">
                <div class="p-media-object">
                    <div class="p-media-object__details">
                        <p class="p-media-object__content"><?= $lang->blog->publish ?> <?= $day ?> <?= $month ?> <?= $year ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <p>
                    <strong><?= $lang->blog->category ?></strong>
                    <a href="/blog/<?= $selected->category ?>"><?= $catp ?></a>
                </p>
            </div>
        </div>
    </header>
    <section class="p-strip is-shallow" style="overflow-x: initial;">
        <div class="row u-equal-height">
            <div class="col-8">
                <div class="p-post__content">
                    <?= $selected->content ?>
                </div>
            </div>
        </div>
    </section>
</article>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>