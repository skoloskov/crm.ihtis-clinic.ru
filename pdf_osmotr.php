<?php

require_once 'TCPDF/tcpdf.php';

$patient_date = $_POST["patient_date"];

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

//ШАПКА С ЛОГОТИПОМ
$pdf->Image('wp-content/themes/adminto/img/logo_short.png', '', '', '', 26, 'PNG', '', '', false, '300', '', false, false, 0, false, false, false);

$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 120, $h = 20, $txt = 'тел: 84954780379, почта info@ihtis-clinic.ru адрес: г. Москва ул. Гарибальди дом 19 А', 0, 'C', 0, 0, 45,  '', true, false, false, '', '16', 'B');

$pdf->SetFont('dejavuserif', '', 7, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Медицинская документация
Форма №025/у-04
Утверждена Приказом
Минздравсоцразвития России
от 22.11.2004 №255', 0, 'L', 0, 1, '',  '', true);

$pdf->SetFont('dejavuserifb', '', 11, '', true);
$pdf->MultiCell($w = 120, $h = 0, $txt = 'Консультация нейрохирурга, д.м.н., профессора Каландари А.А.', 0, 'C', 0, 1, 45,  '', true);

$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 30, $h = 0, $txt = 'Дата приема:', 0, 'L', 0, 0, 45,  $y, true);

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 30, $h = 0, $txt = '03.06.2023', 0, 'L', 0, 0, '',  '', true);

$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 30, $h = 0, $txt = 'Номер карты:', 0, 'L', 0, 0, '',  '', true);

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 28, $h = 0, $txt = '11330', 0, 'L', 0, 1, '',  '', true);

//ИНФОРМАЦИОННЫЙ БЛОК 1-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Пациент:', 0, 'L', 0, 0, '',  $y, true);

$pdf->SetFont('dejavuserifb', '', 12, '', true);
$pdf->MultiCell($w = 90, $h = 0, $txt = $patient_date['name'], 0, 'L', 0, 1, '',  '', true);

//ИНФОРМАЦИОННЫЙ БЛОК 2-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 35, $h = 0, $txt = 'Дата рождения:', 0, 'L', 0, 0, '',  $y, true);

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = $patient_date['birth_date'], 0, 'L', 0, 0, '',  '', true);

$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Возраст:', 0, 'L', 0, 0, '',  '', true);

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 28, $h = 0, $txt = '43', 0, 'L', 0, 1, '',  '', true);

//ИНФОРМАЦИОННЫЙ БЛОК 3-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 15, $h = 0, $txt = 'Врач:', 0, 'L', 0, 0, '',  $y, true);

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 90, $h = 0, $txt = 'Каландари Алик Амиранович', 0, 'L', 0, 1, '',  '', true);

//ИНФОРМАЦИОННЫЙ БЛОК 4-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 25, $h = 0, $txt = 'Категория', 0, 'L', 0, 0, '',  $y, true);

$pdf->SetFont('dejavuserifb', '', 9, '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = 'Наличный расчет', 0, 'L', 0, 1, '',  '', true);

//ПОДЧЕРКИВАНИЕ
$pdf->MultiCell($w = 0, $h = 0, $txt = '', array('B' => array('width' => 0.05)), '', 0, 1, '',  '', true);

//ВРЕМЯ ПЕЧАТИ
$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 8, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Время печати: ' . date('d.m.Y H:i:s'), 0, 'R', 0, 1, '',  $y, true);

//АНАМНЕЗ 1-Я СТРОКА
$pdf->SetFont('dejavuserif', '', 10, '', true);
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Жалобы:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_zhaloby'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 2-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 32, $h = 0, $txt = 'Характер боли:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_harakter_boli'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 3-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 45, $h = 0, $txt = 'Анамнез заболевания:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_anamnez_zabolevaniya'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 4-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 45, $h = 0, $txt = 'Проведенное лечение:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_provedennoe_lechenie'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 5-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 35, $h = 0, $txt = 'Анамнез жизни:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_anamne_zhizni'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 6-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 35, $h = 0, $txt = 'Аллергоанамнез:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_allergoanamnez'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 7-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 36, $h = 0, $txt = 'Общее состояние:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_obshhee_sostoyanie'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 8-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 50, $h = 0, $txt = 'Неврологический статус:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_nevrologicheskij_status'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 9-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 50, $h = 0, $txt = 'Ортопедический статус:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_ortopedicheskij_status'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 10-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 38, $h = 0, $txt = 'Локальный статус:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_lokalnyj_status'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 11-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 52, $h = 0, $txt = 'Результаты обследования:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_rezultaty_obsledovaniya'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 12-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 55, $h = 0, $txt = 'Предварительный диагноз:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_predvaritelnyj_diagnoz'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 13-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 72, $h = 0, $txt = 'МКБ 10 Предварительного диагноза:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_mkb_10'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 14-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 55, $h = 0, $txt = 'Рекомендации по лечению:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_rekomendaczii_lechenie'], 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 15-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 64, $h = 0, $txt = 'Рекомендации по обследованию:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'нет', 0, 'L', 0, 1, '',  '', true);

//АНАМНЕЗ 16-Я СТРОКА
$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 35, $h = 0, $txt = 'Повторная явка:', 0, 'L', 0, 0, 15,  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['patient_povtornaya_yavka'], 0, 'L', 0, 1, '',  '', true);

//СОГЛАСИЕ
$y = $pdf->getY() + 5;
$pdf->SetFont('dejavuserif', '', 12, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Я, ' . $patient_date['name'] . ', представил (а) лечащему врачу всю информацию о состоянии своего здоровья, наличии хронических заболеваний и аллергических реакций. Имел(а) возможность задать врачу интересующие меня вопросы относительного моего здоровья, заболевания, лечения и получил(а) на них удовлетворительные ответы. Претензий к приему и смотру не имею. Согласен(а) с данными мне рекомендациями по обследованию и лечению, в чем расписываюсь собственноручно:', 0, 'L', 0, 1, '',  $y, true);

//ПОДПИСЬ ВРАЧА
$y = $pdf->getY() + 10;
$pdf->MultiCell($w = 15, $h = 0, $txt = 'Врач:', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 48, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '(Каландари Алик Амиранович)', 0, 'L', 0, 1, '',  '', true);

//ПОДПИСЬ ПАЦИЕНТА
$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 23, $h = 0, $txt = 'Пациент:', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 40, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '(' . $patient_date['name'] . ')', 0, 'L', 0, 1, '',  '', true);


$pdf->Output(' Осмотр пациента.pdf', 'I');


?>

