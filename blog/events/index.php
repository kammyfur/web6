<?php $_TITLE = "Événements"; ?>
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
        'selected' => true,
      ],
    ],
  ]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/deny/bloguser.php"; ?>
<div>
    <section class="p-strip--suru-blog-header is-dark">
        <div class="row u-equal-height u-vertically-center">
            <div class="col-7">
                <h1><?= $lang->blog->taglines->events[0] ?></h1>
                <p class="p-heading--four">
                  <?= $lang->blog->taglines->events[1] ?>
                </p>
            </div>
            <div id="rtp-banner" class="rtp-banner"></div>
        </div>
    </section>
    <section class="p-strip is-shallow" id="posts-list">
        <div class="u-fixed-width u-align--right">
            <form action="" method="get" class="p-form p-form--inline">
                <div class="p-form__group">
                    <label for="filter" aria-label="<?= $lang->blog->filter[0] ?>" class="p-form__label"><?= $lang->blog->filter[1] ?> </label>
                    <select class="js-submit-on-change p-form__control" id="filter" name="content" aria-label="<?= $lang->blog->filter[0] ?>" style="padding-right: 40px">
                        <option value="/blog/#posts-list"><?= $lang->blog->metacat[1] ?></option>
                        <option value="/blog/maintenances"><?= $lang->blog->categories2[0] ?></option>
                        <option value="/blog/announcements"><?= $lang->blog->categories2[1] ?></option>
                        <option value="/blog/servers"><?= $lang->blog->categories2[2] ?></option>
                        <option value="/blog/ai"><?= $lang->blog->metacat[0] ?></option>
                        <option value="/blog/jobs"><?= $lang->blog->categories2[4] ?></option>
                        <option value="/blog/events"><?= $lang->blog->categories2[5] ?></option>
                    </select>
                    <input type="submit" value="<?= $lang->blog->filter[2] ?>" class="u-hide">
                </div>
            </form>
        </div>
        <script>
            var select = document.querySelector('.js-submit-on-change');
            select.addEventListener('change', function(e) {
                var form = this.closest('form');
                if (form) {
                    location.href = document.getElementById("filter").value;
                }
            });
        </script>
        <div class="row u-equal-height u-clearfix">
            <?php
            $posts = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
            $processed = 0;
            foreach ($posts as $item) {
                if ($processed < 150 && $item->category == "events") {
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
                    switch ($item->category) {
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
                            $catp = $item->category;
                            break;
                    }
                    $preintro = strip_tags($item->content);
                    if (strlen($preintro) > 100) {
                        $intro = substr($preintro, 0, 101) . "…";
                    } else {
                        $intro = $preintro;
                    }
                    echo('<div class="col-4 blog-p-card--post"><header class="blog-p-card__header--' . $item->category . '"><h5 class="p-muted-heading u-no-margin--bottom">' . $catp . '</h5></header><div class="blog-p-card__content"><h3 class="p-heading--four"><a href="/blog/article/?id=' . $item->id . '">' . $item->title . '</a></h3><p>' . $intro . '</p><p><em>' . $day . " " . $month . " " . $year . '</em></p></div></div>');
                }
                $processed = $processed + 1;
            }
            ?>
        </div>
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>