<?php 



// event_menu
function event_menu()
{
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
            'menu_class' => 'navbar-nav ms-auto',
            'menu_id' => '',
            'container' => '',
            'fallback_cb' => 'event_Walker_Nav_Menu::fallback',
            'walker' => new event_Walker_Nav_Menu,
        )
    );
}



// event_navigation
function event_navigation()
{
    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => __('<i class="fa-solid fa-arrow-left-long">Prev</i>', 'harry'),
        'next_text' => __('<i class="fa-solid fa-arrow-right-long">Next</i>', 'harry'),
    ));
    if ($pages) {
        echo '<div class="pagination left"<nav><ul class="pagination-list">';
        foreach ($pages as $page) {
            echo "<li>  $page</li>";
        }
        echo '</ul></nav></div>';
    }
}
/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function event_search_form($form)
{
    $form = ' <div class="widget search-widget">
                     <form role="search" method="get" action="' . home_url('/') . '">
                           <input type="text" value="' . get_search_query() . '" name="s" placeholder="Search ...">
                           <button type="submit"><i class="lni lni-search-alt"></i></button>
                     </form>
               </div>';

    return $form;
}
add_filter('get_search_form', 'event_search_form');


/**
* Sanitize SVG markup for front-end display.
*
* @param  string $svg SVG markup to sanitize.
* @return string 	  Sanitized markup.
*/
function event_kses( $allow_tags = '' ) {
	$allowed_html = [
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'path'  => array( 
            'd' => true, 
            'fill' => true,  
            'stroke' => true,  
            'stroke-width' => true,  
            'stroke-linecap' => true,  
            'stroke-linejoin' => true,  
            'opacity' => true,  
        ),
		'a' => [
			'class'    => [],
			'href'    => [],
			'title'    => [],
			'target'    => [],
			'rel'    => [],
		],
         'b' => [],
         'blockquote'  =>  [
            'cite' => [],
         ],
         'cite'                      => [
            'title' => [],
         ],
         'code'                      => [],
         'del'                    => [
            'datetime'   => [],
            'title'      => [],
        ],
         'dd'                     => [],
         'div'                    => [
            'class'   => [],
            'title'   => [],
            'style'   => [],
         ],
         'dl'                     => [],
         'dt'                     => [],
         'em'                     => [],
         'h1'                     => [],
         'h2'                     => [],
         'h3'                     => [],
         'h4'                     => [],
         'h5'                     => [],
         'h6'                     => [],
         'i'                         => [
            'class' => [],
         ],
         'img'                    => [
            'alt'  => [],
            'class'   => [],
            'height' => [],
            'src'  => [],
            'width'   => [],
         ],
         'li'                     => array(
            'class' => array(),
         ),
         'ol'                     => array(
            'class' => array(),
         ),
         'p'                         => array(
            'class' => array(),
         ),
         'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
         ),
         'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
         ),
         'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
         ),
         'strike'                 => array(),
         'br'                     => array(),
         'strong'                 => array(),
	];

	return wp_kses( $allow_tags, $allowed_html );
}


?>