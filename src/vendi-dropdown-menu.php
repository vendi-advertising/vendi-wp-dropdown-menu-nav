<?php declare(strict_types=1);

class Walker_Main_Nav_Menu_Dropdown extends Walker_PageDropdown
{
    public function start_el(&$output, $page, $depth = 0, $args = [], $id = 0)
    {
        $pad = str_repeat('-', $depth * 3);

        $output .= "\t<option class=\"level-$depth\" value=\"".get_permalink($page->ID).'"';
        if ($page->ID === $args['selected']) {
            $output .= ' selected="selected"';
        }
        $output .= '>';

        $title = $page->post_title;
        if ('' === $title) {
            $title = sprintf(__('#%d (no title)'), $page->ID);
        }

        /**
         * Filter the page title when creating an HTML drop-down list of pages.
         *
         * @since 3.1.0
         *
         * @param string $title page title
         * @param object $page  page data object
         */
        $title = apply_filters('list_pages', $title, $page);
        $output .= $pad . esc_html($title);
        $output .= "</option>\n";
    }
}
