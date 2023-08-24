<?php

require_once 'TCPDF/tcpdf.php';

$patient_date = $_POST["patient_date"];
//echo '<pre>' . print_r($patient_birthdate, true) . '</pre>'; die();


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();


//ШАПКА
$pdf->SetFont('dejavuserif', '', 8, '', true);
$pdf->MultiCell($w = 80, $h = 0,
    $txt = 'Приложение № 1
к приказу Министерства здравоохранения Российской Федерации
от 15 декабря 2014 г. № 834н',
    0, '', 0, 1, 125,  '', true);

$pdf->SetFont('dejavuserif', '', 9, '', true);
$pdf->MultiCell($w = 120, $h = 0,
    $txt = 'Наименование медицинской организации',
    0, 'L', 0, 1, '',  '30', true);

$pdf->MultiCell($w = 37, $h = 0,
    $txt = 'Код формы по ОКУД',
    0, 'L', 0, 0, '110',  '30', true);

$pdf->MultiCell($w = 48, $h = 0,
    $txt = '',
    array('B' => array('width' => 0.05)), 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 75, $h = 0,
    $txt = 'ООО ИХТИС',
    array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '40', true);

$pdf->MultiCell($w = 80, $h = 0,
    $txt = 'Код организации по ОКПО',
    0, 'L', 0, 1, '110',  '35', true);

$pdf->MultiCell($w = 37, $h = 0,
    $txt = '',
    array('B' => array('width' => 0.05)), 'L', 0, 1, '158',  '35', true);

$pdf->MultiCell($w = 30, $h = 0,
    $txt = 'Адрес',
    0, 'L', 0, 1, '',  '55', true);

$pdf->MultiCell($w = 60, $h = 0,
    $txt = 'Москва, ул. Гарибальди 19А, м. Новые Черемушки, выход 5.',
    array('B' => array('width' => 0.05)), 'L', 0, 1, '25',  '50', true);

$pdf->MultiCell($w = 85, $h = 0,
    $txt = 'Медицинская документация',
    0, 'C', 0, 1, '110',  '40', true);

$pdf->MultiCell($w = 85, $h = 0,
    $txt = 'Учетная форма № 025/у
Утверждена приказом Минздрава России
от 15 декабря 2014 г. № 834н',
    0, 'C', 0, 1, '110',  '45', true);

