<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'AlternateParsers' );
}

// credits
$wgExtensionCredits['parserhook']['AlternateParsers'] = array(
	'path' => __FILE__,
	'name' => 'MarkdownParser',
	'url' => '//www.mediawiki.org/wiki/Extension:AlternateParsers',
);
require __DIR__ . '/vendor/autoload.php';
