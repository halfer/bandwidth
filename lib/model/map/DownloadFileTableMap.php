<?php



/**
 * This class defines the structure of the 'download_file' table.
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
class DownloadFileTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DownloadFileTableMap';

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
		$this->setName('download_file');
		$this->setPhpName('DownloadFile');
		$this->setClassname('DownloadFile');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('download_file_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('FOLDER', 'Folder', 'VARCHAR', true, 100, '');
		$this->addColumn('PATH', 'Path', 'VARCHAR', true, 255, null);
		$this->addColumn('ORIGINAL_URI', 'OriginalUri', 'VARCHAR', false, 512, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('CHECKED_AT', 'CheckedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('SIZE', 'Size', 'INTEGER', false, null, null);
		$this->addColumn('IS_ENABLED', 'IsEnabled', 'BOOLEAN', true, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('FileGroup', 'FileGroup', RelationMap::ONE_TO_MANY, array('id' => 'download_file_id', ), null, null);
    $this->addRelation('DownloadLog', 'DownloadLog', RelationMap::ONE_TO_MANY, array('id' => 'download_file_id', ), null, null);
    $this->addRelation('UploadQueue', 'UploadQueue', RelationMap::ONE_TO_MANY, array('id' => 'file_id', ), null, null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // DownloadFileTableMap
