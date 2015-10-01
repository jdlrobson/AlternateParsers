Transform your MediaWiki by using a completely different parser. This extension allows you to swap out the
default MediaWiki markup language for either Markdown (different language), Parsoid (different implementation)
or no language (raw wikitext)

== Raw text ==
$wgParserConf['class'] = 'ParserRawText';

== Markdown ==
$wgParserConf['class'] = 'ParserMarkdown';

== Parsoid ==
$wgParserConf['class'] = 'ParserParsoid';

== Safe HTML ==
$wgParserConf['class'] = 'ParserPurifiedHTML';
