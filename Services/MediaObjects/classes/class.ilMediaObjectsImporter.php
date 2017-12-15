<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once("./Services/Export/classes/class.ilXmlImporter.php");

/**
 * Importer class for media pools
 *
 * @author Alex Killing <alex.killing@gmx.de>
 * @version $Id: $
 * @ingroup ModulesMediaPool
 */
class ilMediaObjectsImporter extends ilXmlImporter
{

	/**
	 * Init
	 *
	 * @param
	 * @return
	 */
	function init()
	{
		include_once("./Services/MediaObjects/classes/class.ilMediaObjectDataSet.php");
		$this->ds = new ilMediaObjectDataSet();
		$this->ds->setDSPrefix("ds");
		$this->ds->setImportDirectory($this->getImportDirectory());

		$this->config = $this->getImport()->getConfig("Services/MediaObjects");
		if ($this->config->getUsePreviousImportIds())
		{
			$this->ds->setUsePreviousImportIds(true);
		}
	}

	/**
	 * Import XML
	 *
	 * @param
	 * @return
	 */
	function importXmlRepresentation($a_entity, $a_id, $a_xml, $a_mapping)
	{
		include_once("./Services/DataSet/classes/class.ilDataSetImportParser.php");

		// patch start 'mhd_helwani'

        $this->ds->setCopyRightOption($this->getCopyRightOption());

        // patch end 'mhd_helwani'

		$parser = new ilDataSetImportParser($a_entity, $this->getSchemaVersion(),
			$a_xml, $this->ds, $a_mapping);
	}
	
}

?>