<?php
    use PHPHtmlParser\Dom;

function get_table_of_contents_html($content, $titleFallback = null)
{
    $tocHtml = '
        <ul class="sidenav sidenav-fixed z-depth-0 section table-of-contents" id="toc-mobile">';
    $dom = new Dom();
    $dom->load($content, ['whitespaceTextNode' => false, 'preserveLineBreaks' => true]);
    $types = ['section', 'li'];

    foreach ($types as $type) {
        $parts = $dom->find($type);

        foreach ($parts as $part) {
            if ($part->getAttribute('class') == 'section scrollspy') {
                $title = $part->find('h2')[0];

                $tocHtml .= '
                    <li>
                        <a class="sidenav-close" href="#'.trim($part->getAttribute('id')).'">
                            '.trim(is_null($title) ? $titleFallback : $title->text).'
                        </a>
                    </li>';
            }
        }
    }

    $tocHtml .= '
        </ul>';

    return $tocHtml;
}
