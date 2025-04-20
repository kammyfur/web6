<?php $_TITLE = "Nous contacter"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
$secConf = []; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<section id="page_content">
    <h1><?= $lang->contact->title ?></h1>
    <p><?= $lang->contact->tagline ?></p>
    <h2><?= $lang->contact->matrix->title ?></h2>
    <p>
      <?= $lang->contact->matrix->tagline ?>
      <ul>
        <li><a target="_blank" href="https://matrix.to/#/<?= $contactinfo->matrix ?>"><?= $contactinfo->matrix ?></a></li>
      </ul>
    </p>
    <h2><?= $lang->contact->email->title ?></h2>
    <p>
      <?= $lang->contact->email->tagline ?>
      <ul>
        <li><b><?= $lang->contact->email->subjects->fixes ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->fixes ?>"><?= $contactinfo->email->fixes ?></a></li>
        <li><b><?= $lang->contact->email->subjects->legal ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->legal ?>"><?= $contactinfo->email->legal ?></a></li>
        <li><b><?= $lang->contact->email->subjects->partner ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->partner ?>"><?= $contactinfo->email->partner ?></a></li>
        <li><b><?= $lang->contact->email->subjects->members ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->members ?>"><?= $contactinfo->email->members ?></a></li>
        <li><b><?= $lang->contact->email->subjects->account ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->account ?>"><?= $contactinfo->email->account ?></a></li>
        <li><b><?= $lang->contact->email->subjects->security ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->security ?>"><?= $contactinfo->email->security ?></a></li>
        <li><b><?= $lang->contact->email->subjects->other ?></b> <a target="_blank" href="mailto:<?= $contactinfo->email->other ?>"><?= $contactinfo->email->other ?></a></li>
      </ul>
    </p>
    <h2><?= $lang->contact->twitter->title ?></h2>
    <p>
      <?= $lang->contact->twitter->tagline ?>
      <ul>
        <li><a target="_blank" href="https://twitter.com/<?= $contactinfo->twitter ?>">@<?= $contactinfo->twitter ?></a></li>
      </ul>
    </p>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>