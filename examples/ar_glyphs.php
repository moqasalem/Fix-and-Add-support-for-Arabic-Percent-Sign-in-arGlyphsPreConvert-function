<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Glyphs to Render Arabic Text</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Arabic Glyphs to Render Arabic Text:</h2>
<p align="justified">Takes Arabic text as an input and performs Arabic glyph joining on it and outputs a UTF-8 
hexadecimals stream that is no longer logically arranged but in a visual order which gives readable results when 
formatted with a simple Unicode rendering just like GD and PDF libraries that does not handle basic connecting 
glyphs of Arabic language yet but simply outputs all stand alone glyphs in left-to-right order.</p>
</div><br />

<div class="Paragraph">
<h2>Example Output:</h2>
<center><img src="./glyphs_gd.php" /></center>
</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< ENDALL
<?php
    // Create the image
    \$im = @imagecreatefromgif('images/bg.gif');

    // Create some colors
    \$black = imagecolorallocate(\$im, 0, 0, 0);
    \$blue  = imagecolorallocate(\$im, 0, 0, 255);
    \$white = imagecolorallocate(\$im, 255, 255, 255);

    // Replace by your own font full path and name
    \$path = substr(
        \$_SERVER['SCRIPT_FILENAME'], 0, 
        strrpos(\$_SERVER['SCRIPT_FILENAME'], '/')
    );
    \$font = \$path.'/fonts/Amiri-Regular.ttf';

    // UTF-8 charset
    \$text = 'بسم الله الرحمن الرحيم';
    imagefill(\$im, 0, 0, \$white);
    imagettftext(\$im, 20, 0, 10, 50, \$blue, \$font, 'UTF-8:');
    imagettftext(\$im, 20, 0, 250, 50, \$black, \$font, \$text);

    /*
      // Autoload files using Composer autoload
      require_once __DIR__ . '/../vendor/autoload.php';
    */

    require '../src/Arabic.php';
    \$Arabic = new \ArPHP\I18N\Arabic();

    \$text = 'بسم الله الرحمن الرحيم';
    $\text = \$Arabic->utf8Glyphs(\$text);

    imagettftext(\$im, 20, 0, 10, 100, \$blue, \$font, 'Arabic Glyphs:');
    imagettftext(\$im, 20, 0, 250, 100, \$black, \$font, \$text);

    // Using imagepng() results in clearer text compared with imagejpeg()
    imagepng(\$im);
    imagedestroy(\$im);
ENDALL;

highlight_string($code);
?>
</div>
</body>
</html>
