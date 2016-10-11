<?php
/**
 * @package SMF NiceTooltips Mod
 * @file Mod-NiceTooltips.php
 * @author digger @ http://mysmf.ru
 * @copyright 2016, digger
 * @license Artistic License
 * @version 1.12
 */


function NiceTooltip($body = '', $caption = '', $smileys = true, $cache_id = '')
{
    global $context, $settings, $modSettings;

    // Is it disabled or empty? Check permission. Don't show tooltips for mobiles.
    if (
        (allowedTo('disable_nicetooltips',
                !empty($context['current_board']) ? $context['current_board'] : null) && empty($context['user']['is_admin'])) ||
                empty($modSettings['NiceTooltips_lenght']) ||
                empty($body) ||
                (empty($modSettings['NiceTooltips_mobile']) && (!empty($context['browser']['is_iphone']) || !empty($context['browser']['is_android'])))
    ) {
        return ' title="' . $caption . '" ';
    }

    // Send overlib headers.
    if (empty($context['overlib_loaded'])) {
        $context['html_headers'] .= '
	<style type="text/css">
	.nice_tooltip_fgclass {
	text-align: left;
	background-color: ' . $modSettings['NiceTooltips_FGCOLOR'] . ';
	opacity: ' . $modSettings['NiceTooltips_OPACITY'] / 100 . ';
	}
	.nice_tooltip_bgclass {
	background-color: ' . $modSettings['NiceTooltips_BGCOLOR'] . ';
	opacity: ' . $modSettings['NiceTooltips_OPACITY'] / 100 . ';
	}
	</style>';
        $context['html_headers'] .= '
	<script language="JavaScript" type="text/javascript" src="' . $settings['default_theme_url'] . (!empty($modSettings['NiceTooltips_scripturl']) ? '/' . $modSettings['NiceTooltips_scripturl'] : '') . '/overlib.js"></script>';
        $context['html_headers'] .= '
	<script language="JavaScript" type="text/javascript" src="' . $settings['default_theme_url'] . (!empty($modSettings['NiceTooltips_scripturl']) ? '/' . $modSettings['NiceTooltips_scripturl'] : '') . '/overlib_adaptive_width.js"></script>';
        $context['overlib_loaded'] = true;
    }

    // Censored?
    if (!empty($modSettings['NiceTooltips_censored'])) {
        censorText($body);
        censorText($caption);
    }

    // Remove [hide] bbcode from tootips
    $body = preg_replace('/\[hide.*/i', '' , $body);

    // Parse html code and smiles, replace unwanted entities.
    $body = htmlspecialchars(addslashes(parse_bbc($body, $smileys, $cache_id)));
    $caption = htmlspecialchars(addslashes($caption));

    // Make a tooltip.
    $tooltip = ' onmouseover="return overlib(\'' . $body . '\',
	FGCLASS,\'' . 'nice_tooltip_fgclass' . '\',
	BGCLASS,\'' . 'nice_tooltip_bgclass' . '\',
	TEXTCOLOR,\'' . $modSettings['NiceTooltips_TEXTCOLOR'] . '\',
	TEXTSIZE,\'' . $modSettings['NiceTooltips_TEXTSIZE'] . '\',
	CAPCOLOR,\'' . $modSettings['NiceTooltips_CAPCOLOR'] . '\',
	DELAY,' . $modSettings['NiceTooltips_DELAY'] . ',
	CAPTION,\'' . $caption . '\',
	CELLPAD,4,ADAPTIVE_WIDTH,HAUTO,VAUTO)" onmouseout="return nd();" ';

    unset($caption, $body);
    return $tooltip;
}
 