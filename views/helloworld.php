<?php

namespace tikiaddon\tikiorg\helloworld;

function helloworld_info()
{
	return array(
		'name' => tra('Print Hello World'),
		'description' => tra('Display output of a Tiki Addon View'),
		'filter' => 'text',
		'params' => array(
			'color' => array(
				'required' => false,
				'name' => tra('Color of introductory text'),
				'description' => tra('The color to display the introductory text in'),
				'extraparams' => false,
				'filter' => 'text',
			),
		),
	);
}

function helloworld($data, $params)
{
	// extracts parameters passed from wikiplugin_addon.php
	// Note that $data is the data passed as well
	extract($params, EXTR_SKIP);

	$helloworld = \TikiAddons::get('tikiorg_helloworld');

	$foo = $helloworld->lib('foo');

	if (!empty($color)) {
		$helloworld->smarty->assign('color', $color);
	}

	// Warning: the following lines use the Tiki global smarty object,
	// which is *bad* practice as it can cause variables to be overwritten.
	// \TikiLib::lib('smarty')->assign('bar', $foo->hello());
	// $output = \TikiLib::lib('smarty')->fetch('tikiorg-helloworld.tpl');

	// The following is the safer way.
	// Also Remember to prefix your template name with vendor- unless you intend to
	// overwrite Tiki templates. Note that theme templates take priority over addon templates.
	$helloworld->smarty->assign('bar', $foo->hello());
	$output = $helloworld->smarty->fetch('tikiorg-helloworld.tpl');

	return $output;
}
