<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by FeGroupsPeer::getOMClass()
include_once 'mklv_community/FeGroups.php';

/**
 * Base static class for performing query and update operations on the 'fe_groups' table.
 *
 * 
 *
 * This class was autogenerated by Propel on:
 *
 * Sun Dec  2 12:29:19 2007
 *
 * @package    mklv_community.om
 */
abstract class BaseFeGroupsPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'subida';

	/** the table name for this class */
	const TABLE_NAME = 'fe_groups';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'mklv_community.FeGroups';

	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the UID field */
	const UID = 'fe_groups.UID';

	/** the column name for the PID field */
	const PID = 'fe_groups.PID';

	/** the column name for the TSTAMP field */
	const TSTAMP = 'fe_groups.TSTAMP';

	/** the column name for the TITLE field */
	const TITLE = 'fe_groups.TITLE';

	/** the column name for the HIDDEN field */
	const HIDDEN = 'fe_groups.HIDDEN';

	/** the column name for the LOCKTODOMAIN field */
	const LOCKTODOMAIN = 'fe_groups.LOCKTODOMAIN';

	/** the column name for the DELETED field */
	const DELETED = 'fe_groups.DELETED';

	/** the column name for the DESCRIPTION field */
	const DESCRIPTION = 'fe_groups.DESCRIPTION';

	/** the column name for the SUBGROUP field */
	const SUBGROUP = 'fe_groups.SUBGROUP';

	/** the column name for the TSCONFIG field */
	const TSCONFIG = 'fe_groups.TSCONFIG';

	/** the column name for the TX_MKLVCOMMUNITY_ICON field */
	const TX_MKLVCOMMUNITY_ICON = 'fe_groups.TX_MKLVCOMMUNITY_ICON';

	/** the column name for the TX_MKLVCOMMUNITY_VISIBILITY field */
	const TX_MKLVCOMMUNITY_VISIBILITY = 'fe_groups.TX_MKLVCOMMUNITY_VISIBILITY';

	/** the column name for the TX_MKLVCOMMUNITY_INVITATION field */
	const TX_MKLVCOMMUNITY_INVITATION = 'fe_groups.TX_MKLVCOMMUNITY_INVITATION';

	/** the column name for the TX_MKLVCOMMUNITY_URL field */
	const TX_MKLVCOMMUNITY_URL = 'fe_groups.TX_MKLVCOMMUNITY_URL';

	/** the column name for the TX_MKLVCOMMUNITY_OWNER field */
	const TX_MKLVCOMMUNITY_OWNER = 'fe_groups.TX_MKLVCOMMUNITY_OWNER';

	/** the column name for the TX_MKLVCOMMUNITY_ADMINS field */
	const TX_MKLVCOMMUNITY_ADMINS = 'fe_groups.TX_MKLVCOMMUNITY_ADMINS';

	/** the column name for the TX_MKLVCOMMUNITY_TAGS field */
	const TX_MKLVCOMMUNITY_TAGS = 'fe_groups.TX_MKLVCOMMUNITY_TAGS';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Uid', 'Pid', 'Tstamp', 'Title', 'Hidden', 'Locktodomain', 'Deleted', 'Description', 'Subgroup', 'Tsconfig', 'TxMklvcommunityIcon', 'TxMklvcommunityVisibility', 'TxMklvcommunityInvitation', 'TxMklvcommunityUrl', 'TxMklvcommunityOwner', 'TxMklvcommunityAdmins', 'TxMklvcommunityTags', ),
		BasePeer::TYPE_COLNAME => array (FeGroupsPeer::UID, FeGroupsPeer::PID, FeGroupsPeer::TSTAMP, FeGroupsPeer::TITLE, FeGroupsPeer::HIDDEN, FeGroupsPeer::LOCKTODOMAIN, FeGroupsPeer::DELETED, FeGroupsPeer::DESCRIPTION, FeGroupsPeer::SUBGROUP, FeGroupsPeer::TSCONFIG, FeGroupsPeer::TX_MKLVCOMMUNITY_ICON, FeGroupsPeer::TX_MKLVCOMMUNITY_VISIBILITY, FeGroupsPeer::TX_MKLVCOMMUNITY_INVITATION, FeGroupsPeer::TX_MKLVCOMMUNITY_URL, FeGroupsPeer::TX_MKLVCOMMUNITY_OWNER, FeGroupsPeer::TX_MKLVCOMMUNITY_ADMINS, FeGroupsPeer::TX_MKLVCOMMUNITY_TAGS, ),
		BasePeer::TYPE_FIELDNAME => array ('uid', 'pid', 'tstamp', 'title', 'hidden', 'lockToDomain', 'deleted', 'description', 'subgroup', 'TSconfig', 'tx_mklvcommunity_icon', 'tx_mklvcommunity_visibility', 'tx_mklvcommunity_invitation', 'tx_mklvcommunity_url', 'tx_mklvcommunity_owner', 'tx_mklvcommunity_admins', 'tx_mklvcommunity_tags', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Uid' => 0, 'Pid' => 1, 'Tstamp' => 2, 'Title' => 3, 'Hidden' => 4, 'Locktodomain' => 5, 'Deleted' => 6, 'Description' => 7, 'Subgroup' => 8, 'Tsconfig' => 9, 'TxMklvcommunityIcon' => 10, 'TxMklvcommunityVisibility' => 11, 'TxMklvcommunityInvitation' => 12, 'TxMklvcommunityUrl' => 13, 'TxMklvcommunityOwner' => 14, 'TxMklvcommunityAdmins' => 15, 'TxMklvcommunityTags' => 16, ),
		BasePeer::TYPE_COLNAME => array (FeGroupsPeer::UID => 0, FeGroupsPeer::PID => 1, FeGroupsPeer::TSTAMP => 2, FeGroupsPeer::TITLE => 3, FeGroupsPeer::HIDDEN => 4, FeGroupsPeer::LOCKTODOMAIN => 5, FeGroupsPeer::DELETED => 6, FeGroupsPeer::DESCRIPTION => 7, FeGroupsPeer::SUBGROUP => 8, FeGroupsPeer::TSCONFIG => 9, FeGroupsPeer::TX_MKLVCOMMUNITY_ICON => 10, FeGroupsPeer::TX_MKLVCOMMUNITY_VISIBILITY => 11, FeGroupsPeer::TX_MKLVCOMMUNITY_INVITATION => 12, FeGroupsPeer::TX_MKLVCOMMUNITY_URL => 13, FeGroupsPeer::TX_MKLVCOMMUNITY_OWNER => 14, FeGroupsPeer::TX_MKLVCOMMUNITY_ADMINS => 15, FeGroupsPeer::TX_MKLVCOMMUNITY_TAGS => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('uid' => 0, 'pid' => 1, 'tstamp' => 2, 'title' => 3, 'hidden' => 4, 'lockToDomain' => 5, 'deleted' => 6, 'description' => 7, 'subgroup' => 8, 'TSconfig' => 9, 'tx_mklvcommunity_icon' => 10, 'tx_mklvcommunity_visibility' => 11, 'tx_mklvcommunity_invitation' => 12, 'tx_mklvcommunity_url' => 13, 'tx_mklvcommunity_owner' => 14, 'tx_mklvcommunity_admins' => 15, 'tx_mklvcommunity_tags' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * @return     MapBuilder the map builder for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'mklv_community/map/FeGroupsMapBuilder.php';
		return BasePeer::getMapBuilder('mklv_community.map.FeGroupsMapBuilder');
	}
	/**
	 * Gets a map (hash) of PHP names to DB column names.
	 *
	 * @return     array The PHP to DB name map for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @deprecated Use the getFieldNames() and translateFieldName() methods instead of this.
	 */
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FeGroupsPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants TYPE_PHPNAME,
	 *                         TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants TYPE_PHPNAME,
	 *                      TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. FeGroupsPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(FeGroupsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FeGroupsPeer::UID);

		$criteria->addSelectColumn(FeGroupsPeer::PID);

		$criteria->addSelectColumn(FeGroupsPeer::TSTAMP);

		$criteria->addSelectColumn(FeGroupsPeer::TITLE);

		$criteria->addSelectColumn(FeGroupsPeer::HIDDEN);

		$criteria->addSelectColumn(FeGroupsPeer::LOCKTODOMAIN);

		$criteria->addSelectColumn(FeGroupsPeer::DELETED);

		$criteria->addSelectColumn(FeGroupsPeer::DESCRIPTION);

		$criteria->addSelectColumn(FeGroupsPeer::SUBGROUP);

		$criteria->addSelectColumn(FeGroupsPeer::TSCONFIG);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_ICON);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_VISIBILITY);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_INVITATION);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_URL);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_OWNER);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_ADMINS);

		$criteria->addSelectColumn(FeGroupsPeer::TX_MKLVCOMMUNITY_TAGS);

	}

	const COUNT = 'COUNT(fe_groups.UID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fe_groups.UID)';

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FeGroupsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FeGroupsPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FeGroupsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      Connection $con
	 * @return     FeGroups
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FeGroupsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      Connection $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FeGroupsPeer::populateObjects(FeGroupsPeer::doSelectRS($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect()
	 * method to get a ResultSet.
	 *
	 * Use this method directly if you want to just get the resultset
	 * (instead of an array of objects).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     ResultSet The resultset object with numerically-indexed fields.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FeGroupsPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a Creole ResultSet, set to return
		// rows indexed numerically.
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = FeGroupsPeer::getOMClass();
		$cls = Propel::import($cls);
		// populate the object(s)
		while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return FeGroupsPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a FeGroups or Criteria object.
	 *
	 * @param      mixed $values Criteria or FeGroups object containing data that is used to create the INSERT statement.
	 * @param      Connection $con the connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from FeGroups object
		}

		$criteria->remove(FeGroupsPeer::UID); // remove pkey col since this table uses auto-increment


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a FeGroups or Criteria object.
	 *
	 * @param      mixed $values Criteria or FeGroups object containing data that is used to create the UPDATE statement.
	 * @param      Connection $con The connection to use (specify Connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(FeGroupsPeer::UID);
			$selectCriteria->add(FeGroupsPeer::UID, $criteria->remove(FeGroupsPeer::UID), $comparison);

		} else { // $values is FeGroups object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the fe_groups table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(FeGroupsPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a FeGroups or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or FeGroups object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      Connection $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(FeGroupsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof FeGroups) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FeGroupsPeer::UID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given FeGroups object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      FeGroups $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(FeGroups $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FeGroupsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FeGroupsPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(FeGroupsPeer::DATABASE_NAME, FeGroupsPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      mixed $pk the primary key.
	 * @param      Connection $con the connection to use
	 * @return     FeGroups
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FeGroupsPeer::DATABASE_NAME);

		$criteria->add(FeGroupsPeer::UID, $pk);


		$v = FeGroupsPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(FeGroupsPeer::UID, $pks, Criteria::IN);
			$objs = FeGroupsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseFeGroupsPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseFeGroupsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'mklv_community/map/FeGroupsMapBuilder.php';
	Propel::registerMapBuilder('mklv_community.map.FeGroupsMapBuilder');
}
