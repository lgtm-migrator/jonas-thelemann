<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    // Check if required parameters are given
    if (!empty($_POST['tableName']) && !empty($_POST['columnNames'])) {

        // Load .env file
        load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

        // Get right PDO instance
        $dbh = get_dbh($_ENV['PGSQL_DATABASE']);

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
                $columns = get_column_names($dbh, $_POST['tableName']);

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
            $td = get_rows($dbh, $_POST['tableName'], $columns, $limit, $offset, $order);

            // Get table's row count for pagination
            $count = get_row_count($dbh, $_POST['tableName']);

            echo get_pagination_html($page, $count, $limit);
            echo get_table_html($th, $td, $classes);
        }
    }
