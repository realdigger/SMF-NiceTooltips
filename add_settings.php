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

if (isset($smcFunc))
{
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
	array('NiceTooltips_scripturl', 'scripts'),
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
}
else
// SMF 1.x
{
  db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_lenght', '0') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_censored', '0') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_scripturl', '') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_FGCOLOR', '#F6F6F6') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_BGCOLOR', '#4F7394') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_TEXTCOLOR', '#000000') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_TEXTSIZE', '1') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_CAPCOLOR', '#FFFFFF') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_OPACITY', '90') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_DELAY', '0') ", __FILE__, __LINE__);
	db_query("INSERT IGNORE INTO {$db_prefix}settings (`variable`, `value`) VALUES ('NiceTooltips_mobile', '0') ", __FILE__, __LINE__);
}

?>
