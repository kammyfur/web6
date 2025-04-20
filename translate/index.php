<?php $_TITLE = "Traduction"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = false; // Whether or not show secondary navigation
$secConf = []; // Secondary navigation config.
?>
<script>
  function resizeTextarea (id) {
  var a = document.getElementById(id);
  a.style.height = 'auto';
  a.style.height = (a.scrollHeight+5)+'px';
}

function detectLang() {
  from = document.getElementById('from').value;
  to = document.getElementById('to').value;

  if (from == to) {
    document.getElementById('source').disabled = true;
    updateTranslate();
  } else {
    document.getElementById('source').disabled = false;
  }
}

function init() {
  var a = document.getElementsByTagName('textarea');
  for(var i=0,inb=a.length;i<inb;i++) {
     if(a[i].getAttribute('data-resizable')=='true')
      resizeTextarea(a[i].id);
  }
}

addEventListener('DOMContentLoaded', init);

function updateTranslate() {
  from = document.getElementById('from').value;
  to = document.getElementById('to').value;
  data = new FormData();
  data.append("text", document.getElementById('source').value)
  $.ajax({
        url: "/translate/api.php?from=" + from + "&to=" + to + "&lang=<?= $_LANGUAGE ?>",
        dataType: 'html',
        cache: false,
        data: data,
        contentType: false,
        processData: false,
        type: 'post',
        success: function (jsd) {
            document.getElementById('translate-error').style.display = "none";
            obj = JSON.parse(jsd);
            jsd = jsd;
            if (obj.error === null) {
              document.getElementById('results').innerHTML = "";
              obj.results.forEach((translation) => {
                if (translation.approved) {
                  document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + '<tr><td><span class="word-generic">' + translation.original.split("<").join("&lt;").split(">").join("&gt;").split("\n").join("<br>") + '</span></td><td><span class="word-generic">' + translation.responses.join('</span> <span class="word-generic">') + '</span></td><td>' + translation.htmltype +  ' <span class="word-approved"><?= $lang->translate->approved ?></span></td></tr>';
                } else {
                  document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + '<tr><td><span class="word-generic">' + translation.original.split("<").join("&lt;").split(">").join("&gt;").split("\n").join("<br>") + '</span></td><td><span class="word-generic">' + translation.responses.join('</span> <span class="word-generic">') + '</span></td><td>' + translation.htmltype +  ' <span class="word-unapproved"><?= $lang->translate->unapproved ?></span></td></tr>';
                }
              })
            } else {
              document.getElementById('terror-message').innerHTML = obj.error.split("<").join("&lt;").split(">").join("&gt;").split("\n").join("<br>");
              document.getElementById('translate-error').style.display = "block";
            }
        }});
}
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<section id="page_content">
    <h1><?= $lang->translate->title ?></h1>
    <?= $lang->translate->source ?>
    <select id="from" onchange="detectLang();">
      <option value="fr" checked selected>Français</option>
      <option value="en">English</option>
      <option value="es">Español</option>
    </select>
    <?= $lang->translate->destination ?>
    <select id="to" onchange="detectLang();">
      <option value="fr">Français</option>
      <option value="en" checked selected>English</option>
      <option value="es">Español</option>
    </select>
    <textarea id="source" onkeyup="resizeTextarea('source');updateTranslate();" onkeydown="resizeTextarea('source');updateTranslate();" rows="5" autocomplete="off" autofocus maxlength="1000" placeholder="<?= $lang->translate->tagline ?>" spellcheck="false" style="resize:vertical;margin-bottom: 0;"></textarea>
    <div id="toolbar">
    <small id="message"><?= $lang->translate->disclaimer ?></small>
    </div>
    <center style="margin-top: 15px;"><?= $lang->translate->auto ?></center>
    <div id="translate-error" style="display:none;"><?= $lang->translate->error ?><span id="terror-message"><?= $lang->translate->edefault ?></span></div>

    <table>
      <thead>
        <th><?= $lang->translate->orig ?></th>
        <th><?= $lang->translate->trans ?></th>
        <th><?= $lang->translate->type ?></th>
      </thead>
      <tbody id="results">
        
      </tbody>
    </table>
    <hr>
    <?= file_get_contents("docs/{$_LANGUAGE}.html") ?>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>