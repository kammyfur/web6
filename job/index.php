<?php $_TITLE = "Traqueur de tâches"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/heads.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/products.php"; ?>
<?php
// Navigation Config.
$secondary = true; // Whether or not show secondary navigation
$secConf = [
    'title' => $lang->tracker->title,
    'homeLink' => "/job",
    'elements' => [],
];
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/navigation.php"; ?>
<div id="main-content" class="inner-wrapper">
    <section id="page_content">
        <?php
        
        if (isset($_GET['thread'])) {
            $tp = explode("§", $_GET['thread']);
            if (count($tp) != 2) {
                $invalid = true;
            } else {
                $invalid = false;
            }
            $parts = explode("|", base64_decode($tp[0]));
            if (count($parts) != 10) {
                $invalid = true;
            }
            if ($invalid) {
                echo('<div class="p-strip is-shallow u-no-padding--bottom"><div class="row"><div class="p-notification--negative"><p class="p-notification__response">' . $lang->tracker->invalid . '</p></div></div></div>');
                if ($_LANGUAGE == "fr") {
                    echo(file_get_contents("./home-fr.html"));
                }
                if ($_LANGUAGE == "en") {
                    echo(file_get_contents("./home-en.html"));
                }
            } else {
                $info = [
                    "pid" => str_replace("<", "&lt;", $parts[0]),
                    "username" => str_replace("<", "&lt;", $parts[1]),
                    "file" => str_replace("<", "&lt;", $parts[2]),
                    "inode" => str_replace("<", "&lt;", $parts[3]),
                    "size" => str_replace("<", "&lt;", $parts[4]),
                    "php" => str_replace("<", "&lt;", $parts[5]),
                    "version" => str_replace("<", "&lt;", $parts[6]),
                    "time" => str_replace("<", "&lt;", $parts[7]),
                    "osname" => str_replace("<", "&lt;", $parts[8]),
                    "osver" => str_replace("<", "&lt;", $parts[9]),
                    "release" => $tp[1],
                ];
    
                echo("<h1>" . $lang->tracker->common . "</h1><p>" . $lang->tracker->intro[0] . "<code>" . $info['pid'] . "</code>" . $lang->tracker->intro[1] . "</p>");
    
                echo("<table><thead><th>" . $lang->tracker->headers->internal . "</th><th>" . $lang->tracker->headers->common . "</th><th>" . $lang->tracker->headers->value . "</th></thead><tbody>");
    
                echo("<tr><td><code>Renderer::PID</code></td><td>" . $lang->tracker->names[0] . "</td><td>{$info['pid']}</td></tr>");
                echo("<tr><td><code>Renderer::User</code></td><td>" . $lang->tracker->names[1] . "</td><td>{$info['username']}</td></tr>");
                echo("<tr><td><code>Renderer::Filename</code></td><td>" . $lang->tracker->names[2] . "</td><td>{$info['file']}</td></tr>");
                echo("<tr><td><code>Renderer::Inode</code></td><td>" . $lang->tracker->names[3] . "</td><td>{$info['inode']}</td></tr>");
                echo("<tr><td><code>Renderer::Size</code></td><td>" . $lang->tracker->names[4] . "</td><td>{$info['size']} octets</td></tr>");
                echo("<tr><td><code>Renderer::PHP</code></td><td>" . $lang->tracker->names[5] . "</td><td>{$info['php']}</td></tr>");
                echo("<tr><td><code>Renderer::Version</code>, <code>Renderer::Release</code></td><td>" . $lang->tracker->names[6] . "</td><td>{$info['version']} ({$info['release']})</td></tr>");
                echo("<tr><td><code>Renderer::Time</code></td><td>" . $lang->tracker->names[7] . "</td><td>" . round((float)$info['time'], 5) . " ms</td></tr>");
                echo("<tr><td><code>Renderer::OSInfo</code></td><td>" . $lang->tracker->names[8] . "</td><td>{$info['osname']} {$info['osver']}</td></tr>");
    
                echo("</tbody></table>");
    
                echo("<p>" . $lang->tracker->keeplater . "<br><pre>" . str_replace("+", "&#37;26&#37;2343;", $_GET['thread']) . "</pre></p>");
            }

        } else {
            if ($_LANGUAGE == "fr") {
                echo(file_get_contents("./home-fr.html"));
            }
            if ($_LANGUAGE == "en") {
                echo(file_get_contents("./home-en.html"));
            }
        }
        
        ?>
    </section>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php"; ?>