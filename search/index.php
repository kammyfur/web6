<?php

if (isset($_GET['q']) && trim($_GET['q']) != "") {
    $q = $_GET['q'];
} else {
    header("Location: /");
    die();
}

$sq = str_replace("<", " ", str_replace(">", " ", $q));
$sq = str_replace("\"", " ", str_replace("\"", " ", $sq));

$sq = trim($sq);
$q = trim($q);

?>
<?php $_TITLE = "Résultats de recherche pour &quot;{$sq}&quot;"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div id="main-content" class="inner-wrapper">
    <div class="p-strip is-shallow">
        <div class="u-fixed-width">
            <h1 class="p-heading--two">Résultats de recherche pour "<?= $sq ?>"</h1>
        </div>
    </div>
    <div class="p-strip--light is-shallow">
        <div class="u-fixed-width">
            <form class="p-search-box" action="/search">
                <label for="search-input" class="u-off-screen">Rechercher</label>
                <input class="p-search-box__input" name="q" id="search-input" type="search" value="<?= $sq ?>" placeholder="ex: pinpages">
                <button type="submit" alt="search" class="p-search-box__button"><i class="p-icon--search"></i></button>
            </form>
            <?php if ($_LANGUAGE == "en"): ?>
            You're searching in <b>French</b>. However, you set the language to <b>English</b>. We're sorry but you can't get search results in English...
            <?php endif ?>
        </div>
    </div>

    <?php
    
    $first  = new DateTime( 'now' );
    $db = json_decode(utf8_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/crawler/pages.json")));
    $matches = [];    

    $keywords = explode(" ", $sq);
    foreach ($keywords as $keyword) {
        foreach ($db as $page) {
            if (trim($page->title) != "") {
                if (trim($page->tagline) != "") {
                    if (trim($keyword) != "" && (strpos($page->title, $keyword) !== false || strpos($page->tagline, $keyword) !== false || strpos($page->url, $keyword) !== false)) {
                        array_push($matches, $page);
                    }
                }
            }
        }
    }

    // var_dump($matches);
    $second = new DateTime( 'now' );
    $diff = $first->diff( $second );
    ?>
    <div class="p-strip is-shallow">
      <div class="row">
        <div class="col-12">
          <small><?= count($matches) ?> résultats en <?php
          
          if ((($diff->s * 1000) + ($diff->f * 1000)) > 10) {
            echo("<b>" . str_replace(".", ".", round(($diff->s * 1000) + ($diff->f * 1000), 3)) . "</b>");
          } else {
            echo(str_replace(".", ".", round(($diff->s * 1000) + ($diff->f * 1000), 3)));
          }
          
          ?> millisecondes</small>
        </div>
      </div>
    </div>

    <?php
    
    if (count($matches) <= 0) {
        require_once "noresults.php";
    } else {
        foreach ($matches as $match) {
            echo('<div class="p-strip is-shallow"><div class="row"><div class="col-12"><h5><a target="_blank" href="' . utf8_decode($match->url) . '" class="title-main">' . utf8_decode($match->title) . '</a></h5><p>' . utf8_decode($match->tagline) . '</p><small><a target="_blank" href="' . utf8_decode($match->url) . '">' . utf8_decode($match->url) . '</a></small></div></div></div>');
        }
    }

    ?>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>