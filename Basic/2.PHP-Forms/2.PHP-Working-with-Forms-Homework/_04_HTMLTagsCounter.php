<?php session_start(); ?>

<form method="post">
    <label for="tag">Enter HTML tags:</label>
    <input type="text" name="tag">
    <input type="submit">
</form>

<?php
$tags = array(" " ,"a", "abbr", "acronym", "address", "applet", "area", "article", "aside", "audio", "b", "base", "basefont", "bdi", "bdo", "big", "blockquote", "body", "br", "button", "canvas", "caption", "center", "cite", "code", "col", "colgroup", "datalist", "dd", "del", "details", "dfn", "dialog", "dir", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure", "font", "footer", "form", "frame", "frameset", "h1", "h2", "h3", "h4", "h6", "h6", "head", "header", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link", "main", "map", "mark", "menu", "menuitem", "meta", "meter", "nav", "noframes", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source", "span", "strike", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "title", "tr", "track", "tt", "u", "ul", "var", "video", "wbr");
$input = $_POST['tag'];
$_SESSION['arr'][0] = "";

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    if (ValidHTMLTag($input, $tags)){

    $_SESSION['count']++;
        echo "Valid HTML tag!" . "<br>";
        echo "Score: " . $_SESSION['count'];
    } else {
        echo "Invalid HTML tag!" . "<br>";
        echo "Score: " . $_SESSION['count'];
    }
}

function ValidHTMLTag($input, $tags)
{
    if (array_search($input, $tags)) {
        return true;
    } else {
        return false;
    }
}

?>