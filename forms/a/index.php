<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: /forms");
    die();
}
?>
<?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/forms/db/forms/" . $id . ".json")): ?>
<?php
    $form = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/forms/db/forms/" . $id . ".json"));
    ?>
<?php $_TITLE = $form->metadata->name . " | Formulaires"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
        // Navigation Config.
        $secondary = true; // Whether or not show secondary navigation
        $secConf = [
            'title' => "Formulaires",
            'homeLink' => "/forms",
            'elements' => [],
          ]; // Secondary navigation config.
    ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div class="p-strip--suru-blog-hero is-dark" id="form-header"></div>
<div id="form-outer">
    <div id="form-content">
        <h1><?= $form->metadata->name ?></h1>
        <p id="form-required-notice"><?= str_replace("*", "<span id=\"form-required-asterisk\">*</span>", $form->metadata->required) ?></p>
        <?php if (!$form->metadata->enabled): ?>
        <p>Ce formulaire a été désactivé par son créateur :</p>
        <blockquote>
            <?= $form->metadata->disabledMessage ?>
        </blockquote>
        <button onclick="location.href='/forms';">Retour</button>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>
        <?php die(); ?>
        <?php endif ?>
        <p><?= $form->metadata->tagline ?></p>
        <form id="form-controls">
            <?php if ($form->metadata->getEmails): ?>
            <div class="form-control-outer required" id="form-control-fc0">
                <h4 class="form-control-title"><?= $form->metadata->emailCollection->title ?></h4>
                <p class="form-control-description"><?= $form->metadata->emailCollection->description ?></p>
                <input type="email" name="form-control-0" id="fc0" placeholder="<?= $form->metadata->emailCollection->placeholder ?>" required="">
                <p class="form-control-require"><?= $form->metadata->thisRequired ?></p>
            </div>
            <?php endif ?>
            <?php
                $nextctrlid = 0;
                if ($form->metadata->getEmails) {
                    $nextctrlid++;
                }
                foreach ($form->controls as $control) {
                    switch ($control->type) {
                        case 'text':
                            echo("<div class=\"form-control-outer ");
                            if ($control->required) {
                                echo(" required");
                            }
                            echo("\" id=\"form-control-fc{$nextctrlid}\">
                            <h4 class=\"form-control-title\">{$control->name}</h4>
                            <p class=\"form-control-description\">{$control->description}</p>
                            <input type=\"email\" name=\"form-control-{$nextctrlid}\" id=\"fc{$nextctrlid}\" placeholder=\"{$control->placeholder}\"");
                            if ($control->required) {
                                echo(" required=\"\"");
                            }
                            echo("><p class=\"form-control-require\">{$form->metadata->thisRequired}</p></div>");
                            $nextctrlid++;
                            break;
                        default:
                            echo("<code>json_conf_error: Invalid control type</code>");
                            break;
                    }
                }
                ?>
        </form><br>
        <hr>
        <p><button onclick="pushForm();" id="form-submit"><?= $form->metadata->publishButtonName ?></button></p>
        <small id="techinfo">
            Job#<span id="jobinfo">: <?= getmypid() ?>@<?= get_current_user() ?>, file <?= $_SERVER['SCRIPT_FILENAME'] ?>, inode <?= getmyinode() ?></span>
        </small>
    </div>
</div>
<div id="form-footer">
    <center><small>
            Formulaire par Minteck Projects<br>
            N'envoyez <b>jamais</b> de mots de passes au travers de formulaires
        </small></center>
</div>
<?php else: ?>
<?php $_TITLE = "Formulaire introuvable | Formulaire"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
        // Navigation Config.
        $secondary = true; // Whether or not show secondary navigation
        $secConf = [
            'title' => "Formulaires",
            'homeLink' => "/forms",
            'elements' => [],
          ]; // Secondary navigation config.
    ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div class="p-strip--suru-blog-hero is-dark" id="form-header"></div>
<div id="form-outer">
    <div id="form-content">
        <h1>Formulaire inexistant</h1>
        <p>Le formulaire que vous essayez de remplir n'existe pas ou n'est plus disponible.</p>
        <ul>
            <li>Si vous avez cliqué sur un lien, il est peut-être invalide.
                <ul>
                    <li>Si il provient d'un site Minteck Projects, vous pouvez <a href="mailto:minteck.projects+brokenlinks@gmail.com">nous demander de le remplacer</a>.</li>
                    <li>Si il ne provient pas d'un site Minteck Projects, nous ne pouvons rien y faire.</li>
                </ul>
            </li>
            <li>Si vous avez manuellement entré l'identifiant,
                <ul>
                    <li>vérifiez que vous avez respecté les majuscules et minuscules</li>
                    <li>vérifiez que vous n'avez pas confondu plusieurs caractères</li>
                    <li>vérifiez que l'identifiant est valide</li>
                </ul>
            </li>
        </ul>
        <button onclick="location.href='/forms';">Retour</button>
    </div>
</div>
<div id="form-footer">
    <center><small>
            Formulaire par Minteck Projects<br>
            N'envoyez <b>jamais</b> de mots de passes au travers de formulaires
        </small></center>
</div>
<?php endif ?>
<script>
    function checkRequired() {
        var fields = $(".form-control-outer.required")
            .find("select, textarea, input").serializeArray();
        everythingOk = true;
        $.each(fields, function(i, field) {
            dom = document.getElementsByName(field.name)[0];
            outer = dom.parentElement;
            if (!field.value) {
                outer.classList.add("alert")
                everythingOk = false;
            } else {
                if (typeof field.value == "string" && field.value.trim() == "") {
                    outer.classList.add("alert")
                    everythingOk = false;
                } else {
                    outer.classList.remove("alert")
                }
            }
        });
        return everythingOk;
    }
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>