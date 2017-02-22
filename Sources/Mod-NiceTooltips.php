<?php
/**
 * @package SMF NiceTooltips Mod
 * @file Mod-NiceTooltips.php
 * @author digger @ http://mysmf.ru
 * @copyright 2016, digger
 * @license Artistic License
 */

/**
 * Load all needed hooks
 */
function loadNiceTooltipsHooks()
{
    add_integration_function('integrate_admin_areas', 'addNiceTooltipsAdminArea', false);
    add_integration_function('integrate_modify_modifications', 'addNiceTooltipsAdminAction', false);
    add_integration_function('integrate_menu_buttons', 'addNiceTooltipsCopyright', false);
    add_integration_function('integrate_load_permissions', 'addNiceTooltipsPermissions', false);

    // Custom hooks
    add_integration_function('integrate_board_tooltips', 'addBoardTooltips', false);
    add_integration_function('integrate_recent_tooltips', 'addRecentTooltips', false);
}


/**
 * Add tooltips to board topic titles
 * @param $row topic data
 */
function addBoardTooltips(&$row)
{
    global $modSettings;

    if ($modSettings['NiceTooltips_board_type'] == 'first') {
        $row['nice_tooltip_first_msg'] = NiceTooltip($row['first_body'],
            '[' . $row['first_display_name'] . '] ' . $row['first_subject'], $row['first_smileys'],
            $row['id_first_msg']);
    } elseif ($modSettings['NiceTooltips_board_type'] == 'last') {
        $row['nice_tooltip_first_msg'] = NiceTooltip($row['last_body'],
            '[' . $row['last_display_name'] . '] ' . $row['last_subject'], $row['last_smileys'],
            $row['id_last_msg']);
    }

}


/**
 * Add tooltips to recent topic titles
 * @param $row topic data
 */
function addRecentTooltips(&$row)
{
    global $modSettings;

    if ($modSettings['NiceTooltips_recent_type'] == 'first') {
        $row['nice_tooltip_first_msg'] = NiceTooltip($row['first_body'],
            '[' . $row['first_poster_name'] . '] ' . $row['first_subject'], $row['first_smileys'],
            $row['id_first_msg']);
    } elseif ($modSettings['NiceTooltips_recent_type'] == 'last') {
        $row['nice_tooltip_first_msg'] = NiceTooltip($row['last_body'],
            '[' . $row['last_poster_name'] . '] ' . $row['last_subject'], $row['last_smileys'],
            $row['id_last_msg']);
    }

}


/**
 * Add mod admin area
 * @param $admin_areas
 */
function addNiceTooltipsAdminArea(&$admin_areas)
{
    global $txt;
    loadLanguage('NiceTooltips/');

    $admin_areas['config']['areas']['modsettings']['subsections']['nicetooltips'] = array($txt['NiceTooltips']);
}


/**
 * Add mod admin action
 * @param $subActions
 */
function addNiceTooltipsAdminAction(&$subActions)
{
    $subActions['nicetooltips'] = 'addNiceTooltipsAdminSettings';
}


/**
 * Add mod settings area
 * @param bool $return_config
 * @return array
 */
function addNiceTooltipsAdminSettings($return_config = false)
{
    global $txt, $scripturl, $context;
    loadLanguage('NiceTooltips/');

    $context['page_title'] = $context['settings_title'] = $txt['NiceTooltips'];
    $context['post_url'] = $scripturl . '?action=admin;area=modsettings;save;sa=nicetooltips';

    $config_vars = array(
        array('int', 'NiceTooltips_lenght'),
        array('check', 'NiceTooltips_censored'),
        array('check', 'NiceTooltips_mobile'),
        array(
            'select',
            'NiceTooltips_board_type',
            array(
                'first' => $txt['NiceTooltips_type_first'],
                'last' => $txt['NiceTooltips_type_last'],
            ),
        ),
        array(
            'select',
            'NiceTooltips_recent_type',
            array(
                'first' => $txt['NiceTooltips_type_first'],
                'last' => $txt['NiceTooltips_type_last'],
            ),
        ),
        '',
        array('text', 'NiceTooltips_FGCOLOR'),
        array('text', 'NiceTooltips_BGCOLOR'),
        array('text', 'NiceTooltips_TEXTCOLOR'),
        array('text', 'NiceTooltips_TEXTSIZE'),
        array('text', 'NiceTooltips_CAPCOLOR'),
        array('text', 'NiceTooltips_OPACITY'),
        array('int', 'NiceTooltips_DELAY'),
        array('int', 'NiceTooltips_IMG_WIDTH'),
        '',
        array(
            'permissions',
            'disable_nicetooltips',
            'label' => $txt['permissionname_disable_nicetooltips'],
            'subtext' => $txt['permissionhelp_disable_nicetooltips']
        ),
    );

    if ($return_config) {
        return $config_vars;
    }

    if (isset($_GET['save'])) {
        checkSession();
        $save_vars = $config_vars;
        saveDBSettings($save_vars);
        redirectexit('action=admin;area=modsettings;sa=nicetooltips');
    }

    prepareDBSettingContext($config_vars);
}


