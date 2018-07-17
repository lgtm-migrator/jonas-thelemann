<?php
    use PHPHtmlParser\Dom;

    function getFaqHtml($faq) {
        $faqHtml = '
        <ul class="collapsible popout" data-collapsible="accordion">';

        foreach ($faq as $id => $data) {
            $faqHtml .= '
            <li id="'.$id.'" class="section scrollspy">
                <div class="collapsible-header">
                    <i class="material-icons">
                        question_answer
                    </i>
                    <h2>
                        '.$data[0].'
                    </h2>
                </div>
                <div class="collapsible-body">
                    '.$data[1].'
                </div>
            </li>';
        }

        $faqHtml .= '
        </ul>';

        return $faqHtml;
    }

    function getIndentedML($string, $count = 0)
    {
        $lastCount = 0;
        $indentedString = '';
        $selfClosingTags = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'menuitem', 'meta', 'param', 'source', 'track', 'wbr'];

        foreach (preg_split('/((\r?\n)|(\r\n?))/', $string) as $line) {
            $openingMatches = null;
            $closingMatches = null;

            preg_match('/<([a-z0-9]*)[>\s]/', $line, $openingMatches);
            preg_match('/<\/([a-z0-9]*)[>\s]/', $line, $closingMatches);

            if ($closingMatches && !$openingMatches) {
                if ($closingMatches[1] != 'code') {
                    --$count;
                } else {
                    $count = $lastCount;
                }
            }

            for ($i = 0; $i < $count; ++$i) {
                $indentedString .= '    ';
            }

            if ($openingMatches && !in_array($openingMatches[1], $selfClosingTags) && !$closingMatches) {
                if ($openingMatches[1] != 'code') {
                    ++$count;
                } else {
                    $lastCount = $count;
                    $count = 0;
                }
            }

            $trimmedLine = trim($line);

            if (strlen($trimmedLine) != 0) {
                $indentedString .= $trimmedLine.PHP_EOL;
            }
        }

        return $indentedString;
    }

    function getPaginationHtml($page, $count, $limit) {
        $pageCount = ceil($count / $limit);

        $paginationHtml = '
        <div class="center-align">
            <ul class="pagination">';

        if ($page <= 1) {
            $paginationHtml .= '
            <li class="disabled">
                <button class="borderless">
                    <i class="material-icons">
                        first_page
                    </i>
                </button>
            </li>
            <li class="disabled">
                <button class="borderless">
                    <i class="material-icons">
                        chevron_left
                    </i>
                </button>
            </li>';
        } else {
            $paginationHtml .= '
            <li>
                <button class="borderless waves-effect waves-primary" data-page="1">
                    <i class="material-icons">
                        first_page
                    </i>
                </button>
            </li>
            <li>
                <button class="borderless waves-effect waves-primary" data-page="'.($page - 1).'">
                    <i class="material-icons">
                        chevron_left
                    </i>
                </button>
            </li>';
        }

        if ($page < 7) {
            $paginationStart = 1;
        } else if ($page > $pageCount - 4) {
            $paginationStart = $pageCount - 9;
        } else {
            $paginationStart = $page - 5;
        }

        for ($i = $paginationStart; $i <= $pageCount && $i < ($paginationStart + 10); ++$i) {
            if ($i == $page) {
                $paginationHtml .= '
                <li class="active">
                    <button class="borderless">
                        '.$i.'
                    </button>
                </li>';
            } else {
                $paginationHtml .= '
                <li>
                    <button class="borderless waves-effect waves-primary" data-page="'.$i.'">
                        '.$i.'
                    </button>
                </li>';
            }
        }

        if ($page >= $pageCount) {
            $paginationHtml .= '
            <li class="disabled">
                <button class="borderless">
                    <i class="material-icons">
                        chevron_right
                    </i>
                </button>
            </li>
            <li class="disabled">
                <button class="borderless">
                    <i class="material-icons">
                        last_page
                    </i>
                </button>
            </li>';
        } elseif ($page < $pageCount) {
            $paginationHtml .= '
            <li>
                <button class="borderless waves-effect waves-primary" data-page="'.($page + 1).'">
                    <i class="material-icons">
                        chevron_right
                    </i>
                </button>
            </li>
            <li>
                <button class="borderless waves-effect waves-primary" data-page="'.$pageCount.'">
                    <i class="material-icons">
                        last_page
                    </i>
                </button>
            </li>';
        }

        $paginationHtml .= '
            </ul>
        </div>
        <div id="table-view"></div>';

        return $paginationHtml;
    }

    function getRankingsHtml($rankings) {
        if (empty($rankings) || !is_array($rankings)) {
            $rankings = null;
        }

        $rankingHtml = '';

        if ($rankings != null) {
            foreach ($rankings as $ranking => $rankingData) {
                $rankingHtml .= '
                <div>
                    <div class="chip">
                        '.$rankingData['1'].'
                    </div>
                    '.$rankingData['0'].'
                </div>';
            }
        }

        return $rankingHtml;
    }

    function getSurveyStatusHtml($notes, $displayAnalysisLink) {
        $surveyStatusHtml = '
        <section id="status" class="section scrollspy">
            <h2>
                Status
            </h2>
            <div class="row">
                <div class="col s12">
                    <div class="card info">
                        <div class="card-content">
                            <span class="card-title">
                                Um&shy;fra&shy;ge be&shy;en&shy;det
                            </span>';

        if (count($notes)) {
            $surveyStatusHtml .= '
            <p>';
        }

        $notesCopy = $notes;
        $lastNote = array_pop($notesCopy);

        foreach ($notes as $note) {
            if ($note == 'demo') {
                $surveyStatusHtml .= '
                Die Funktion der Seite kann nun im Demo-Tab getestet werden.';
            } elseif ($note == 'privacy') {
                $surveyStatusHtml .= '
                Hier und auf der Auswertungsseite sind alle persönlichen Daten anonymisiert worden.';
            }

            if ($note != $lastNote) {
                $surveyStatusHtml .= '
                <br>';
            }
        }

        if (count($notes)) {
            $surveyStatusHtml .= '
            </p>';
        }

        $surveyStatusHtml .= '
                    </div>
                </div>
            </div>
        </div>';

        if ($displayAnalysisLink) {
            $surveyStatusHtml .= '
            <p>
                <a class="waves-effect waves-light btn" href="analysis/" title="Auswertung">
                    <i class="material-icons right">
                        chevron_right
                    </i>
                    Zur Auswertung
                </a>
            </p>';
        }

        $surveyStatusHtml .= '
        </section>';

        return $surveyStatusHtml;
    }

    function getTableHtml($th, $td, $classes) {
        $tableHtml = '
        <table>
            <thead>
                <tr>';

        // Add each table's header
        foreach ($th as $column) {
            $tableHtml .= '
            <th>
                '.$column.'
            </th>';
        }

        $tableHtml .= '
            </tr>
        </thead>
        <tbody>';

        // Add each table's row including data
        foreach ($td as $key => $row) {
            $tableHtml .= '
            <tr>';

            foreach ($row as $column => $data) {
                $tableHtml .= '
                <td>
                    '.json_encode($data).'
                </td>';
            }

            $tableHtml .= '
            </tr>';
        }

        $tableHtml .= '
            </tbody>
        </table>';

        // Enable styling of the table
        if (isset($classes)) {
            $dom = new Dom();
            $dom->load($tableHtml);
            $table = $dom->find('table')[0];
            $table->setAttribute('class', str_replace(',', ' ', $classes));
            $tableHtml = $dom;
        }

        return $tableHtml;
    }

    function getWithoutShy($string)
    {
        // Replace all occurrences of the "shy"-string
        return str_replace('&shy;', '', $string);
    }
