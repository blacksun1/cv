<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require '../vendor/autoload.php';

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class) {
    require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\MarkdownExtra;

# Read file and pass content through the Markdown parser
$text = file_get_contents('Simon Bruce - Curriculum vitae.md');
$html = MarkdownExtra::defaultTransform($text);
?>
<?php include("../blacksun_include.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>blacksun.cx</title>
    <script type="text/javascript" src="/new_look/script/minmax.js"></script>
    <script type="text/javascript" src="/new_look/script/styleswitcher.js"></script>
    <?php StyleSheets(); ?>

</head>

<body>

<div class="page">

    <div class="heading">
        <h1>blacksun<span class="blacksunDot">.</span>cx</h1>
    </div>

    <div class="content">
        <p><a href="Simon%20Bruce%20-%20Curriculum%20vitae.docx">Download in Word format.</a></p>
        <p><a href="Simon%20Bruce%20-%20Curriculum%20vitae.md">Download in Markdown format.</a></p>

<?php
        # Put HTML content in the document
        echo $html;
?>



<?php echo BlacksunFooter(); ?>
    </div>
</div>
</body>
</html>
