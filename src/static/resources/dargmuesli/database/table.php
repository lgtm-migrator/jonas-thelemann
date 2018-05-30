<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    // Check if required parameters are given
    if (!empty($_POST['dbhName']) && !empty($_POST['tableName']) && !empty($_POST['columnNames'])) {

        // Get right PDO instance
        $dbh = getDbh($_POST['dbhName']);

        // Continue only if PDO instance was found
        if ($dbh) {
            $columnNames = json_decode($_POST['columnNames'], true);

            if (empty($columnNames)) {
                $columnNames = null;
            }

            // Initialize optional parameters
            $limit = null;

            if (!empty($_POST['limit'])) {
                $limit = intval($_POST['limit']);
            }

            $page = null;
            $offset = null;

            if (!empty($_POST['page'])) {
                $page = intval($_POST['page']);
                $offset = ($page - 1) * $limit;
            }

            $order = null;

            if (!empty($_POST['order'])) {
                $order = json_decode($_POST['order'], true);

                if (empty($order)) {
                    $order = null;
                }
            }

            $classes = null;

            if (!empty($_POST['classes'])) {
                $classes = $_POST['classes'];
            }

            // Get table's column titles for its head
            $th = array();
            $columns = array();

            if (isset($columns[0]) && $columns[0] == '*') {

                // Get all column names of table
                $columns = getColumnNames($dbh, $_POST['tableName']);

                foreach ($columns as $column) {
                    array_push($th, $column);
                    array_push($columnNames, $column);
                }
            } else {
                foreach ($columnNames as $columnName) {
                    $columnKey = key($columnName);

                    array_push($th, $columnKey);
                    array_push($columns, $columnName[$columnKey]);
                }
            }

            // Get table's row data for its body
            $td = getRows($dbh, $_POST['tableName'], $columns, $limit, $offset, $order);

            // Get table's row count for pagination
            $count = getRowCount($dbh, $_POST['tableName']);

            echo getPaginationHTML($page, $count, $limit);
            echo getTableHTML($th, $td, $classes);
        }
    }
