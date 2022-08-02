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





$file = file_get_contents("functions.php");



preg_match_all(
    // "/<\?php\s(\/\*(?:[^*]|\n|(?:\*(?:[^\/]|\n)))*\*\/)\s/",
    "/\s(?:\/\*(?:[^*]|(?:\*[^\/]))*\*\/)\s/",
    $file,
    $ausgabe,
    PREG_PATTERN_ORDER
);
foreach ($ausgabe[0] as $k => $v) {
    // $comment = '';
    // pprint($v);
    $comment = str_replace('/**', '', $v);
    $comment = str_replace('*/', '', $comment);
    $comment = str_replace('*', '', $comment);
    // pprint($comment);
    $comment = preg_replace('/^\h*\v+/m', '', $comment);

    $comment = explode(PHP_EOL, $comment);
    $markdown = '';
    foreach ($comment as $line) {
        if (''!==$line) {
            $line = trim($line);

            $line = (substr($line, 0, 6) === "@param") ? str_replace('@param', '*@param*', $line) : $line;

            $line = (substr($line, 0, 7) === "@return") ? str_replace('@return', '*@return*', $line) : $line;

            $line = (substr($line, 0, 4) === "Name") ? str_replace('Name', '###', $line) : $line;


            // $markdown .= str_pad($line.PHP_EOL, 2);
            $markdown .= $line.'  '.PHP_EOL;
        }
        // echo $line.'xx<br>';
    }
    $ausgabe[$k] = $markdown.PHP_EOL;
}
pprint($ausgabe);
file_put_contents('APIdocs.md', implode(' ', $ausgabe));