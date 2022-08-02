<?php


function pprint($data, $name = '')
{
    print '<div style="width:max-content; background:#ccc;padding-inline:.25em;margin:.5em;">';
    print '<h4 style=background:#aaa;>'.$name.'</h4> ';
    print "<pre>";
    // print_r($data);
    var_export($data);
    print "</pre>";
    print "</div>";
}





// scan for php files
$files = [];
$o_dir = new RecursiveDirectoryIterator('.');
$o_iter = new RecursiveIteratorIterator($o_dir);

foreach ($o_iter as $o_info) {
    if ($o_info->getExtension() == 'php'&& substr($o_info->getPathname(), 0, 8) != './vendor') {
        // echo $o_info->getPathname(), "<br>";
        $files[] = $o_info->getPathname();
    }
}
pprint($files);

$ausgabeALL=[];
foreach ($files as $file) {


    // get php file
    $file = file_get_contents($file);

    // find every comment in current file
    preg_match_all("/\s(?:\/\*(?:[^*]|(?:\*[^\/]))*\*\/)\s/", $file, $ausgabe, PREG_PATTERN_ORDER);

    // parse every comment in this file
    foreach ($ausgabe[0] as $k => $v) {

        // remove comment characters
        $comment = str_replace('/**', '', $v);
        $comment = str_replace('*/', '', $comment);
        $comment = str_replace('*', '', $comment);

        // remove empty lines
        $comment = preg_replace('/^\h*\v+/m', '', $comment);

        // split each comment by lines
        $comment = explode(PHP_EOL, $comment);

        $markdown = '';

        // parse every line
        foreach ($comment as $line) {
            // remove empty lines again..
            if (''!==$line) {
                // remove whitespaces
                $line = trim($line);

                // add markdown
                $line = (substr($line, 0, 6) === "@param") ? str_replace('@param', '*@param*', $line) : $line;
                $line = (substr($line, 0, 7) === "@return") ? str_replace('@return', '*@return*', $line) : $line;
                $line = (substr($line, -2) === "()") ? '### '.$line : $line;

                // collect all lines
                $markdown .= $line.'  '.PHP_EOL;
            }
        }

        // collect all comments
        $ausgabe[$k] = $markdown.PHP_EOL;
    }
    // pprint($ausgabe);
    $ausgabeALL[] = $ausgabe;
}

// make string of array
// $ausgabe = implode(' ', $ausgabe);


pprint($ausgabeALL);

exit;
// write to file
file_put_contents('APIdocs.md', $ausgabe);


// nice output
echo /*HTML*/<<<HTML
<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/13.0.1/markdown-it.min.js" integrity="sha512-SYfDUYPg5xspsG6OOpXU366G8SZsdHOhqk/icdrYJ2E/WKZxPxze7d2HD3AyXpT7U22PZ5y74xRpqZ6A2bJ+kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var md = window.markdownit();
var result = md.render(`{$ausgabe}`);
console.log(result)
</script>
<style>
  body{
    margin:0;
  }
main{
  width:100%;
  height:100%;
  padding:1em;
  color: #adbac7;
  background: #2d333b;
}
</style>
<main id=main></main>
<script>
document.getElementById('main').innerHTML = result;
</script>
HTML;