<?php 
/*CMS Helper function to get data from DB*/

/*Function to get excerpt from an article*/
function get_excerpt($article, $numwords = 50){
    $string = '';
    $url = 'article/' . intval($article->id) . '/' . e($article->slug);
    $string .='<span class="glyphicon glyphicon-file"></span><h2>' . anchor($url, e($article->title)) . '</h2>';
    $string .= '<p class = "pubdate">' . e($article->pubdate) . '</p>';
    $string .= '<p align = "justify">' . limit_to_numwords(strip_tags($article->body), $numwords) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more >', array('title'=>e($article->title))) . '</p>';


    return $string;
}/*Since this will vary, we are using the get_excerpt custom function*/


function get_artwork($artwork, $numwords = 50){
    $string = '';
    $string .='<p> <em>' . $artwork->pubdate . '</em></p>';
    $string .= '<img src="' . base_url('img/gallery/'.$artwork->path). '" width="50px" height="50px" class="img-circle"';
    $string .= '<p class = "pubdate"> <span class="gold">' . e($artwork->title) . '</span></p>';
    $string .= '<p align = "justify">' . limit_to_numwords(strip_tags($artwork->description), $numwords) . '</p>';


    return $string;
}/*Since this will vary, we are using the get_excerpt custom function*/

// This method will return a URL to the article, with its id and slug seperated by /
function article_link($article){
    return 'article/' . intval($article->id) . '/' . e($article->slug);

}/*End of the article_link method*/

function article_links($articles){
    $string ='<ul>';
    foreach ($articles as $article) {
        # code. ..
        $url = article_link($article);
        $string .= '<li>' . get_excerpt($article, 10) . '<hr></li>';
    }
    $string .= '</ul>';
    return $string;
}/*End of the article_links method*/


function artwork_links($artworks){
    $string ='<ul>';
    foreach ($artworks as $art) {
        # code. ..
        $string .= '<li>' . get_artwork($art, 10) . '<hr></li>';
    }
    $string .= '</ul>';
    return $string;
}/*End of the article_links method*/





function limit_to_numwords($string, $numwords = 1){
    $excerpt = explode(' ', $string, $numwords +1);
    if(count($excerpt) >= $numwords){
        array_pop($excerpt);
    }
    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}


function e($string){
    return htmlentities($string);

}/*End of the e function to get data from DB*/

/*Programming Mantra: Filter Input, Escape Output*/

/*CMS Helper - Get Menu function*/    
function get_menu ($array, $child = FALSE){

    /*We need to add the active ppty to the current page navbar*/
    /*For that - We need to first get access to CI Super object - getinstance*/
    $CI =& get_instance();
    $str = '';
    
    if (count($array)) {

        /*If no child, then its a main menu, else its a drop down menu*/
        $str .= $child == FALSE ? '<ul class="nav navbar-nav" role="navigation">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

        /*If a page has a child, we should add some properties to the list item*/
        foreach ($array as $item) {
            /*Pass the str to the current active page opened*/
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE: FALSE;
        if (isset($item['children']) && count($item['children'])) {
            $str = 
            $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
            $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href ="' .site_url(e($item['slug'])) . '">' . e($item['title']);
            $str .= '<b class="caret"></b></a>' . PHP_EOL;
            $str .=  get_menu ($item['children'], TRUE);
        }
        else{
            $str .= $active ? '<li class="active">' : '<li>';
            $str .= '<a href ="'. site_url(e($item['slug'])) .'">' . e($item['title']) . '</a>';
        }
            $str .= '</li>' . PHP_EOL;
        }
        $str .= '</ul>' . PHP_EOL;
    }
    return $str;
    }/*end of get_menu helper function*/

function get_image_name($fullpath){
    $pattern = "([\w-]+\.)";
    preg_match($pattern, $fullpath, $matches);
    var_dump($matches);
}    


/*The following custom helper function will replace the variable 
btn_edit and btn_delete with the following code*/
function btn_edit($uri){
	return anchor($uri, '<span class="glyphicon glyphicon-edit"></span>');

}/*End of the btn_edit*/

function btn_delete($uri){
	return anchor($uri, '<span class="glyphicon glyphicon-trash"></span>', array('onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure to continue?');"));
}/*End of the btn_delete*/

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}

if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }   
}

function web_address(){
 $string = '';
 $string .='#38/1, 1st Main Road, 2nd Floor, <br> Upadyaya Layout, Bangalore - 560 056';
 return $string;   
}