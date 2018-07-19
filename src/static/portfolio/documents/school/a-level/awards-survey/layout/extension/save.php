<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    $open = false;
    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);

    if ($open) {
        if (isset($_GET['method'])) {
            $stmt = $dbh->prepare('UPDATE awards SET riese = :riese WHERE ip = :ip ');
            $stmt->bindParam(':riese', $_POST['Riese']);
            $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }
        } else {
            $stmt = $dbh->prepare('INSERT INTO awards(
                gotteskind,
                partyraucher,
                frisur,
                mami,
                sarkasmus,
                träumer,
                shopaholik,
                markenwerbetafel,
                sextanerblase,
                auslandskorrespondent,
                dam,
                daw,
                seeles,
                hobbypsychologe,
                sanitäter,
                schauspieler,
                handysuchti,
                vielfraß,
                ehepaar,
                weltenbummler,
                starfotograf,
                stock,
                wutbürger,
                backmeister,
                ordnungsamt,
                chemiker,
                diskussion,
                quasselstrippe,
                hausaufgabe,
                öko,
                revoluzzer,
                sauklaue,
                girl,
                vorgelernt,
                entscheidungsunfähig,
                prinzessin,
                sprachtalent,
                gemein,
                genie,
                punktefeilscher,
                anti,
                männerschwarm,
                frauenheld,
                festivalgänger,
                altphilologe,
                rock,
                klausurnachbar,
                naturbursche,
                riese,
                drecksack,
                organisationsdesaster,
                junggeselle,
                schlaftablette,
                feministin,
                notenwürfler,
                punktelieferant,
                ähm,
                pause,
                seelel,
                unterricht,
                eingebildet,
                spät,
                unbekannt,
                schülerliebling,
                miesepeter,
                moralapostel,
                verplant,
                dressed,
                kopierkönig,
                grinsekatze,
                tafelbild,
                gartenzwerg,
                übermotiviert,
                sprücheklopfer,
                ip
                ) VALUES (
                :gotteskind,
                :partyraucher,
                :frisur,
                :mami,
                :sarkasmus,
                :träumer,
                :shopaholik,
                :markenwerbetafel,
                :sextanerblase,
                :auslandskorrespondent,
                :dam,
                :daw,
                :seeles,
                :hobbypsychologe,
                :sanitäter,
                :schauspieler,
                :handysuchti,
                :vielfraß,
                :ehepaar,
                :weltenbummler,
                :starfotograf,
                :stock,
                :wutbürger,
                :backmeister,
                :ordnungsamt,
                :chemiker,
                :diskussion,
                :quasselstrippe,
                :hausaufgabe,
                :öko,
                :revoluzzer,
                :sauklaue,
                :girl,
                :vorgelernt,
                :entscheidungsunfähig,
                :prinzessin,
                :sprachtalent,
                :gemein,
                :genie,
                :punktefeilscher,
                :anti,
                :männerschwarm,
                :frauenheld,
                :festivalgänger,
                :altphilologe,
                :rock,
                :klausurnachbar,
                :naturbursche,
                :riese,
                :drecksack,
                :organisationsdesaster,
                :junggeselle,
                :schlaftablette,
                :feministin,
                :notenwürfler,
                :punktelieferant,
                :ähm,
                :pause,
                :seelel,
                :unterricht,
                :eingebildet,
                :spät,
                :unbekannt,
                :schülerliebling,
                :miesepeter,
                :moralapostel,
                :verplant,
                :dressed,
                :kopierkönig,
                :grinsekatze,
                :tafelbild,
                :gartenzwerg,
                :übermotiviert,
                :sprücheklopfer,
                :ip
            )');
            $stmt->bindParam(':gotteskind', $_SERVER['gotteskind']);
            $stmt->bindParam(':partyraucher', $_SERVER['Partyraucher']);
            $stmt->bindParam(':frisur', $_SERVER['Frisur']);
            $stmt->bindParam(':mami', $_SERVER['Mami']);
            $stmt->bindParam(':sarkasmus', $_SERVER['Sarkasmus']);
            $stmt->bindParam(':träumer', $_SERVER['Träumer']);
            $stmt->bindParam(':shopaholik', $_SERVER['Shopaholik']);
            $stmt->bindParam(':markenwerbetafel', $_SERVER['Markenwerbetafel']);
            $stmt->bindParam(':sextanerblase', $_SERVER['Sextanerblase']);
            $stmt->bindParam(':auslandskorrespondent', $_SERVER['Auslandskorrespondent']);
            $stmt->bindParam(':dam', $_SERVER['DAM']);
            $stmt->bindParam(':daw', $_SERVER['DAW']);
            $stmt->bindParam(':seeles', $_SERVER['SeeleS']);
            $stmt->bindParam(':hobbypsychologe', $_SERVER['Hobbypsychologe']);
            $stmt->bindParam(':sanitäter', $_SERVER['Sanitäter']);
            $stmt->bindParam(':schauspieler', $_SERVER['Schauspieler']);
            $stmt->bindParam(':handysuchti', $_SERVER['Handysuchti']);
            $stmt->bindParam(':vielfraß', $_SERVER['Vielfraß']);
            $stmt->bindParam(':ehepaar', $_SERVER['Ehepaar']);
            $stmt->bindParam(':weltenbummler', $_SERVER['Weltenbummler']);
            $stmt->bindParam(':starfotograf', $_SERVER['Starfotograf']);
            $stmt->bindParam(':stock', $_SERVER['Stock']);
            $stmt->bindParam(':wutbürger', $_SERVER['Wutbürger']);
            $stmt->bindParam(':backmeister', $_SERVER['Backmeister']);
            $stmt->bindParam(':ordnungsamt', $_SERVER['Ordnungsamt']);
            $stmt->bindParam(':chemiker', $_SERVER['Chemiker']);
            $stmt->bindParam(':diskussion', $_SERVER['Diskussion']);
            $stmt->bindParam(':quasselstrippe', $_SERVER['Quasselstrippe']);
            $stmt->bindParam(':hausaufgabe', $_SERVER['Hausaufgabe']);
            $stmt->bindParam(':öko', $_SERVER['Öko']);
            $stmt->bindParam(':revoluzzer', $_SERVER['Revoluzzer']);
            $stmt->bindParam(':sauklaue', $_SERVER['Sauklaue']);
            $stmt->bindParam(':girl', $_SERVER['Girl']);
            $stmt->bindParam(':vorgelernt', $_SERVER['Vorgelernt']);
            $stmt->bindParam(':entscheidungsunfähig', $_SERVER['Entscheidungsunfähig']);
            $stmt->bindParam(':prinzessin', $_SERVER['Prinzessin']);
            $stmt->bindParam(':sprachtalent', $_SERVER['Sprachtalent']);
            $stmt->bindParam(':gemein', $_SERVER['Gemein']);
            $stmt->bindParam(':genie', $_SERVER['Genie']);
            $stmt->bindParam(':punktefeilscher', $_SERVER['Punktefeilscher']);
            $stmt->bindParam(':anti', $_SERVER['Anti']);
            $stmt->bindParam(':männerschwarm', $_SERVER['Männerschwarm']);
            $stmt->bindParam(':frauenheld', $_SERVER['Frauenheld']);
            $stmt->bindParam(':festivalgänger', $_SERVER['Festivalgänger']);
            $stmt->bindParam(':altphilologe', $_SERVER['Altphilologe']);
            $stmt->bindParam(':rock', $_SERVER['Rock']);
            $stmt->bindParam(':klausurnachbar', $_SERVER['Klausurnachbar']);
            $stmt->bindParam(':naturbursche', $_SERVER['Naturbursche']);
            $stmt->bindParam(':riese', $_SERVER['Riese']);
            $stmt->bindParam(':drecksack', $_SERVER['Drecksack']);
            $stmt->bindParam(':organisationsdesaster', $_SERVER['Organisationsdesaster']);
            $stmt->bindParam(':junggeselle', $_SERVER['Junggeselle']);
            $stmt->bindParam(':schlaftablette', $_SERVER['Schlaftablette']);
            $stmt->bindParam(':feministin', $_SERVER['Feministin']);
            $stmt->bindParam(':notenwürfler', $_SERVER['Notenwürfler']);
            $stmt->bindParam(':punktelieferant', $_SERVER['Punktelieferant']);
            $stmt->bindParam(':ähm', $_SERVER['Ähm']);
            $stmt->bindParam(':pause', $_SERVER['Pause']);
            $stmt->bindParam(':seelel', $_SERVER['SeeleL']);
            $stmt->bindParam(':unterricht', $_SERVER['Unterricht']);
            $stmt->bindParam(':eingebildet', $_SERVER['Eingebildet']);
            $stmt->bindParam(':spät', $_SERVER['Spät']);
            $stmt->bindParam(':unbekannt', $_SERVER['Unbekannt']);
            $stmt->bindParam(':schülerliebling', $_SERVER['Schülerliebling']);
            $stmt->bindParam(':miesepeter', $_SERVER['Miesepeter']);
            $stmt->bindParam(':moralapostel', $_SERVER['Moralapostel']);
            $stmt->bindParam(':verplant', $_SERVER['Verplant']);
            $stmt->bindParam(':dressed', $_SERVER['Dressed']);
            $stmt->bindParam(':kopierkönig', $_SERVER['Kopierkönig']);
            $stmt->bindParam(':grinsekatze', $_SERVER['Grinsekatze']);
            $stmt->bindParam(':tafelbild', $_SERVER['Tafelbild']);
            $stmt->bindParam(':gartenzwerg', $_SERVER['Gartenzwerg']);
            $stmt->bindParam(':übermotiviert', $_SERVER['Übermotiviert']);
            $stmt->bindParam(':sprücheklopfer', $_SERVER['Sprücheklopfer']);
            $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }
        }
    }

    die(header('location:../../index.php'));
