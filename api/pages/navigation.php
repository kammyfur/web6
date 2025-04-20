<header id="navigation" class="p-navigation">
    <div class="p-navigation__row u-fixed-width">
        <div class="p-navigation__banner">
            <div class="p-navigation__logo">
                <a class="p-navigation__link" href="/">
                    <img src="/static/logos/banners/<?= $config->logo ?>" width="48px" height="48px">
                </a>
            </div>
        </div>
        <nav class="p-navigation__nav">
            <span class="u-off-screen">
        <a href="#main-content">Jump to main content</a>
      </span>
            <ul class="p-navigation__links u-hide js-show-nav" role="menu">
                <?php foreach ($config->navigation as $nav): ?>
                <li class="p-navigation__dropdown-link<?php if (!$nav->menu): ?> nodd<?php endif; ?>" role="menuitem" id="<?= $nav->id ?>"<?php if ($nav->menu): ?><?php endif; ?>>
                <a class="p-navigation__link-anchor<?php if (!$nav->menu): ?> nodd<?php endif; ?>" href="<?php if ($nav->menu): ?>#<?= $nav->id ?>-content<?php else: ?><?= $nav->url ?><?php endif ?>" <?php if (!$nav->menu): ?>onclick="location.href=&quot;<?= $nav->url ?>&quot;"<?php endif ?><?php if ($nav->menu): ?><?php endif; ?>><?= $nav->name->$_LANGUAGE ?></a>
                </li>
                <?php endforeach ?>
            </ul>
            <?php if ($config->search): ?>
            <div class="p-navigation__search">
                <form action="/search/" class="p-search-box">
                    <input type="search" class="p-search-box__input" name="q" placeholder="<?= $lang->navigation->search ?>" required aria-label="<?= $lang->navigation->search ?>">
                    <button type="reset" class="p-search-box__reset u-no-margin--right"><i class="p-icon--close"><?= $lang->navigation->searchcancel ?></i></button>
                    <button type="submit" class="p-search-box__button"><i class="p-icon--search"><?= $lang->navigation->search ?></i></button>
                </form>
            </div>
            <?php endif ?>
        </nav>
    </div>
</header>
<div class="dropdown-window-overlay fade-animation"></div>
<div class="dropdown-window slide-animation">
    <?php foreach ($config->navigation as $nav): ?>
    <div class="u-hide" id="<?= $nav->id ?>-content">
    <div class="dropdown-window__content u-no-padding--bottom u-no-padding--top">
    <div class="p-strip is-x-shallow u-no-padding--bottom">
      <div class="row u-equal-height">
        
        <?php foreach ($nav->items as $item): ?>
        <div class="col-medium-2 col-3 p-card--navigation">
          <div class="u-hide--small">
            <h4 class="p-heading-four is-dense">
              <a href="<?= $item->link ?>"><?= $item->name->$_LANGUAGE ?>&nbsp;›</a>
            </h4>
            <p class="p-p--small">
                <?= $item->tagline->$_LANGUAGE ?>
            </p>
            <a href="<?= $item->link ?>" class="p-button--small p-button--positive u-align-text--left">
                <?= $item->button->$_LANGUAGE ?>
            </a>
          </div>
          <ul class="p-text-list--small is-bordered">
            <li class="p-list__item u-show--small u-hide--medium u-hide--large"><a href="<?= $item->link ?>"><?= $item->button->$_LANGUAGE ?></a></li>
            <?php foreach ($item->subitems as $sitem): ?>
            <li class="p-list__item"><a href="<?= $sitem->link ?>"><?= $sitem->name->$_LANGUAGE ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
    </div>
    <?php endforeach ?>
</div>
<?php
if (isset($secondary) && $secondary) {
  echo('<nav class="p-navigation--secondary"><div class="row"><div class="col-12 u-equal-height"><a class="p-navigation--secondary__banner u-hide--nav-threshold-down" href="' . $secConf['homeLink'] . '"><h5 class="p-navigation--secondary__logo">' . $secConf['title'] . '</h5></a><ul class="breadcrumbs--secondary">');
  foreach ($secConf['elements'] as $element) {
    if ($element != []) {
        if ($element['selected']) {
            echo('<li class="breadcrumbs__item"><a class="breadcrumbs__link p-link--active" href="' . $element['href'] . '">' . $element['title'] . '</a></li>');
        } else {
            echo('<li class="breadcrumbs__item"><a class="breadcrumbs__link p-link--soft" href="' . $element['href'] . '">' . $element['title'] . '</a></li>');
        }
    }
  }
  echo('</ul></div></div></nav>');
}
?>
<script>
    var nav = document.querySelector('.js-show-nav');
    var hash = window.location.hash;
    nav.classList.remove('u-hide');
    // If the page loads with a preselected hash load and open the menu
    if (hash) {
        try {
            var selected = nav.querySelector(hash);
        } catch (error) {
            console.warn("Hash " + hash + " not found in topnav");
        }
        if (selected) {
            selected.onmouseover();
        }
    }
    function fetchDropdown(url, id) {
        var div = document.getElementById(id);
        var req = new XMLHttpRequest();
        req.open('GET', url);
        req.send();
        req.addEventListener('load', function() {
            div.innerHTML = this.responseText;
        });
    }
</script>
<?php if ($autolang && !isset($_GET['hl'])): ?>
<div class="p-strip--light is-shallow">
    <div class="u-fixed-width">
        This content is shown in <b>French</b>, and your browser is set to show content in <?php
        
        switch (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)) {
            case 'fr':
                echo "<b>French</b>";
                break;

            case 'en':
                echo "<b>English</b>";
                break;

            case 'es':
                echo "<b>Spanish</b>";
                break;

            case 'de':
                echo "<b>German</b>";
                break;

            case 'nl':
                echo "<b>Dutch</b>";
                break;

            case 'ja':
                echo "<b>Japanese</b>";
                break;

            case 'jp':
                echo "<b>Japanese</b>";
                break;

            case 'zh':
                echo "<b>Chinese</b>";
                break;

            case 'ru':
                echo "<b>Russian</b>";
                break;
            
            default:
                echo "another language";
                break;
        }
        
        ?>. You can click <a href="?hl=en">here</a> to view this page in English, or <a href="?hl=fr">here</a> to hide this message.
    </div>
</div>
<?php endif ?>
<!-- <?php var_dump($_COOKIE);var_dump(!$autolang);var_dump(!isset($_COOKIE['langwarn']));var_dump($_LANGUAGE != "fr");var_dump($_LANGUAGE); ?> -->
<?php if (isset($_GET['hl']) && $_GET['hl'] == "en"): ?>
    <div class="p-strip--light is-shallow">
    <div class="u-fixed-width">
        You set this website to show in <b>English</b>. Not all content is translated, only the basic UI is translated. <i><a href=".">Reload the page</a> to continue, or click <a href="?hl=fr">here</a> to go back to French.</i>
    </div>
</div>
<?php endif ?>
<div class="wrapper u-no-margin--top">
    <div id="main-content" class="inner-wrapper">
        <?php
    if (isset($_GET['message'])) {
        echo('<div class="p-strip is-shallow u-no-padding--bottom"><div class="row"><div class="p-notification--positive"><p class="p-notification__response">' . str_replace("&lt;br&gt;", "<br>", str_replace(">", "&gt;", str_replace("<", "&lt;", $_GET['message']))) . '</p></div></div></div>');
    }
    ?>
