<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by FeUsersPeer::getOMClass()
include_once 'mklv_community/FeUsers.php';

/**
 * Base static class for performing query and update operations on the 'fe_users' table.
 *
 * 
 *
 * This class was autogenerated by Propel on:
 *
 * Sun Dec  2 12:29:19 2007
 *
 * @package    mklv_community.om
 */
abstract class BaseFeUsersPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'subida';

	/** the table name for this class */
	const TABLE_NAME = 'fe_users';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'mklv_community.FeUsers';

	/** The total number of columns. */
	const NUM_COLUMNS = 33;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the UID field */
	const UID = 'fe_users.UID';

	/** the column name for the PID field */
	const PID = 'fe_users.PID';

	/** the column name for the TSTAMP field */
	const TSTAMP = 'fe_users.TSTAMP';

	/** the column name for the USERNAME field */
	const USERNAME = 'fe_users.USERNAME';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'fe_users.PASSWORD';

	/** the column name for the USERGROUP field */
	const USERGROUP = 'fe_users.USERGROUP';

	/** the column name for the DISABLE field */
	const DISABLE = 'fe_users.DISABLE';

	/** the column name for the STARTTIME field */
	const STARTTIME = 'fe_users.STARTTIME';

	/** the column name for the ENDTIME field */
	const ENDTIME = 'fe_users.ENDTIME';

	/** the column name for the NAME field */
	const NAME = 'fe_users.NAME';

	/** the column name for the ADDRESS field */
	const ADDRESS = 'fe_users.ADDRESS';

	/** the column name for the TELEPHONE field */
	const TELEPHONE = 'fe_users.TELEPHONE';

	/** the column name for the FAX field */
	const FAX = 'fe_users.FAX';

	/** the column name for the EMAIL field */
	const EMAIL = 'fe_users.EMAIL';

	/** the column name for the CRDATE field */
	const CRDATE = 'fe_users.CRDATE';

	/** the column name for the CRUSER_ID field */
	const CRUSER_ID = 'fe_users.CRUSER_ID';

	/** the column name for the LOCKTODOMAIN field */
	const LOCKTODOMAIN = 'fe_users.LOCKTODOMAIN';

	/** the column name for the DELETED field */
	const DELETED = 'fe_users.DELETED';

	/** the column name for the UC field */
	const UC = 'fe_users.UC';

	/** the column name for the TITLE field */
	const TITLE = 'fe_users.TITLE';

	/** the column name for the ZIP field */
	const ZIP = 'fe_users.ZIP';

	/** the column name for the CITY field */
	const CITY = 'fe_users.CITY';

	/** the column name for the COUNTRY field */
	const COUNTRY = 'fe_users.COUNTRY';

	/** the column name for the WWW field */
	const WWW = 'fe_users.WWW';

	/** the column name for the COMPANY field */
	const COMPANY = 'fe_users.COMPANY';

	/** the column name for the IMAGE field */
	const IMAGE = 'fe_users.IMAGE';

	/** the column name for the TSCONFIG field */
	const TSCONFIG = 'fe_users.TSCONFIG';

	/** the column name for the FE_CRUSER_ID field */
	const FE_CRUSER_ID = 'fe_users.FE_CRUSER_ID';

	/** the column name for the LASTLOGIN field */
	const LASTLOGIN = 'fe_users.LASTLOGIN';

	/** the column name for the IS_ONLINE field */
	const IS_ONLINE = 'fe_users.IS_ONLINE';

	/** the column name for the TX_MKLVCOMMUNITY_ICQ field */
	const TX_MKLVCOMMUNITY_ICQ = 'fe_users.TX_MKLVCOMMUNITY_ICQ';

	/** the column name for the TX_MKLVCOMMUNITY_PRIVACY_FLAG field */
	const TX_MKLVCOMMUNITY_PRIVACY_FLAG = 'fe_users.TX_MKLVCOMMUNITY_PRIVACY_FLAG';

	/** the column name for the TX_MKLVCOMMUNITY_BUDDY_CONFIRM field */
	const TX_MKLVCOMMUNITY_BUDDY_CONFIRM = 'fe_users.TX_MKLVCOMMUNITY_BUDDY_CONFIRM';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Uid', 'Pid', 'Tstamp', 'Username', 'Password', 'Usergroup', 'Disable', 'Starttime', 'Endtime', 'Name', 'Address', 'Telephone', 'Fax', 'Email', 'Crdate', 'CruserId', 'Locktodomain', 'Deleted', 'Uc', 'Title', 'Zip', 'City', 'Country', 'Www', 'Company', 'Image', 'Tsconfig', 'FeCruserId', 'Lastlogin', 'IsOnline', 'TxMklvcommunityIcq', 'TxMklvcommunityPrivacyFlag', 'TxMklvcommunityBuddyConfirm', ),
		BasePeer::TYPE_COLNAME => array (FeUsersPeer::UID, FeUsersPeer::PID, FeUsersPeer::TSTAMP, FeUsersPeer::USERNAME, FeUsersPeer::PASSWORD, FeUsersPeer::USERGROUP, FeUsersPeer::DISABLE, FeUsersPeer::STARTTIME, FeUsersPeer::ENDTIME, FeUsersPeer::NAME, FeUsersPeer::ADDRESS, FeUsersPeer::TELEPHONE, FeUsersPeer::FAX, FeUsersPeer::EMAIL, FeUsersPeer::CRDATE, FeUsersPeer::CRUSER_ID, FeUsersPeer::LOCKTODOMAIN, FeUsersPeer::DELETED, FeUsersPeer::UC, FeUsersPeer::TITLE, FeUsersPeer::ZIP, FeUsersPeer::CITY, FeUsersPeer::COUNTRY, FeUsersPeer::WWW, FeUsersPeer::COMPANY, FeUsersPeer::IMAGE, FeUsersPeer::TSCONFIG, FeUsersPeer::FE_CRUSER_ID, FeUsersPeer::LASTLOGIN, FeUsersPeer::IS_ONLINE, FeUsersPeer::TX_MKLVCOMMUNITY_ICQ, FeUsersPeer::TX_MKLVCOMMUNITY_PRIVACY_FLAG, FeUsersPeer::TX_MKLVCOMMUNITY_BUDDY_CONFIRM, ),
		BasePeer::TYPE_FIELDNAME => array ('uid', 'pid', 'tstamp', 'username', 'password', 'usergroup', 'disable', 'starttime', 'endtime', 'name', 'address', 'telephone', 'fax', 'email', 'crdate', 'cruser_id', 'lockToDomain', 'deleted', 'uc', 'title', 'zip', 'city', 'country', 'www', 'company', 'image', 'TSconfig', 'fe_cruser_id', 'lastlogin', 'is_online', 'tx_mklvcommunity_icq', 'tx_mklvcommunity_privacy_flag', 'tx_mklvcommunity_buddy_confirm', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Uid' => 0, 'Pid' => 1, 'Tstamp' => 2, 'Username' => 3, 'Password' => 4, 'Usergroup' => 5, 'Disable' => 6, 'Starttime' => 7, 'Endtime' => 8, 'Name' => 9, 'Address' => 10, 'Telephone' => 11, 'Fax' => 12, 'Email' => 13, 'Crdate' => 14, 'CruserId' => 15, 'Locktodomain' => 16, 'Deleted' => 17, 'Uc' => 18, 'Title' => 19, 'Zip' => 20, 'City' => 21, 'Country' => 22, 'Www' => 23, 'Company' => 24, 'Image' => 25, 'Tsconfig' => 26, 'FeCruserId' => 27, 'Lastlogin' => 28, 'IsOnline' => 29, 'TxMklvcommunityIcq' => 30, 'TxMklvcommunityPrivacyFlag' => 31, 'TxMklvcommunityBuddyConfirm' => 32, ),
		BasePeer::TYPE_COLNAME => array (FeUsersPeer::UID => 0, FeUsersPeer::PID => 1, FeUsersPeer::TSTAMP => 2, FeUsersPeer::USERNAME => 3, FeUsersPeer::PASSWORD => 4, FeUsersPeer::USERGROUP => 5, FeUsersPeer::DISABLE => 6, FeUsersPeer::STARTTIME => 7, FeUsersPeer::ENDTIME => 8, FeUsersPeer::NAME => 9, FeUsersPeer::ADDRESS => 10, FeUsersPeer::TELEPHONE => 11, FeUsersPeer::FAX => 12, FeUsersPeer::EMAIL => 13, FeUsersPeer::CRDATE => 14, FeUsersPeer::CRUSER_ID => 15, FeUsersPeer::LOCKTODOMAIN => 16, FeUsersPeer::DELETED => 17, FeUsersPeer::UC => 18, FeUsersPeer::TITLE => 19, FeUsersPeer::ZIP => 20, FeUsersPeer::CITY => 21, FeUsersPeer::COUNTRY => 22, FeUsersPeer::WWW => 23, FeUsersPeer::COMPANY => 24, FeUsersPeer::IMAGE => 25, FeUsersPeer::TSCONFIG => 26, FeUsersPeer::FE_CRUSER_ID => 27, FeUsersPeer::LASTLOGIN => 28, FeUsersPeer::IS_ONLINE => 29, FeUsersPeer::TX_MKLVCOMMUNITY_ICQ => 30, FeUsersPeer::TX_MKLVCOMMUNITY_PRIVACY_FLAG => 31, FeUsersPeer::TX_MKLVCOMMUNITY_BUDDY_CONFIRM => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('uid' => 0, 'pid' => 1, 'tstamp' => 2, 'username' => 3, 'password' => 4, 'usergroup' => 5, 'disable' => 6, 'starttime' => 7, 'endtime' => 8, 'name' => 9, 'address' => 10, 'telephone' => 11, 'fax' => 12, 'email' => 13, 'crdate' => 14, 'cruser_id' => 15, 'lockToDomain' => 16, 'deleted' => 17, 'uc' => 18, 'title' => 19, 'zip' => 20, 'city' => 21, 'country' => 22, 'www' => 23, 'company' => 24, 'image' => 25, 'TSconfig' => 26, 'fe_cruser_id' => 27, 'lastlogin' => 28, 'is_online' => 29, 'tx_mklvcommunity_icq' => 30, 'tx_mklvcommunity_privacy_flag' => 31, 'tx_mklvcommunity_buddy_confirm' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	/**
	 * @return     MapBuilder the map builder for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'mklv_community/map/FeUsersMapBuilder.php';
		return BasePeer::getMapBuilder('mklv_community.map.FeUsersMapBuilder');
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
			$map = FeUsersPeer::getTableMap();
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
	 * @param      string $column The column name for current table. (i.e. FeUsersPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(FeUsersPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(FeUsersPeer::UID);

		$criteria->addSelectColumn(FeUsersPeer::PID);

		$criteria->addSelectColumn(FeUsersPeer::TSTAMP);

		$criteria->addSelectColumn(FeUsersPeer::USERNAME);

		$criteria->addSelectColumn(FeUsersPeer::PASSWORD);

		$criteria->addSelectColumn(FeUsersPeer::USERGROUP);

		$criteria->addSelectColumn(FeUsersPeer::DISABLE);

		$criteria->addSelectColumn(FeUsersPeer::STARTTIME);

		$criteria->addSelectColumn(FeUsersPeer::ENDTIME);

		$criteria->addSelectColumn(FeUsersPeer::NAME);

		$criteria->addSelectColumn(FeUsersPeer::ADDRESS);

		$criteria->addSelectColumn(FeUsersPeer::TELEPHONE);

		$criteria->addSelectColumn(FeUsersPeer::FAX);

		$criteria->addSelectColumn(FeUsersPeer::EMAIL);

		$criteria->addSelectColumn(FeUsersPeer::CRDATE);

		$criteria->addSelectColumn(FeUsersPeer::CRUSER_ID);

		$criteria->addSelectColumn(FeUsersPeer::LOCKTODOMAIN);

		$criteria->addSelectColumn(FeUsersPeer::DELETED);

		$criteria->addSelectColumn(FeUsersPeer::UC);

		$criteria->addSelectColumn(FeUsersPeer::TITLE);

		$criteria->addSelectColumn(FeUsersPeer::ZIP);

		$criteria->addSelectColumn(FeUsersPeer::CITY);

		$criteria->addSelectColumn(FeUsersPeer::COUNTRY);

		$criteria->addSelectColumn(FeUsersPeer::WWW);

		$criteria->addSelectColumn(FeUsersPeer::COMPANY);

		$criteria->addSelectColumn(FeUsersPeer::IMAGE);

		$criteria->addSelectColumn(FeUsersPeer::TSCONFIG);

		$criteria->addSelectColumn(FeUsersPeer::FE_CRUSER_ID);

		$criteria->addSelectColumn(FeUsersPeer::LASTLOGIN);

		$criteria->addSelectColumn(FeUsersPeer::IS_ONLINE);

		$criteria->addSelectColumn(FeUsersPeer::TX_MKLVCOMMUNITY_ICQ);

		$criteria->addSelectColumn(FeUsersPeer::TX_MKLVCOMMUNITY_PRIVACY_FLAG);

		$criteria->addSelectColumn(FeUsersPeer::TX_MKLVCOMMUNITY_BUDDY_CONFIRM);

	}

	const COUNT = 'COUNT(fe_users.UID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fe_users.UID)';

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
			$criteria->addSelectColumn(FeUsersPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FeUsersPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FeUsersPeer::doSelectRS($criteria, $con);
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
	 * @return     FeUsers
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FeUsersPeer::doSelect($critcopy, $con);
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
		return FeUsersPeer::populateObjects(FeUsersPeer::doSelectRS($criteria, $con));
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
			FeUsersPeer::addSelectColumns($criteria);
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
		$cls = FeUsersPeer::getOMClass();
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
		return FeUsersPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a FeUsers or Criteria object.
	 *
	 * @param      mixed $values Criteria or FeUsers object containing data that is used to create the INSERT statement.
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
			$criteria = $values->buildCriteria(); // build Criteria from FeUsers object
		}

		$criteria->remove(FeUsersPeer::UID); // remove pkey col since this table uses auto-increment


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
	 * Method perform an UPDATE on the database, given a FeUsers or Criteria object.
	 *
	 * @param      mixed $values Criteria or FeUsers object containing data that is used to create the UPDATE statement.
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

			$comparison = $criteria->getComparison(FeUsersPeer::UID);
			$selectCriteria->add(FeUsersPeer::UID, $criteria->remove(FeUsersPeer::UID), $comparison);

		} else { // $values is FeUsers object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the fe_users table.
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
			$affectedRows += BasePeer::doDeleteAll(FeUsersPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a FeUsers or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or FeUsers object or primary key or array of primary keys
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
			$con = Propel::getConnection(FeUsersPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof FeUsers) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FeUsersPeer::UID, (array) $values, Criteria::IN);
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
	 * Validates all modified columns of given FeUsers object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      FeUsers $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(FeUsers $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FeUsersPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FeUsersPeer::TABLE_NAME);

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

		return BasePeer::doValidate(FeUsersPeer::DATABASE_NAME, FeUsersPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      mixed $pk the primary key.
	 * @param      Connection $con the connection to use
	 * @return     FeUsers
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FeUsersPeer::DATABASE_NAME);

		$criteria->add(FeUsersPeer::UID, $pk);


		$v = FeUsersPeer::doSelect($criteria, $con);

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
			$criteria->add(FeUsersPeer::UID, $pks, Criteria::IN);
			$objs = FeUsersPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseFeUsersPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseFeUsersPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'mklv_community/map/FeUsersMapBuilder.php';
	Propel::registerMapBuilder('mklv_community.map.FeUsersMapBuilder');
}
