<?php
    function get_tag( $attr, $value, $xml ) {

        $attr = preg_quote($attr);
        $value = preg_quote($value);

        $tag_regex = '/<div[^>]*'.$attr.'="'.$value.'">(.*?)<\\/div>/si';

        preg_match($tag_regex, $xml, $matches);
        return $matches[1];
    }

    $yourentirehtml = file_get_contents("uploads/newsletter/orchid/test/index.html");
    $extract = get_tag('id', 'content', $yourentirehtml);
    echo $extract;
?>
