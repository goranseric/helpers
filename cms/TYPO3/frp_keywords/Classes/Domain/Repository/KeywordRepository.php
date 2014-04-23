<?php
namespace TYPO3\FrpKeywords\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Mark Howells-Mead <m.howells-mead@frappant.ch>, !frappant Webfactory
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package frp_keywords
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class KeywordRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @var \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected $databaseHandle;

	/**
	 * @var string
	 */
	protected $tableName = 'tx_frpkeywords_domain_model_keyword';

	/**
	 * @return \TYPO3\CMS\Media\Domain\Repository\VariantRepository
	 */
	public function __construct() {
		$this->databaseHandle = $GLOBALS['TYPO3_DB'];
	}

	/**
	 * Return an array of keywords
	 *
	 * @return array
	 */
	/*public function findAll() {
		$records = $this->databaseHandle->exec_SELECTgetRows('*', $this->tableName, '');
		return $records;
	}*/

}
?>