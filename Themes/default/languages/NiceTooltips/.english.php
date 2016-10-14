<?php
/**
 * @package SMF NiceTooltips Mod
 * @file Mod-NiceTooltips.php
 * @author digger @ http://mysmf.ru
 * @copyright 2016, digger
 * @license Artistic License
 */

global $scripturl;

$txt['NiceTooltips'] = 'Nice Tooltips';
$txt['NiceTooltips_lenght'] = 'Number of characters to display in the tooltip (0 = disable)';
$txt['NiceTooltips_censored'] = 'Words in the tooltip will be censored';
$txt['NiceTooltips_FGCOLOR'] = 'Background color of the tooltip. A string value. NOTE: If a hexadecimal triplet is specified for the color, then the leading hash (#) mark must also be included.';
$txt['NiceTooltips_BGCOLOR'] = 'Color of the border of the tooltip. A string value. See NOTE above.';
$txt['NiceTooltips_TEXTCOLOR'] = 'Color of the text inside the tooltip. A string value. See NOTE above.';
$txt['NiceTooltips_TEXTSIZE'] = 'Font size of the text inside the tooltip. An integer value.';
$txt['NiceTooltips_CAPCOLOR'] = 'Color of the tooltip caption text. A string value. See NOTE above.';
$txt['NiceTooltips_OPACITY'] = 'Opacity of the tooltip. An integer value (1-100).';
$txt['NiceTooltips_DELAY'] = 'Tooltip will popup only after a certain delay specified in millisecs. An integer value.';
$txt['NiceTooltips_IMG_WIDTH'] = 'Max images width (px). An integer value.';
$txt['permissionname_disable_nicetooltips'] = 'Don\'t show nice tooltips (NiceTooltips Mod)';
$txt['permissionhelp_disable_nicetooltips'] = 'Disable NiceTooltips Mod for this group. Also, you can change this for some boards with a <a href="' . $scripturl . '?action=admin;area=permissions;">group permissions</a>.';
$txt['NiceTooltips_mobile'] = 'Show tooltips on mobile devices';
$txt['NiceTooltips_board_type'] = 'For board messages page tooltips show';
$txt['NiceTooltips_recent_type'] = 'For recent messages page tooltips show';
$txt['NiceTooltips_type_first'] = 'first message';
$txt['NiceTooltips_type_last'] = 'last message';