/**
 * Add mod permissions
 * @param $permissionGroups
 * @param $permissionList
 * @param $leftPermissionGroups
 * @param $hiddenPermissions
 * @param $relabelPermissions
 */
function addNiceTooltipsPermissions(
    &$permissionGroups,
    &$permissionList,
    &$leftPermissionGroups,
    &$hiddenPermissions,
    &$relabelPermissions
) {
    $permissionList['membergroup']['disable_nicetooltips'] = array(false, 'general', 'moderate_general');
    $permissionList['board']['disable_nicetooltips'] = array(false, 'general_board', 'moderate');
}


/**
 * Add mod copyright to the forum credits page
 */
function addNiceTooltipsCopyright()
{
    global $context;

    if ($context['current_action'] == 'credits') {
        $context['copyrights']['mods'][] = '<a href="http://mysmf.ru/mods/nicetooltips" target="_blank">NiceTooltips</a> &copy; 2009-2016, digger';
    }
}

/**
 * Generate tooltip and load all we need
 * @param string $body
 * @param string $caption
 * @param bool $smileys
 * @param string $cache_id
 * @return string
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
	text-align: ' . (empty($context['right_to_left']) ? 'left' : 'right') . ';
	background-color: ' . $modSettings['NiceTooltips_FGCOLOR'] . ';
	opacity: ' . $modSettings['NiceTooltips_OPACITY'] / 100 . ';
	}
	.nice_tooltip_bgclass {
	background-color: ' . $modSettings['NiceTooltips_BGCOLOR'] . ';
	opacity: ' . $modSettings['NiceTooltips_OPACITY'] / 100 . ';
	}
	.nice_tooltip_bgclass img, .nice_tooltip_fgclass img{
    height: auto; max-width: ' . $modSettings['NiceTooltips_IMG_WIDTH'] . 'px;
	</style>';
        $context['insert_after_template'] .= '
	<script type="text/javascript" src="' . $settings['default_theme_url'] . '/scripts/overlib.min.js"></script>';
        $context['insert_after_template'] .= '
	<script type="text/javascript" src="' . $settings['default_theme_url'] . '/scripts/overlib_adaptive_width.min.js"></script>
	<script type="text/javascript"><!-- // --><![CDATA[
	    var ol_close="[X]";
	// ]]></script>';
        $context['overlib_loaded'] = true;
    }

    // Censored?
    if (!empty($modSettings['NiceTooltips_censored'])) {
        censorText($body);
        censorText($caption);
    }

    // Fix some unclosed bbcodes
    $body = fixNiceTooltipsUnclosedTags($body);

    // Parse html code and smiles, replace unwanted entities.
    $body = htmlspecialchars(addslashes(parse_bbc($body, $smileys, $cache_id))) . '...';
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

/**
 * Fix some unclosed bbcodes
 * @param string $body
 * @return string $body
 */
function fixNiceTooltipsUnclosedTags($body = '')
{
    global $modSettings;

    $tags = array('hide', 'spoiler');

    // Custom Hide Tags mod support
    if (!empty($modSettings['custom_hide_tags'])) {
        $tags = array_merge($tags, array_keys(@unserialize($modSettings['custom_hide_tags'])));
    }

    // Remove duplicates
    $tags = array_unique($tags);

    foreach ($tags as $tag) {

        $open_hide_count = preg_match_all('/\[' . $tag . '(.*)]/iU', $body, $matches);
        $close_hide_count = preg_match_all('/\[\/' . $tag . ']/iU', $body, $matches);

        $count = 0;
        if (!empty($open_hide_count) && (int)$close_hide_count < $open_hide_count) {
            while ($count < ($open_hide_count - (int)$close_hide_count)) {
                $count++;
                $body .= '[/' . $tag . ']';
            }
        }
    }

    return $body;
}
