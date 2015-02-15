<?php
$input = 'da , da';

$str = preg_replace('/ , /', ', ', $input);
echo $str;