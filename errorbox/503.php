<?php $_TITLE = "%error%"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php $secondary = false; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div class="p-strip is-deep">
    <div class="row u-equal-height">
        <div class="col-6 u-vertically-center u-align--center">
            <img src="/static/assets/error.png" alt="" loading="auto" title="" width="360" height="365">
        </div>
        <div class="col-6 u-vertically-center">
            <div>
                <h1>503<?= $lang->errors->separator ?> <?= $lang->errors->e503[0] ?></h1>
                <p class="p-heading--four"><?= $lang->errors->e503[1] ?></p>
            </div>
        </div>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>