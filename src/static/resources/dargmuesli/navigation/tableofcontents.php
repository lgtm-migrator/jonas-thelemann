<?php
    use PHPHtmlParser\Dom;

    function get_table_of_contents_html($content, $titleFallback = null)
    {
        $dom = new Dom();
        $dom->load($content, ['whitespaceTextNode' => false, 'preserveLineBreaks' => true]);
        $types = ['section', 'li'];
        $parts = array();
        $tocHtml = '';

        foreach ($types as $type) {
            $parts = $dom->find($type);

            if (count($parts) > 0) {
                break;
            }
        }

        $tocHtml = '
        <ul class="sidenav sidenav-fixed z-depth-0 section table-of-contents" id="toc-mobile">';

        if (count($parts) > 0) {
            foreach ($parts as $part) {
                $title = $part->find('h2')[0];

                $tocHtml .= '
                <li>
                    <a href="#'.trim($part->getAttribute('id')).'">
                        '.trim(is_null($title) ? $titleFallback : $title->text).'
                    </a>
                </li>';
            }
        }

        $tocHtml .= '
        </ul>';

        return $tocHtml;
    }
