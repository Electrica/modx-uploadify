<?php
/**
 * Add snippets to build
 *
 * */

$snippets = array();

$tmp = array(
	'Uploadify' => 'uploadify'
);

foreach ($tmp as $k => $v) {
	/* @avr modSnippet $snippet */
	$snippet = $modx->newObject('modSnippet');
	$snippet->fromArray(array(
		'name' => $k
		,'description' => ''
		,'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.'.$v.'.php')
		,'static' => BUILD_SNIPPET_STATIC
		,'source' => 1
		,'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/snippets/snippet.'.$v.'.php'
	),'',true,true);

	$properties = include $sources['build'].'properties/properties.'.$v.'.php';
	$snippet->setProperties($properties);

	$snippets[] = $snippet;
}

unset($properties);
return $snippets;