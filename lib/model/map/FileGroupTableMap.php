<?php



/**
 * This class defines the structure of the 'file_group' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class FileGroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.FileGroupTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('file_group');
		$this->setPhpName('FileGroup');
		$this->setClassname('FileGroup');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('DOWNLOAD_FILE_ID', 'DownloadFileId', 'INTEGER' , 'download_file', 'ID', true, null, null);
		$this->addForeignPrimaryKey('DOWNLOAD_GROUP_ID', 'DownloadGroupId', 'INTEGER' , 'download_group', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('DownloadFile', 'DownloadFile', RelationMap::MANY_TO_ONE, array('download_file_id' => 'id', ), null, null);
    $this->addRelation('DownloadGroup', 'DownloadGroup', RelationMap::MANY_TO_ONE, array('download_group_id' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // FileGroupTableMap
