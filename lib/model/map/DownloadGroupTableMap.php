<?php



/**
 * This class defines the structure of the 'download_group' table.
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
class DownloadGroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DownloadGroupTableMap';

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
		$this->setName('download_group');
		$this->setPhpName('DownloadGroup');
		$this->setClassname('DownloadGroup');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('download_group_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 64, null);
		$this->addColumn('RATE_LIMIT', 'RateLimit', 'INTEGER', false, null, null);
		$this->addColumn('COUNT_LIMIT', 'CountLimit', 'INTEGER', false, null, null);
		$this->addColumn('BANDWIDTH_LIMIT', 'BandwidthLimit', 'INTEGER', false, null, null);
		$this->addColumn('CONCURRENT_LIMIT', 'ConcurrentLimit', 'INTEGER', false, null, null);
		$this->addColumn('CONCURRENT_LIMIT_PER_IP', 'ConcurrentLimitPerIp', 'INTEGER', false, null, null);
		$this->addColumn('VALID_FROM', 'ValidFrom', 'DATE', false, null, null);
		$this->addColumn('VALID_TO', 'ValidTo', 'DATE', false, null, null);
		$this->addColumn('IS_USE_LANDING', 'IsUseLanding', 'BOOLEAN', false, null, null);
		$this->addColumn('IS_USE_CAPTCHA', 'IsUseCaptcha', 'BOOLEAN', false, null, null);
		$this->addColumn('SYSTEM_GROUP_TYPE', 'SystemGroupType', 'INTEGER', false, null, null);
		$this->addColumn('RESET_FREQUENCY', 'ResetFrequency', 'INTEGER', false, null, null);
		$this->addColumn('RESET_OFFSET', 'ResetOffset', 'INTEGER', false, null, null);
		$this->addColumn('IS_ENABLED', 'IsEnabled', 'BOOLEAN', true, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('FileGroup', 'FileGroup', RelationMap::ONE_TO_MANY, array('id' => 'download_group_id', ), null, null);
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

} // DownloadGroupTableMap
