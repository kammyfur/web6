<?php $_TITLE = "Nouvel article | Blog | Administration"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = true; // Whether or not show secondary navigation
$secConf = [
  'title' => "Gestion",
  'homeLink' => "/admin",
  'elements' => [
    [
      'title' => "Accueil",
      'href' => "/admin",
      'selected' => false,
    ],
    [
      'title' => "Blog",
      'href' => "/admin/blog",
      'selected' => false,
    ],
    [
      'title' => "Fichiers",
      'href' => "/admin/files",
      'selected' => false,
    ],
    [
      'title' => "Maintenances",
      'href' => "/admin/maintenance",
      'selected' => false,
    ],
    [
      'title' => "Télémétrie",
      'href' => "/admin/telemetry",
      'selected' => false,
    ],
  ],
]; // Secondary navigation config.
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<section id="page_content">
    <h1>Poster un article sur le blog</h1>
    <p>
        <input type="text" id="article-name" placeholder="Nom de l'article">
        <select id="article-category">
            <option value="maintenances">Maintenances</option>
            <option value="announcements">Annonces</option>
            <option value="servers">Serveurs</option>
            <option value="ai">IA</option>
            <option value="jobs">Recrutements</option>
            <option value="events">Événements</option>
        </select>
    </p>
    <div style="display:grid;grid-template-columns:1fr 1fr;">
        <div id="ace-content" style="height:90vh;width:100%;"></div>
        <div style="height:90vh;width:100%;">
            <div id="ace-preview-notice" style="height:24px;width:100%;background-color:#262626;color: white;">
                <center>Prévisualisation : HTML uniquement - Mise à jour après 1 seconde</center>
            </div>
            <div id="ace-preview" style="height:calc(90vh - 24px);width:100%;"><iframe src="javascript:void(0);" style="width:100%;height:100%;" frameborder="0"></iframe></div>
        </div>
    </div>
    <p>
        <br>
        <button onclick="publish();">Publier l'article</button>
    </p>
</section>
<script src="/api/editor/ace.js"></script>
<script src="/admin/api.js"></script>
<script>
    editor = ace.edit(document.getElementById('ace-content'), {
        mode: "ace/mode/html",
        selectionStyle: "text",
        newLineMode: "unix",
        wrap: true
    })
    editor.setOptions({
        copyWithEmptySelection: true,
        useSoftWraps: true,
        highlightGutterLine: true
    });
    editor.setOption("mergeUndoDeltas", "always");
    editor.setTheme("ace/theme/chrome");
    willrf = false;
    editor.getSession().on('change', function() {
        if (!willrf) {
            willrf = true;
            setTimeout(() => {
                // document.querySelector('#ace-preview iframe').src = "/admin/preview/blog.php?content=" + escape(editor.getSession().getData());
                willrf = false;
                Polymermin.ajaxLegacyLoading("v1", "preview/blog", {
                    content: editor.getSession().getValue(),
                    category: document.getElementById('article-category').value,
                    title: document.getElementById('article-name').value
                }, "post", (data) => {
                    document.querySelector('#ace-preview iframe').contentWindow.document.documentElement.innerHTML = data;
                }, () => {
                    document.querySelector('#ace-preview iframe').contentWindow.document.documentElement.innerHTML = "Impossible de générer la prévisualisation pour l'instant";
                })
            }, 1000)
        }
    });
    function publish() {
        Polymermin.apiCommand("v1", "blog/create", {
            content: editor.getSession().getValue(),
            category: document.getElementById('article-category').value,
            title: document.getElementById('article-name').value
        }, "post", "/admin/blog", () => {
            alert("Erreur");
        })
    }
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>