<?php

function render_view( $view_name, &$view_vars=null){

    if( $view_vars == null ){
        include $_SERVER["DOCUMENT_ROOT"]."/views/$view_name";
        return;
    }

    $keys = array_keys($view_vars);
    $key_count = count($keys);

    for($i = 0; $i<$key_count;$i++){
        ${$keys[$i]} = $view_vars[$keys[$i]];
    }

    ob_start();

    include $_SERVER["DOCUMENT_ROOT"]."/prueba_tecnica_dev_2/Views/$view_name";

    return ob_get_clean();
}

?>