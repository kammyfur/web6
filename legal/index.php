<?php $_TITLE = "Informations légales"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div class="p-strip--suru-blog-hero is-dark forms-selector-head" id="form-header">
    <div class="u-fixed-width">
        <h4>Minteck Projects et la loi</h4>
    </div>
    <div class="row u-equal-height u-clearfix"></div>
</div><br>
<div id="forms-selector">
    <p>Minteck Projects s'engage à respecter toutes les lois françaises et européennes, telles que le Règlement général sur la protection des données ou la loi Informatique et libertés.</p>
    <p>Tous nos droits ainsi que vos droits au sein de nos services ou produits sont indiqués dans la multitude de document légaux à votre disposition.</p>
    <p></p>
    <p></p>
    <p><br><br><br><br><br></p>
</div>
<section id="page_content">
    <p>Chez Minteck Projects, nous sommes très « à cheval » et transparents vis-à-vis des lois que nous nous efforçons de respecter. Si il vous intéresse d'en apprendre plus, nous vous invitons à consulter :
        <ul>
            <li>a <a href="/legal/privacy">politique de confidentialité</a> spécifie nos engagements à respecter votre vie privée ;</li>
            <li>les <a href="/terms">conditions générales d'utilisation</a>, ainsi que <a href="/terms/pro">leur variante pour les entreprises</a> spécifie la manière dont vous pouvez utiliser nos services ;</li>
            <li>la <a href="/legal/copyright">politique sur le droit d'auteur</a> indique la façon dont vous pouvez réutiliser et réincorporer la charte graphique et/ou le code source de nos services et produits ;</li>
            <li>la <a href="/legal/cookies">politique des cookies</a> <i>(aussi appelés « témoins »)</i> spécifie la façon dont les services de Minteck Projects enregistre des données sur votre navigateur et dans quel but ;</li>
            <li>les <a href="/legal/notices">mentions légales</a> donnent des informations diverses qui peuvent servir en cas de procédure légale ;</li>
            <li>les <a href="/branding">règles de charte graphique</a> indique comment nous (et vous) devons améliorer votre expérience en unifiant le graphisme selon certaines règles</li>
        </ul>
    Si quelque chose vous parait étrange ou incompris, n'hésitez pas à <a href="/contact">nous contacter</a>.
    </p>
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