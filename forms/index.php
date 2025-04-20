<?php $_TITLE = "Formulaires"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div class="p-strip--suru-blog-hero is-dark forms-selector-head" id="form-header">
    <div class="u-fixed-width">
        <h4>Formulaires et sondages de l'équipe Minteck Projects</h4>
    </div>
    <div class="row u-equal-height u-clearfix"></div>
</div><br>
<div id="forms-selector">
    <p>Cette interface de formulaire nous permet plus rapidement de savoir votre avis sur les différents services de Minteck Projects. Vous n'avez besoin de rien installer sur votre appareil, et vous pouvez répondre sur ordinateur comme sur mobile...</p>
    <p>Pour commencer, entrez simplement l'identifiant du formulaire qui vous a été donné par un membre de Minteck Projects. Si vous n'avez pas reçu d'identifiant de formulaire, vous devez en demander un à un membre de Minteck Projects.</p>
    <p>
        <center>
            <input type="text" class="p-search-box__input mprj-textbox" name="formid" id="formid" placeholder="Identifiant du formulaire">
            <button onclick="answerForm();">Répondre</button>
        </center>
    </p>
    <p>
        <center>
            <a class="forms-selector-go" href="mailto:minteck.projects+form-request@gmail.com">Demander un identifiant de formulaire&nbsp;&rsaquo;</a>
        </center>
    </p>
    <p><br><br><br></p>
</div>
<section id="page_content">
    <div id="forms-what-is">
        <div>
            <center>
                <h2>Ce que c'est...</h2>
                <p>
                    Ce système de formulaire nous permet de vous proposer des sondages, des enquêtes, ou des votes, afin d'améliorer les services de Minteck Projects pour qu'ils conviennent à tous.
                </p>
                <p>
                    Par le biais de ce système de formulaire, nous pouvons aussi nous en servir pour des évènements, des quêtes, des jeux, et bien plus encore ! Les possibilités sont infinies...
                </p>
                <p>
                    Chaque formulaire vient d'une source officielle et est forcément créé par un membre haut-placé de Minteck Projects. De ce fait, vous êtes sûr(e) de ne pas donner vos informations personnelles à des inconnus...
                </p>
            </center>
        </div>
        <div>
            <center>
                <h2>Ce que ce n'est pas...</h2>
                <p>
                    Ce système de formulaire n'est pas un moyen pour vous de faire vos propres sondages ou votes. Cet outil est exclusivement réservé au personnel de Minteck Projects, afin d'éviter certains abus.
                </p>
                <p>
                    Il ne s'agit pas d'un système créé à but de divertissement, les réponses doivent être construites, sérieuses et en rapport avec le sujet du formulaire. Abstenez-vous donc de « petits débordements », qui pourront causer l'invalidité de votre réponse
                </p>
            </center>
        </div>
    </div>
</section>
<script>
    function answerForm() {
        if (document.getElementById('formid').value.trim() != "") {
            location.href = "/forms/a/?id=" + document.getElementById('formid').value.trim();
        }
    }
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>