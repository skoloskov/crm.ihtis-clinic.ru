<?php

require_once 'TCPDF/tcpdf.php';
$patient_date = $_POST["patient_date"];

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('dejavuserifb', '', 11, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Информированное добровольное согласие на виды медицинских  вмешательств, включенные в Перечень определенных видов медицинских вмешательств, на которые граждане дают информированное добровольное согласие при выборе врача и медицинской организации для получения первичной медико-санитарной помощи)', 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->SetFont('dejavuserif', '', 11, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Я ' . $patient_date['name'] . ', дата рождения ' . $patient_date['birth_date'] . ', паспорт сер. ' . $patient_date['ps_series'] . ' № ' . $patient_date['ps_number'] . ' выдан ' . $patient_date['ps_date'] . ' ' . $patient_date['ps_organization'] . ', получая лечение в ООО «ИХТИС»,  даю информированное добровольное согласие на виды медицинских вмешательств, включенные в Перечень определенных видов медицинских вмешательств, на которые граждане дают информированное добровольное согласие при выборе врача и медицинской организации для получения первичной медико-санитарной помощи, утвержденный приказом Министерства здравоохранения и социального развития Российской Федерации от 23 апреля 2012 года № 390н (зарегистрирован Министерством юстиции Российской Федерации 5 мая 2012 года № 24082) (далее – Перечень), для получения первичной медико-санитарной помощи.', 0, 'L', 0, 1, '',  $y, true);

$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 0, $h = 0, $txt = 'В доступной для меня форме мне разъяснены цели, методы оказания медицинской помощи, связанный с ними риск, возможные варианты медицинских вмешательств, их последствия, в том числе вероятность развития осложнений, а также предполагаемые результаты оказания медицинской помощи. Мне разъяснено, что я имею право отказаться от одного или нескольких видов медицинских вмешательств, включенных в Перечень, или потребовать его (их) прекращения, за исключением случаев, предусмотренных частью 9 статьи 20 Федерального закона от 21 ноября 2011 года № 323-ФЗ «Об основах охраны здоровья граждан в Российской Федерации» (Собрание законодательства РоссийскойФедерации, 2011, № 48, ст. 6724; 2012, № 26, ст. 3442, 3446).', 0, 'L', 0, 1, '',  $y, true);

$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Я согласен, что при несоблюдении назначений и рекомендаций, лечащий врач не несет ответственности за результаты моего лечения. Я согласен, что в случае ухудшения самочувствия, при появлении первых признаков осложнений на фоне проводимого лечения я должен незамедлительно обратиться к лечащему врачу или заведующему отделением.', 0, 'L', 0, 1, '',  $y, true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Сведения о выбранных мною лицах, которым в соответствии с пунктом 5 части 5 статьи 19 Федерального закона от 21 ноября 2011 года № 323-ФЗ «Об основах охраны здоровья граждан в Российской Федерации» может быть передана информация о состоянии моего здоровья или состоянии лица, законным представителем которого я являюсь (ненужное зачеркнуть)', 0, 'L', 0, 1, '',  $y, true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['name'], 0, 'L', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '(Ф. И. О. гражданина, контактный телефон)', 0, 'L', 0, 1, '15',  '', true);

$y = $pdf->getY() + 20;
$pdf->MultiCell($w = 40, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 20, $h = 0, $txt = '', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 120, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 9, '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = '(подпись)', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 20, $h = 0, $txt = '', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 120, $h = 0, $txt = '(Ф. И. О. гражданина или законного представителя гражданина)', 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 10;
$pdf->SetFont('dejavuserif', '', 11, '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 20, $h = 0, $txt = '', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 120, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 9, '', true);
$pdf->MultiCell($w = 40, $h = 0, $txt = '(подпись)', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 20, $h = 0, $txt = '', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 120, $h = 0, $txt = '(Ф. И. О. уполномоченного работника ООО “ИХТИС”)', 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 10;
$pdf->SetFont('dejavuserif', '', 11, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = date('d.m.Y'), 0, 'L', 0, 1, '',  $y, true);

$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 9, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '(дата оформления)', 0, 'L', 0, 0, 15,  $y, true);

$pdf->Output(' Соглашение на осмотр пациента.pdf', 'I');