//ЗАГОЛОВОК
$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'МЕДИЦИНСКАЯ КАРТА', 0, 'C', 0, 1, '',  '65', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'ПАЦИЕНТА, ПОЛУЧАЮЩЕГО МЕДИЦИНСКУЮ ПОМОЩЬ', 0, 'C', 0, 1, '',  '', true);
$pdf->MultiCell($w = 75, $h = 0, $txt = 'В АМБУЛАТОРНЫХ УСЛОВИЯХ №', 0, 'C', 0, 0, '60',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = $patient_date['id'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 1-Я СТРОКА
$compl_date_Y = date('Y');
$compl_date_M = date('m');
$compl_date_D = date('d');
$pdf->SetFont('dejavuserif', '', 9, '', true);
$pdf->MultiCell($w = 82, $h = 0, $txt = '1. Дата заполнения медицинской карты: число', 0, 'L', 0, 0, '',  '80', true);
$pdf->MultiCell($w = 12, $h = 0, $txt = $compl_date_D, array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 13, $h = 0, $txt = 'месяц', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 25, $h = 0, $txt = $compl_date_M, array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 9, $h = 0, $txt = 'год', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell($w = 16, $h = 0, $txt = $compl_date_Y, array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 2-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserifb', '', 9, '', true);
$pdf->MultiCell($w = 53, $h = 0, $txt = '2. Фамилия, имя, отчество', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['name'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 3-Я СТРОКА
$patient_birthdate = explode('.', $patient_date['birth_date']);

$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 100, $h = 0, $txt = '3. Пол: муж. - 1, жен. - 2     4. Дата рождения: число', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 12, $h = 0, $txt = $patient_birthdate[0], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 14, $h = 0, $txt = 'месяц', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 29, $h = 0, $txt = $patient_birthdate[1], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 9, $h = 0, $txt = 'год', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_birthdate[2], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 4-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 105, $h = 0, $txt = '5. Место регистрации: субъект Российской Федерации', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['adress_subject'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 5-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 15, $h = 0, $txt = 'район', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 32, $h = 0, $txt = $patient_date['adress_region'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 15, $h = 0, $txt = 'город', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 43, $h = 0, $txt = $patient_date['adress_city'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = 'населенный пункт', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['adress_point'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 6-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 15, $h = 0, $txt = 'улица', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 50, $h = 0, $txt = $patient_date['adress_street'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 9, $h = 0, $txt = 'дом', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 21, $h = 0, $txt = $patient_date['adress_building'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'квартира', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = $patient_date['adress_appartament'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 10, $h = 0, $txt = 'тел.', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['phone'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 7-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 0, $h = 0, $txt = '6. Местность: городская - 1, сельская - 2', 0, 'L', 0, 1, '',  $y, true);

//ДАННЫЕ БОЛЬНОГО 8-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 42, $h = 0, $txt = '7. Полис ОМС: серия', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 27, $h = 0, $txt = $patient_date['oms_series'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 6, $h = 0, $txt = '№', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 34, $h = 0, $txt = $patient_date['oms_number'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 21, $h = 0, $txt = '8. СНИЛС', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['snils'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 9-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 106, $h = 0, $txt = '9. Наименование страховой медицинской организации', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['oms_company'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 10-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 52, $h = 0, $txt = '10. Код категории льготы', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 25, $h = 0, $txt = $patient_date['privileges_cod'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '11. Документ', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 28, $h = 0, $txt = 'паспорт', array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 16, $h = 0, $txt = ': серия', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 16, $h = 0, $txt = $patient_date['ps_series'], array('B' => array('width' => 0.05)), 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 7, $h = 0, $txt = '№', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['ps_number'], array('B' => array('width' => 0.05)), 'C', 0, 1, '',  '', true);

//ДАННЫЕ БОЛЬНОГО 11-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 0, $h = 0, $txt = '12. Заболевания, по поводу которых осуществляется диспансерное наблюдение:', 0, 'L', 0, 1, '',  $y, true);

//ТАБЛИЦА ЗАГОЛОВКИ
$pdf->SetFont('dejavuserifb', '', 8, '', true);
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 27, $h = 17, $txt = 'Дата начала диспансерного наблюдения', 1, 'C', 0, 0, '',  $y, true, 0, false, true, 17, 'M');
$pdf->MultiCell($w = 27, $h = 17, $txt = 'Дата прекращения диспансерного наблюдения', 1, 'C', 0, 0, '',  '', true, 0, false, true, 17, 'M');
$pdf->MultiCell($w = 84, $h = 17, $txt = 'Диагноз', 1, 'C', 0, 0, '',  '', true, 0, false, true, 17, 'M');
$pdf->MultiCell($w = 18, $h = 17, $txt = 'Код по МКБ-10', 1, 'C', 0, 0, '',  '', true, 0, false, true, 17, 'M');
$pdf->MultiCell($w = 0, $h = 17, $txt = 'Врач', 1, 'C', 0, 1, '',  '', true, 0, false, true, 17, 'M');

//ТАБЛИЦА ЯЧЕЙКИ 1-Я СТРОКА
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 84, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 18, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '', 1, 'C', 0, 1, '',  '', true);

//ТАБЛИЦА ЯЧЕЙКИ 2-Я СТРОКА
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 84, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 18, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '', 1, 'C', 0, 1, '',  '', true);

//ТАБЛИЦА ЯЧЕЙКИ 3-Я СТРОКА
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 84, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 18, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '', 1, 'C', 0, 1, '',  '', true);

//ТАБЛИЦА ЯЧЕЙКИ 4-Я СТРОКА
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 84, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 18, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '', 1, 'C', 0, 1, '',  '', true);

//ТАБЛИЦА ЯЧЕЙКИ 5-Я СТРОКА
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 27, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 84, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 18, $h = 0, $txt = '', 1, 'C', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '', 1, 'C', 0, 1, '',  '', true);





$pdf->Output(' Титульный лист пациента.pdf', 'I');


?>