<?php
/**
 * BCGDraw.php
 *--------------------------------------------------------------------
 *
 * Base class to draw images
 *
 *--------------------------------------------------------------------
 * Revision History
 * v2.1.0	8  nov	2009	Jean-Sébastien Goupil
 *--------------------------------------------------------------------
 * $Id: BCGDraw.php,v 1.1.1.1 2011-05-12 20:31:32 diogo Exp $
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodephp.com
 */
abstract class BCGDraw {
	protected $im;
	protected $filename;

	/**
	 * Constructor
	 *
	 * @param resource $im
	 */
	protected function __construct($im) {
		$this->im = $im;
	}

	/**
	 * Sets the filename
	 *
	 * @param string $filename
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
	}

	/**
	 * Method needed to draw the image based on its specification (JPG, GIF, etc.)
	 */
	abstract public function draw();
}
?>