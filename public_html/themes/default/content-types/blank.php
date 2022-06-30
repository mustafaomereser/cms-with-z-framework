<?php

use Core\Facedas\Lang;
?>
<?= json_decode($content->content, true)[Lang::currentLocale()] ?>