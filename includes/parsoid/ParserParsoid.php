<?php
/**
 * A parser that does nothing except output what you give it.
 */
class ParserParsoid implements ParserInterface {
	public function getMessageParser() {
		return $this;
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
		return $text;
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
		$url = 'https://en.wikipedia.org/api/rest_v1/transform/wikitext/to/html/' .
			urlencode( $title->getPrefixedText() );
		$data = array(
			'wikitext' => $text,
			'body_only' => true,
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);
		$context  = stream_context_create( $options );
		$text = file_get_contents( $url, false, stream_context_create( $options ) );
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
		return $this;
	}
}
