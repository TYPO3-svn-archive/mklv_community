<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by TxMklvcommunityBuddyPeer::getOMClass()
include_once 'mklv_community/TxMklvcommunityBuddy.php';

/**
 * Base static class for performing query and update operations on the 'tx_mklvcommunity_buddy' table.
 *
 * 
 *
 * This class was autogenerated by Propel on:
 *
 * Sun Dec  2 12:29:20 2007
 *
 * @package    mklv_community.om
 */
abstract class BaseTxMklvcommunityBuddyPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'subida';

	/** the table name for this class */
	const TABLE_NAME = 'tx_mklvcommunity_buddy';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'mklv_community.TxMklvcommunityBuddy';

	/** The total number of columns. */
	const NUM_COLUMNS = 9;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;


	/** the column name for the UID field */
	const UID = 'tx_mklvcommunity_buddy.UID';

	/** the column name for the PID field */
	const PID = 'tx_mklvcommunity_buddy.PID';

	/** the column name for the TSTAMP field */
	const TSTAMP = 'tx_mklvcommunity_buddy.TSTAMP';

	/** the column name for the CRDATE field */
	const CRDATE = 'tx_mklvcommunity_buddy.CRDATE';

	/** the column name for the CRUSER_ID field */
	const CRUSER_ID = 'tx_mklvcommunity_buddy.CRUSER_ID';

	/** the column name for the DELETED field */
	const DELETED = 'tx_mklvcommunity_buddy.DELETED';

	/** the column name for the HIDDEN field */
	const HIDDEN = 'tx_mklvcommunity_buddy.HIDDEN';

	/** the column name for the USER_UID field */
	const USER_UID = 'tx_mklvcommunity_buddy.USER_UID';

	/** the column name for the BUDDY_UID field */
	const BUDDY_UID = 'tx_mklvcommunity_buddy.BUDDY_UID';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Uid', 'Pid', 'Tstamp', 'Crdate', 'CruserId', 'Deleted', 'Hidden', 'UserUid', 'BuddyUid', ),
		BasePeer::TYPE_COLNAME => array (TxMklvcommunityBuddyPeer::UID, TxMklvcommunityBuddyPeer::PID, TxMklvcommunityBuddyPeer::TSTAMP, TxMklvcommunityBuddyPeer::CRDATE, TxMklvcommunityBuddyPeer::CRUSER_ID, TxMklvcommunityBuddyPeer::DELETED, TxMklvcommunityBuddyPeer::HIDDEN, TxMklvcommunityBuddyPeer::USER_UID, TxMklvcommunityBuddyPeer::BUDDY_UID, ),
		BasePeer::TYPE_FIELDNAME => array ('uid', 'pid', 'tstamp', 'crdate', 'cruser_id', 'deleted', 'hidden', 'user_uid', 'buddy_uid', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Uid' => 0, 'Pid' => 1, 'Tstamp' => 2, 'Crdate' => 3, 'CruserId' => 4, 'Deleted' => 5, 'Hidden' => 6, 'UserUid' => 7, 'BuddyUid' => 8, ),
		BasePeer::TYPE_COLNAME => array (TxMklvcommunityBuddyPeer::UID => 0, TxMklvcommunityBuddyPeer::PID => 1, TxMklvcommunityBuddyPeer::TSTAMP => 2, TxMklvcommunityBuddyPeer::CRDATE => 3, TxMklvcommunityBuddyPeer::CRUSER_ID => 4, TxMklvcommunityBuddyPeer::DELETED => 5, TxMklvcommunityBuddyPeer::HIDDEN => 6, TxMklvcommunityBuddyPeer::USER_UID => 7, TxMklvcommunityBuddyPeer::BUDDY_UID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('uid' => 0, 'pid' => 1, 'tstamp' => 2, 'crdate' => 3, 'cruser_id' => 4, 'deleted' => 5, 'hidden' => 6, 'user_uid' => 7, 'buddy_uid' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	/**
	 * @return     MapBuilder the map builder for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'mklv_community/map/TxMklvcommunityBuddyMapBuilder.php';
		return BasePeer::getMapBuilder('mklv_community.map.TxMklvcommunityBuddyMapBuilder');
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
			$map = TxMklvcommunityBuddyPeer::getTableMap();
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
	 * @param      string $column The column name for current table. (i.e. TxMklvcommunityBuddyPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(TxMklvcommunityBuddyPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::UID);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::PID);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::TSTAMP);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::CRDATE);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::CRUSER_ID);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::DELETED);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::HIDDEN);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::USER_UID);

		$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::BUDDY_UID);

	}

	const COUNT = 'COUNT(tx_mklvcommunity_buddy.UID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tx_mklvcommunity_buddy.UID)';

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
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
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
	 * @return     TxMklvcommunityBuddy
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = TxMklvcommunityBuddyPeer::doSelect($critcopy, $con);
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
		return TxMklvcommunityBuddyPeer::populateObjects(TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con));
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
			TxMklvcommunityBuddyPeer::addSelectColumns($criteria);
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
		$cls = TxMklvcommunityBuddyPeer::getOMClass();
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
	 * Returns the number of rows matching criteria, joining the related FeUsersRelatedByUserUid table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinFeUsersRelatedByUserUid(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TxMklvcommunityBuddyPeer::USER_UID, FeUsersPeer::UID);

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related FeUsersRelatedByBuddyUid table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinFeUsersRelatedByBuddyUid(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TxMklvcommunityBuddyPeer::BUDDY_UID, FeUsersPeer::UID);

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of TxMklvcommunityBuddy objects pre-filled with their FeUsers objects.
	 *
	 * @return     array Array of TxMklvcommunityBuddy objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinFeUsersRelatedByUserUid(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TxMklvcommunityBuddyPeer::addSelectColumns($c);
		$startcol = (TxMklvcommunityBuddyPeer::NUM_COLUMNS - TxMklvcommunityBuddyPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FeUsersPeer::addSelectColumns($c);

		$c->addJoin(TxMklvcommunityBuddyPeer::USER_UID, FeUsersPeer::UID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TxMklvcommunityBuddyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FeUsersPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFeUsersRelatedByUserUid(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addTxMklvcommunityBuddyRelatedByUserUid($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initTxMklvcommunityBuddysRelatedByUserUid();
				$obj2->addTxMklvcommunityBuddyRelatedByUserUid($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of TxMklvcommunityBuddy objects pre-filled with their FeUsers objects.
	 *
	 * @return     array Array of TxMklvcommunityBuddy objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinFeUsersRelatedByBuddyUid(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TxMklvcommunityBuddyPeer::addSelectColumns($c);
		$startcol = (TxMklvcommunityBuddyPeer::NUM_COLUMNS - TxMklvcommunityBuddyPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FeUsersPeer::addSelectColumns($c);

		$c->addJoin(TxMklvcommunityBuddyPeer::BUDDY_UID, FeUsersPeer::UID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TxMklvcommunityBuddyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FeUsersPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFeUsersRelatedByBuddyUid(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addTxMklvcommunityBuddyRelatedByBuddyUid($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initTxMklvcommunityBuddysRelatedByBuddyUid();
				$obj2->addTxMklvcommunityBuddyRelatedByBuddyUid($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TxMklvcommunityBuddyPeer::USER_UID, FeUsersPeer::UID);

		$criteria->addJoin(TxMklvcommunityBuddyPeer::BUDDY_UID, FeUsersPeer::UID);

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of TxMklvcommunityBuddy objects pre-filled with all related objects.
	 *
	 * @return     array Array of TxMklvcommunityBuddy objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TxMklvcommunityBuddyPeer::addSelectColumns($c);
		$startcol2 = (TxMklvcommunityBuddyPeer::NUM_COLUMNS - TxMklvcommunityBuddyPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FeUsersPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FeUsersPeer::NUM_COLUMNS;

		FeUsersPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FeUsersPeer::NUM_COLUMNS;

		$c->addJoin(TxMklvcommunityBuddyPeer::USER_UID, FeUsersPeer::UID);

		$c->addJoin(TxMklvcommunityBuddyPeer::BUDDY_UID, FeUsersPeer::UID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TxMklvcommunityBuddyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


				// Add objects for joined FeUsers rows
	
			$omClass = FeUsersPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFeUsersRelatedByUserUid(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTxMklvcommunityBuddyRelatedByUserUid($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj2->initTxMklvcommunityBuddysRelatedByUserUid();
				$obj2->addTxMklvcommunityBuddyRelatedByUserUid($obj1);
			}


				// Add objects for joined FeUsers rows
	
			$omClass = FeUsersPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFeUsersRelatedByBuddyUid(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTxMklvcommunityBuddyRelatedByBuddyUid($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj3->initTxMklvcommunityBuddysRelatedByBuddyUid();
				$obj3->addTxMklvcommunityBuddyRelatedByBuddyUid($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related FeUsersRelatedByUserUid table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptFeUsersRelatedByUserUid(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related FeUsersRelatedByBuddyUid table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptFeUsersRelatedByBuddyUid(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TxMklvcommunityBuddyPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TxMklvcommunityBuddyPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of TxMklvcommunityBuddy objects pre-filled with all related objects except FeUsersRelatedByUserUid.
	 *
	 * @return     array Array of TxMklvcommunityBuddy objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptFeUsersRelatedByUserUid(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TxMklvcommunityBuddyPeer::addSelectColumns($c);
		$startcol2 = (TxMklvcommunityBuddyPeer::NUM_COLUMNS - TxMklvcommunityBuddyPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TxMklvcommunityBuddyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of TxMklvcommunityBuddy objects pre-filled with all related objects except FeUsersRelatedByBuddyUid.
	 *
	 * @return     array Array of TxMklvcommunityBuddy objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptFeUsersRelatedByBuddyUid(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TxMklvcommunityBuddyPeer::addSelectColumns($c);
		$startcol2 = (TxMklvcommunityBuddyPeer::NUM_COLUMNS - TxMklvcommunityBuddyPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TxMklvcommunityBuddyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
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
		return TxMklvcommunityBuddyPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a TxMklvcommunityBuddy or Criteria object.
	 *
	 * @param      mixed $values Criteria or TxMklvcommunityBuddy object containing data that is used to create the INSERT statement.
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
			$criteria = $values->buildCriteria(); // build Criteria from TxMklvcommunityBuddy object
		}

		$criteria->remove(TxMklvcommunityBuddyPeer::UID); // remove pkey col since this table uses auto-increment


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
	 * Method perform an UPDATE on the database, given a TxMklvcommunityBuddy or Criteria object.
	 *
	 * @param      mixed $values Criteria or TxMklvcommunityBuddy object containing data that is used to create the UPDATE statement.
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

			$comparison = $criteria->getComparison(TxMklvcommunityBuddyPeer::UID);
			$selectCriteria->add(TxMklvcommunityBuddyPeer::UID, $criteria->remove(TxMklvcommunityBuddyPeer::UID), $comparison);

		} else { // $values is TxMklvcommunityBuddy object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the tx_mklvcommunity_buddy table.
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
			$affectedRows += BasePeer::doDeleteAll(TxMklvcommunityBuddyPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a TxMklvcommunityBuddy or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or TxMklvcommunityBuddy object or primary key or array of primary keys
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
			$con = Propel::getConnection(TxMklvcommunityBuddyPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof TxMklvcommunityBuddy) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TxMklvcommunityBuddyPeer::UID, (array) $values, Criteria::IN);
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
	 * Validates all modified columns of given TxMklvcommunityBuddy object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      TxMklvcommunityBuddy $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(TxMklvcommunityBuddy $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TxMklvcommunityBuddyPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TxMklvcommunityBuddyPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TxMklvcommunityBuddyPeer::DATABASE_NAME, TxMklvcommunityBuddyPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      mixed $pk the primary key.
	 * @param      Connection $con the connection to use
	 * @return     TxMklvcommunityBuddy
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TxMklvcommunityBuddyPeer::DATABASE_NAME);

		$criteria->add(TxMklvcommunityBuddyPeer::UID, $pk);


		$v = TxMklvcommunityBuddyPeer::doSelect($criteria, $con);

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
			$criteria->add(TxMklvcommunityBuddyPeer::UID, $pks, Criteria::IN);
			$objs = TxMklvcommunityBuddyPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseTxMklvcommunityBuddyPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseTxMklvcommunityBuddyPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'mklv_community/map/TxMklvcommunityBuddyMapBuilder.php';
	Propel::registerMapBuilder('mklv_community.map.TxMklvcommunityBuddyMapBuilder');
}
