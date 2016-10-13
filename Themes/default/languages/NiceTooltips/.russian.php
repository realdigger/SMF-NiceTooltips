<?php
/**
 * @package SMF NiceTooltips Mod
 * @file Mod-NiceTooltips.php
 * @author digger @ http://mysmf.ru
 * @copyright 2016, digger
 * @license Artistic License
 */

global $scripturl;

$txt['NiceTooltips'] = 'Красивые подсказки';
$txt['NiceTooltips_lenght'] = 'Количество символов отображаемых в подсказке (0 = отключено)';
$txt['NiceTooltips_censored'] = 'Включить проверку на нецензурные слова для подсказок (не рекомендуется из-за высокой нагрузки)';
$txt['NiceTooltips_FGCOLOR'] = 'Цвет окна подсказки. Строковое значение. Примечание: если используется шестнадцатиричное значение, обязательно следует указывать символ "#" в начале строки.';
$txt['NiceTooltips_BGCOLOR'] = 'Цвет границы окна подсказки. Строковое значение (см. примечание для Цвета окна подсказки).';
$txt['NiceTooltips_TEXTCOLOR'] = 'Цвет текста в окне подсказки. Строковое значение (см. примечание для Цвета окна подсказки).';
$txt['NiceTooltips_TEXTSIZE'] = 'Размер текста в окне подсказки. Целое число.';
$txt['NiceTooltips_CAPCOLOR'] = 'Цвет текста в заголовке окна подсказки. Строковое значение (см. примечание для Цвета окна подсказки).';
$txt['NiceTooltips_OPACITY'] = 'Полупрозрачность окна подсказки. Целое число (1-100).';
$txt['NiceTooltips_DELAY'] = 'Подсказка будет появляться после задержки заданной в миллисекундах. Целое число.';
$txt['permissionname_disable_nicetooltips'] = 'Не показывать красивые подсказки';
$txt['permissionhelp_disable_nicetooltips'] = 'Выключить отбражение красивых подсказок для этой группы. Также, можно настроить отображение подсказок во всех или отдельных разделах форума через <a href="' . $scripturl . '?action=admin;area=permissions;">групповые права доступа</a> для разделов.';
$txt['NiceTooltips_mobile'] = 'Показывать подсказки на мобильных устройствах';
$txt['NiceTooltips_board_type'] = 'На странице раздела показывать в подсказке';
$txt['NiceTooltips_recent_type'] = 'На странице новых тем показывать в подсказке';
$txt['NiceTooltips_type_first'] = 'первое сообщение';
$txt['NiceTooltips_type_last'] = 'последнее сообщение';