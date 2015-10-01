<?php
/**
 * A Markdown parser for MediaWiki.
 */
class ParserMarkdown implements ParserInterface {
	public function getMessageParser() {
		return new Parser();
	}

	public function preSaveTransform( $text, Title $title, User $user,
		ParserOptions $options, $clearState = true ) {
			return $text;
	}
	/**
	 * @param array $conf
	 */
	public function __construct( $conf = array() ) {}

	/**
	 * Expand templates and variables in the provided text
	 *
	 * @param string $text The text to preprocess
	 * @param ParserOptions $options Options
	 * @param Title|null $title Title object or null to use $wgTitle
	 * @return string
	 */
	public function transformMsg( $text, $options, $title = null ) {
		$p = new Parser();
		return $p->transformMsg( $text, $options, $title );
	}
	/**
	 * Do various kinds of initialisation on the first call of the parser
	 */
	public function firstCallInit() {}

	/**
	 * Convert user input to HTML
	 * Do not call this function recursively.
	 *
	 * @param string $text Text we want to parse
	 * @param Title $title
	 * @param ParserOptions $options
	 * @param bool $linestart
	 * @param bool $clearState
	 * @param int $revid Number to pass in {{REVISIONID}}
	 * @return ParserOutputInterface A ParserOutput
	 */
	public function parse( $text, Title $title, ParserOptions $options, $lineStart = true, $clearState = true, $revId = null ) {
		$Parsedown = new Parsedown();
		$text = $Parsedown->text( $text );
		return new ParserOutput( $text );
	}

	/**
	 * Get the ParserOutput object
	 *
	 * @return ParserOutputInterface
	 */
	public function getOutput() {
		return new ParserOutput;
	}

	public function getFreshParser() {
		return new ParserMarkdown;
	}
}
