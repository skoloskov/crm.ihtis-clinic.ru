<?php

require_once 'TCPDF/tcpdf.php';
$patient_date = $_POST["patient_date"];

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Договор', 0, 'C', 0, 1, '',  '', true);

$y = $pdf->getY() + 1;
$pdf->MultiCell($w = 0, $h = 0, $txt = 'на оказание платных медицинских услуг', 0, 'C', 0, 1, '',  $y, true);

$y = $pdf->getY() + 1;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 60, $h = 0, $txt = 'г. Москва', 0, 'L', 0, 0, '',  $y, true);
$date_dogovor = date('d.m.Y');
$pdf->MultiCell($w = 0, $h = 0, $txt = $date_dogovor . ' г.', 0, 'R', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$enter_text_block = $patient_date['company_name'] . ', действующее в соответствии с лицензией Л041-01137-77/00150033 на медицинскую деятельность выданной департаментом Здравоохранения города Москвы, Оружейный пер. д 43 , согласно приложениям: При оказании первичной медико-санитарной помощи организуются и выполняются следующие работы (услуги): при оказании первичной доврачебной медико-санитарной помощи в амбулаторных условиях по: медицинскому массажу; сестринскому делу; физиотерапии; при оказании первичной врачебной медико-санитарной помощи в амбулаторных условиях по: терапии; при оказании первичной специализированной медико-санитарной помощи в амбулаторных условиях по: косметологии; мануальной терапии; неврологии; нейрохирургии; рефлексотерапии; травматологии и ортопедии; ультразвуковой диагностике; эндокринологии; При проведении медицинских экспертиз организуются и выполняются следующие работы (услуги) по: экспертизе временной нетрудоспособности от 01 декабря 2022, действующей бессрочно, в лице генерального директора Каландари Майя Георгиевна, действующей на основании Устава, именуемое в дальнейшем «Медицинский центр», с одной стороны, и '  . $patient_date['name'] . ' (дата рождения) ' . $patient_date['birth_date'] . ', именуемый(ая) в дальнейшем «Пациент», с другой стороны, заключили настоящий Договор о нижеследующем:';
$pdf->MultiCell($w = 0, $h = 0, $txt = $enter_text_block, 0, 'J', 0, 1, '',  $y, true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '1. ПРЕДМЕТ ДОГОВОРА', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '1.1 В соответствии с настоящим Договором Медицинский Центр обязуется оказывать Пациенту на возмездной основе медицинские услуги, отвечающие требованиям, предъявляемым к методам диагностики, профилактики и лечения, разрешенным на территории РФ, а Пациент обязуется своевременно оплачивать стоимость предоставляемых медицинских услуг, а также выполнять требования Медицинского Центра, обеспечивающие качественное предоставление медицинских услуг, включая сообщение необходимых для этого сведений.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '1.2 Перечень и стоимость услуг, предоставляемых Пациенту, оговариваются действующим прейскурантом Медицинского Центра. По медицинским показаниям и/или с согласия Пациента ему могут быть оказаны и иные услуги, стоимость которых согласовывается Медицинским Центром с Пациентом или его представителем дополнительно.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = ' 1.3 При исполнении настоящего Договора стороны руководствуются действующим российским законодательством, регулирующим предоставление платных медицинских услуг населению медицинскими учреждениями.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '2. УСЛОВИЯ И ПОРЯДОК ОКАЗАНИЯ УСЛУГ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '2.1 Медицинский Центр оказывает услуги по настоящему Договору в помещении Медицинского Центра по адресу: г. Москва, ул. Гарибальди, д.19А.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '2.2 Медицинский Центр оказывает услуги по настоящему Договору в дни и часы работы, которые устанавливаются администрацией Медицинского Центра и доводятся до сведения пациента.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '2.3 Предоставление услуг по настоящему Договору происходит в порядке предварительной записи Пациента на прием. Предварительная запись пациента на прием осуществляется через регистратуру Медицинского Центра посредством телефонной, факсимильной и иной связи.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 47, $h = 0, $txt = 'Телефон регистратуры: ', 0, 'L', 0, 0, '',  '', true);
$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '8 (495) 175-17-17', 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '3. ПОРЯДОК РАСЧЕТОВ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '3.1 Оплата медицинских услуг по настоящему договору производится Пациентом в полном объеме в день оказания услуги, если иной порядок не предусмотрен настоящим Договором или соглашением сторон. Оплата услуг Медицинского Центра производится всеми способами, не запрещенными законодательством РФ.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '4. ПРАВА И ОБЯЗАННОСТИ СТОРОН.', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1 Права и обязанности Медицинского Центра:', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1.1 Своевременно и качественно оказывать услуги в соответствии с условиями настоящего договора.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1.2 Обеспечить пациента в установленном порядке информацией, включающей в себя сведения о месте оказания услуг, режиме работы, перечне платных медицинских услуг с указанием их стоимости, об условиях предоставления и получения этих услуг, а так же сведения о квалификации и сертификации специалистов.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1.3 Обеспечить выполнение принятых на себя обязательств по оказанию медицинских услуг силами собственных специалистов и/или сотрудников медицинских учреждений, имеющих с Медицинским Центром договорные отношения.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1.4 Обеспечить пациенту непосредственное ознакомление с медицинской документацией, отражающей состояние его здоровья и выдать по письменному требованию пациента или его законного представителя копии медицинских документов, отражающих состояние здоровья пациента в течение 30 дней.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.1.5 В одностороннем порядке расторгнуть договор при условии неоднократного нарушения условий договора пациентом.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2 Права и обязанности пациента:', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.1 Пациент имеет право в доступной для него форме получить имеющуюся информацию о состоянии своего здоровья, включая сведения о результатах обследования, наличии заболевания, его диагнозе и прогнозе, методах лечения, связанном с ними риске, возможных вариантах медицинского вмешательства, их последствиях и результатах проведенного лечения.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.2 Информация, содержащаяся в медицинских документах Пациента, составляет врачебную тайну и может предоставляться без согласия Пациента только по основаниям, предусмотренным пунктом 5 настоящего Договора.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.3 Пациент имеет право на информированное добровольное согласие на медицинское вмешательство. В случаях, когда состояние Пациента не позволяет ему выразить свою волю, а медицинское вмешательство неотложно, вопрос о его проведении в интересах Пациента решает консилиум, а в особых случаях лечащий (дежурный) врач. Отказ от медицинского вмешательства с указанием возможных последствий оформляется записью в медицинской документации и подписывается Пациентом или его представителем, а также медицинским работником.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.4 Пациент обязуется предоставлять информацию до оказания услуги о перенесенных заболеваниях, известных ему аллергических реакциях, противопоказаниях к различным видам лечения и диагностики.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.5 Точно выполнять назначения врача, надлежащим образом исполнять условия настоящего Договора и своевременно информировать Медицинский Центр о необходимости отмены или изменения назначенного ему времени получения медицинской услуги. В случае опоздания Пациента более чем на 15 (пятнадцать) минут по отношению к назначенному Пациенту времени получения услуги, Медицинский Центр оставляет за собой право на перенос или отмену срока получения услуги.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '4.2.6 Пациент обязан указать мобильный телефон для получения уведомлений информационного характера и дополнительной информации от ООО «ИХТИС». Пациент имеет право отказаться от получения сообщений путем подачи заявления на имя руководителя медицинского центра.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '5. КОНФИДЕНЦИАЛЬНОСТЬ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '5.1 Медицинский Центр обязуется хранить в тайне информацию о факте обращения Пациента за медицинской помощью, состоянии его здоровья, диагнозе его заболевания и иные сведения, полученные при его обследовании и лечении (врачебная тайна).', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '5.2 С согласия Пациента или его представителя допускается передача сведений, составляющих врачебную тайну другим лицам, в том числе должностным лицам, в интересах обследования и лечения Пациента.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '5.3 Предоставление сведений, составляющих врачебную тайну, без согласия Пациента или его представителя допускается в целях обследования и лечения Пациента, не способного из-за своего состояния выразить свою волю и в иных случаях, предусмотренных законодательством РФ.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '5.4 Подписывая настоящий договор, пациент дает согласие на обработку своих персональных данных в ООО «ИХТИС».', 0, 'J', 0, 1, '',  '', true);
$soglasie_text_block = '5.5 Я, ' . 'Некрасова Мария Васильевна' . ', выражаю свое согласие/ несогласие на получение следующих сервисных услуг';
$pdf->MultiCell($w = 0, $h = 0, $txt = $soglasie_text_block, 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 10, $h = 0, $txt = '№', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 80, $h = 0, $txt = 'Предлагаемые сервисные услуги', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Отметка о согласии', 0, 'R', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 10, $h = 0, $txt = '1)', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 143, $h = 0, $txt = 'Получение SMS уведомления: оповещение о записи на прием в клинику, о графике работы клиники, акциях и новых услугах.', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Да', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Нет', 0, 'R', 0, 1, '',  '', true);

$y = $pdf->getY() + 10;
$pdf->MultiCell($w = 10, $h = 0, $txt = '2)', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 143, $h = 0, $txt = 'Получение по электронной почте: информации об акциях, новых услугах и персональных предложениях.', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Да', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Нет', 0, 'R', 0, 1, '',  '', true);

$y = $pdf->getY() + 10;
$pdf->MultiCell($w = 0, $h = 0, $txt = '6. ОТВЕТСТВЕННОСТЬ СТОРОН', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '6.1 Медицинский Центр несет ответственность в размере реального ущерба, причиненного Пациенту неисполнением или ненадлежащим исполнением условий настоящего Договора, а также в случае причинения вреда здоровью и жизни Пациента в соответствии с законодательством РФ.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '6.2 Медицинский Центр освобождается от ответственности за неисполнение или ненадлежащее исполнение настоящего Договора, причиной которого стало нарушение Пациентом условий настоящего Договора, а также по иным основаниям, предусмотренным законодательством РФ.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '7. РАССМОТРЕНИЕ СПОРОВ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '7.1 Все споры, вытекающие из настоящего Договора, разрешаются сторонами путем переговоров. В случае невозможности урегулирования спора путем переговоров, спор подлежит разрешению в соответствии с действующим законодательством РФ.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '8. ЗАКЛЮЧИТЕЛЬНЫЕ ПОЛОЖЕНИЯ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '8.1 Настоящий Договор вступает в силу с момента его подписания и действует до конца календарного года включительно.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Если ни одна из Сторон не уведомит вторую Сторону о своем желании прекратить сотрудничество не менее чем за 30 (тридцать) календарных дней до даты истечения срока действия Договора, срок действия Договора продлевается на следующий год. Количество таких продлений не ограничено.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '8.2 Настоящий Договор может быть расторгнут: по соглашению Сторон в любое время; любой из Сторон в одностороннем порядке с обязательным предварительным письменным уведомлением другой Стороны не менее чем за 10 (десять) календарных дней до даты расторжения;', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '8.3 Обязательства Сторон по Договору, которые в силу своей природы должны продолжать действовать (включая обязательства в отношении проведения взаиморасчетов), остаются в силе после окончания действия Договора.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '8.4 Все дополнения и Приложения к настоящему Договору вступают в силу с момента подписания и являются его неотъемлемой частью. ', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '9. ПРОЧИЕ УСЛОВИЯ', 0, 'C', 0, 1, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.1 Договор и его исполнение регулируется в соответствии с законодательством Российской Федерации.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.2 ООО «ИХТИС» оставляет за собой право вносить изменения в прейскурант услуг. Указанные изменения вступают в силу в момент их утверждения Генеральным Директором.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.3 Любые изменения и дополнения к Договора действительны при условии, если они совершены в письменной форме и подписаны обеими Сторонами.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.4 Любые уведомления по настоящему Договору направляются уведомляющей Стороной в адрес уведомляемой Стороны по электронной почте, факсом, курьером или почтой с уведомлением о вручении. При этом копии документов, доставленные по электронной почте или по факсу, признаются Сторонами имеющими юридическую силу до момента обмена оригиналами, который Стороны производят в возможно короткие сроки.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.5 Все акты, приложения и дополнения к Договору являются неотъемлемой частью Договора.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.6 В случае если одно или более положений Договора будут признаны недействительными, такая недействительность не оказывает влияния на действительность любого другого положения Договора и Договора в целом.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.7 Все споры и разногласия между Сторонами по Договору, в связи с Договором и/или его исполнением Стороны будут стремиться урегулировать путем переговоров. Применение обязательного досудебного (претензионного) порядка разрешения споров обязательно. Сторона, права которой нарушены, до обращения в суд обязана предъявить другой Стороне письменную претензию с изложением своих требований. Срок рассмотрения претензии - 30 (тридцать) календарных дней со дня ее получения. Если в указанный срок требования не удовлетворены, спор подлежит разрешению в Арбитражном суде г. Москвы', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.8 Информация, содержащаяся в Договоре, а также факт заключения Договора имеют конфиденциальный характер. За исключением случаев, прямо указанных в Договоре или предварительно согласованных Сторонами в письменной форме в виде дополнительного соглашения к Договору, ни одна из Сторон не вправе каким-либо образом использовать полное, сокращенное фирменное наименование, товарные знаки, коммерческие обозначения и иные средства индивидуализации, принадлежащие второй Стороне, без предварительного разрешения последней.', 0, 'J', 0, 1, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = '9.9 Договор составлен в 2 (Двух) экземплярах, имеющих одинаковую юридическую силу.', 0, 'J', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 0, $h = 0, $txt = '10. РЕКВИЗИТЫ СТОРОН', 0, 'C', 0, 1, '',  $y, true);

$y = $pdf->getY() + 5;
$pdf->SetFont('dejavuserifb', '', 10, '', true);
$pdf->MultiCell($w = 90, $h = 0, $txt = 'Медицинский центр:', 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Пациент:', 0, 'L', 0, 1, '',  '', true);

$pdf->SetFont('dejavuserif', '', 10, '', true);
$pdf->MultiCell($w = 90, $h = 0, $txt = $patient_date['company_name'], 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'ФИО ' . $patient_date['name'], 0, 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 90, $h = 0, $txt = 'ИНН ' . $patient_date['company_inn'], 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Дата рождения ' . $patient_date['birth_date'], 0, 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 90, $h = 0, $txt = 'ОГРН ' . $patient_date['company_ogrn'], 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Паспорт серии ' . $patient_date['ps_series'] . ' № ' . $patient_date['ps_number'] . ' выдан ' . $patient_date['ps_date'], 0, 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 90, $h = 0, $txt = 'Расчетный счет: ' . $patient_date['company_rass_schet'] . ' Наименование банка:', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = $patient_date['ps_organization'], 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 4;
$pdf->MultiCell($w = 90, $h = 0, $txt = $patient_date['company_bank_name'], 0, 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Адрес проживания: ' . $patient_date['adress_city'] . ' ' . $patient_date['adress_street'] . ' ' . $patient_date['adress_building'] . ' ' . $patient_date['adress_appartament'], 0, 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 90, $h = 0, $txt = 'Корр. счет: ' . $patient_date['company_korr_schet'], 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'Мобильный телефон: ' . $patient_date['phone'], 0, 'L', 0, 1, '',  '', true);


$pdf->MultiCell($w = 90, $h = 0, $txt = 'БИК ' . $patient_date['company_bik'], 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 0, $h = 0, $txt = 'e-mail:', 0, 'L', 0, 1, '',  '', true);

$pdf->MultiCell($w = 90, $h = 0, $txt = $patient_date['company_adress'], 0, 'L', 0, 1, '',  '', true, 1);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 90, $h = 0, $txt = 'Генеральный директор:', 0, 'L', 0, 1, '',  '', true);
$pdf->MultiCell($w = 90, $h = 0, $txt = $patient_date['company_director'], 0, 'L', 0, 1, '',  '', true);

$y = $pdf->getY() + 5;
$pdf->MultiCell($w = 80, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 0, '',  $y, true);
$pdf->MultiCell($w = 10, $h = 0, $txt = '', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 20, $h = 0, $txt = 'Подпись:', 0, 'L', 0, 0, '',  '', true);
$pdf->MultiCell($w = 70, $h = 0, $txt = '', array('B' => array('width' => 0.05)), 'L', 0, 1, '',  '', true);



$pdf->Output(' Договор на платные медицинские услуги.pdf', 'I');
