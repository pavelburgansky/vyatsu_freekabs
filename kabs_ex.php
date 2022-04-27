public function kab($name, $file, Request $request)
    {
        $nArr = explode('-', $name);
        $fArr = explode('_', $file);
        $url = 'https://www.vyatsu.ru/reports/schedule/room/' . $nArr[0] . '_' . $fArr[1] . '_' . $fArr[2] . '_' . $fArr[3];

        $table = file_get_contents($url);
        $table = strstr($table, '<TABLE');
        $table = strstr($table, '</TABLE>', true);
        $rows = explode('</TR>', $table, -1);

        unset($rows[0]);
        $rows = array_values($rows);
        $cells = array();
        $days = array();
        foreach ($rows as $n => $datas) {
            $datas = str_replace("<BR>", " *br*", $datas);
            $cells[$n] = explode('</TD>', $datas, -1);
        }
        unset($cells[0][0]);
        $cells[0] = array_values($cells[0]);

        foreach ($cells as $i => $row) {
            if (strpos($cells[$i][0], 'ROWSPAN=') === false) {
            } else {
                $days[] = trim(strip_tags($cells[$i][0]));
                unset($cells[$i][0]);
                $cells[$i] = array_values($cells[$i]);
            }

            array_walk($cells[$i], function (&$n) {
                $n = trim(strip_tags($n));
            });
        }

        $id = $show = 0;
        $day = $date = '';

        foreach ($cells[0] as $prepId => $prepName) {
            if ($prepName == $name) {
                $id = $prepId;
                break;
            }
        }

        $content = '<b>' . $name . '</b><br>';

        if ($id > 0)
            foreach ($cells as $i => $row) {
                if ($i > 12 * 7) break;

                if ($i % 7 == 1) //если новый день, печатаем заголовок
                {
                    $day = $days[$i / 7];
                    if (!$show) {
                        $arDay = explode(' ', $day);
                        $arDay = explode('.', $arDay[1]);
                        $date = '20' . $arDay[2] . '-' . $arDay[1] . '-' . $arDay[0];
                        if ($date >= $request->date) $show = true;
                    }

                    if ($show) $content .= '<br><b style="margin:0px 0px 0px 10px;">' . $day . '</b><br>';
                }
                if ($show && $row[$id] != '') // если в выбранное время у преподавателя стоит пара
                {
                    $row[$id] = str_replace("*br*", "<br>", $row[$id]);
                    if ($i > 0) {
                        $content .= '<b style="margin:0px 0px 0px 20px;">' . $row[0] . '</b><br>';
                        $content .= '<div style="margin:0px 0px 0px 30px;">' . $row[$id] . '</div>';
                    }
                }
            }
        return view('kab', ['content' => $content]);
    }