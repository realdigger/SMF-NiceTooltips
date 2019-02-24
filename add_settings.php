<?php
/**
 * @package SMF NiceTooltips Mod
 * @file settings.php
 * @author digger <digger@mysmf.net> <http://mysmf.net>
 * @link https://mysmf.net
 * @copyright Copyright (c) 2008-2018, digger
 * @license The MIT License (MIT) https://opensource.org/licenses/MIT
 * @version 1.8
 *
 *
 * To run this install manually please make sure you place this
 * in the same place and SSI.php and index.php
 */

global $user_info;

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
    require_once(dirname(__FILE__) . '/SSI.php');
} elseif (!defined('SMF')) {
    die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');
}

if ((SMF == 'SSI') && !$user_info['is_admin']) {
    die('Admin privileges required.');
}

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_lenght', '0'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_censored', '0'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_FGCOLOR', '#F6F6F6'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_BGCOLOR', '#4F7394'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_TEXTCOLOR', '#000000'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_TEXTSIZE', '1'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_CAPCOLOR', '#FFFFFF'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_OPACITY', '90'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_DELAY', '0'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_mobile', '0'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_board_type', 'first'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_recent_type', 'first'),
    array('variable'));

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string-255', 'value' => 'string-65534'),
    array('NiceTooltips_IMG_WIDTH', '200'),
    array('variable'));

if (SMF == 'SSI') {
    echo 'Database changes are complete! <a href="/">Return to the main page</a>.';
}
