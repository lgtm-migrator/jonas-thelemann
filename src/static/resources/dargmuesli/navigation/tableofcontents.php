<?php
    use PHPHtmlParser\Dom;

    function getTableOfContentsHtml($content)
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

        if (count($parts) > 0) {
            $tocHtml = '
            <ul class="side-nav fixed z-depth-0 section table-of-contents" id="toc-mobile">';

            foreach ($parts as $part) {
                $title = $part->find('h2')[0];

                if ($title) {
                    $tocHtml .= '
                    <li>
                        <a href="#'.trim($part->getAttribute('id')).'">
                            '.trim($title->text).'
                        </a>
                    </li>';
                }
            }

            $tocHtml .= '
            </ul>';
        }

        return $tocHtml;
    }
