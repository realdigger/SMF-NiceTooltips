<?php
/**
 * @package SMF NiceTooltips Mod
 * @author digger
 * @copyright 2009-2016
 * @license Artistic License 1.0
 * @version 1.10
 *
 * To run this install manually please make sure you place this
 * in the same place and SSI.php and index.php
 */

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
?>