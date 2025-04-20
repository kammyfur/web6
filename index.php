<?php $_TITLE = "%tagline%"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
$secConf = [
  'title' => "Blog",
  'homeLink' => "/blog",
  'elements' => [
    [
      'title' => "Vue d'ensemble",
      'href' => "/blog",
      'selected' => true,
    ],
    [
      'title' => "Vue d'ensemble",
      'href' => "/blog",
      'selected' => false,
    ],
  ],
]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/takeovers.php"; // ONLY for home page ?>

<section class="p-strip is-deep is-bordered">
    <div class="row p-divider">
        <div class="col-9">
            <h3><?= $lang->blog->home->last ?></h3>
            <div id="latest-articles" class="row">
                <?php
              $processed = 0;
              foreach (json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json")) as $item) {
                // var_dump($processed);
                if ($processed < 3) {
                  $date = str_split($item->date);
                  $day = (int)(str_split($item->date)[0] . str_split($item->date)[1]);
                  $monthn = (int)(str_split($item->date)[2] . str_split($item->date)[3]);
                  $year = (int)(str_split($item->date)[4] . str_split($item->date)[5] . str_split($item->date)[6] . str_split($item->date)[7]);
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
                  echo('<div class="col-3"><h4><a class="article-link article-title" href="/blog/article/?id=' . $item->id . '">' . $item->title . '</a></h4><p class="u-no-padding--top"><em><time class="article-time">' . $day . " " . $month . " " . $year . '</time></em></p></div>');
                }
                $processed = $processed + 1;
              }
            ?>
            </div>
        </div>
    </div>
    <template style="display:none" id="articles-template">
        <div class="col-3">
            <h4><a class="article-link article-title"></a></h4>
            <p class="u-no-padding--top"><em><time datetime="" class="article-time"></time></em></p>
        </div>
    </template>
    <div class="u-sv3"></div>
    <div class="u-fixed-width">
        <a href="/blog" class="p-button--neutral">
          <?= $lang->blog->home->all ?>
        </a>
    </div>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>