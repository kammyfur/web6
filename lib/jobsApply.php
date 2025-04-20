<?php
$content = file_get_contents('https://docs.google.com/forms/d/e/1FAIpQLSfRJnrGopW7eeWEPBuW1fyJW05UwRzEMJhP5-MZU2sP3jp9UQ/viewform');
$content = '<link rel="stylesheet" href="https://minteck-projects.alwaysdata.net/styles/jobs.css">' . $content;
echo($content);