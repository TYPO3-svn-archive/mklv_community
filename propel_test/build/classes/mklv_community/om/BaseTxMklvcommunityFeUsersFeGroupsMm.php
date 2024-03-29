<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';

include_once 'creole/util/Clob.php';
include_once 'creole/util/Blob.php';


include_once 'propel/util/Criteria.php';

include_once 'mklv_community/TxMklvcommunityFeUsersFeGroupsMmPeer.php';

/**
 * Base class that represents a row from the 'tx_mklvcommunity_fe_users_fe_groups_MM' table.
 *
 * 
 *
 * This class was autogenerated by Propel on:
 *
 * Sun Dec  2 12:29:20 2007
 *
 * @package    mklv_community.om
 */
abstract class BaseTxMklvcommunityFeUsersFeGroupsMm extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TxMklvcommunityFeUsersFeGroupsMmPeer
	 */
	protected static $peer;


	/**
	 * The value for the uid field.
	 * @var        int
	 */
	protected $uid;


	/**
	 * The value for the pid field.
	 * @var        int
	 */
	protected $pid;


	/**
	 * The value for the tstamp field.
	 * @var        int
	 */
	protected $tstamp;


	/**
	 * The value for the crdate field.
	 * @var        int
	 */
	protected $crdate;


	/**
	 * The value for the cruser_id field.
	 * @var        int
	 */
	protected $cruser_id;


	/**
	 * The value for the deleted field.
	 * @var        int
	 */
	protected $deleted;


	/**
	 * The value for the hidden field.
	 * @var        int
	 */
	protected $hidden;


	/**
	 * The value for the fe_users_uid field.
	 * @var        string
	 */
	protected $fe_users_uid;


	/**
	 * The value for the fe_groups_uid field.
	 * @var        string
	 */
	protected $fe_groups_uid;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [uid] column value.
	 * 
	 * @return     int
	 */
	public function getUid()
	{

		return $this->uid;
	}

	/**
	 * Get the [pid] column value.
	 * 
	 * @return     int
	 */
	public function getPid()
	{

		return $this->pid;
	}

	/**
	 * Get the [tstamp] column value.
	 * 
	 * @return     int
	 */
	public function getTstamp()
	{

		return $this->tstamp;
	}

	/**
	 * Get the [crdate] column value.
	 * 
	 * @return     int
	 */
	public function getCrdate()
	{

		return $this->crdate;
	}

	/**
	 * Get the [cruser_id] column value.
	 * 
	 * @return     int
	 */
	public function getCruserId()
	{

		return $this->cruser_id;
	}

	/**
	 * Get the [deleted] column value.
	 * 
	 * @return     int
	 */
	public function getDeleted()
	{

		return $this->deleted;
	}

	/**
	 * Get the [hidden] column value.
	 * 
	 * @return     int
	 */
	public function getHidden()
	{

		return $this->hidden;
	}

	/**
	 * Get the [fe_users_uid] column value.
	 * 
	 * @return     string
	 */
	public function getFeUsersUid()
	{

		return $this->fe_users_uid;
	}

	/**
	 * Get the [fe_groups_uid] column value.
	 * 
	 * @return     string
	 */
	public function getFeGroupsUid()
	{

		return $this->fe_groups_uid;
	}

	/**
	 * Set the value of [uid] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setUid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uid !== $v) {
			$this->uid = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::UID;
		}

	} // setUid()

	/**
	 * Set the value of [pid] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setPid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::PID;
		}

	} // setPid()

	/**
	 * Set the value of [tstamp] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setTstamp($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tstamp !== $v) {
			$this->tstamp = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::TSTAMP;
		}

	} // setTstamp()

	/**
	 * Set the value of [crdate] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setCrdate($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->crdate !== $v) {
			$this->crdate = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::CRDATE;
		}

	} // setCrdate()

	/**
	 * Set the value of [cruser_id] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setCruserId($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->cruser_id !== $v) {
			$this->cruser_id = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::CRUSER_ID;
		}

	} // setCruserId()

	/**
	 * Set the value of [deleted] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setDeleted($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted !== $v) {
			$this->deleted = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::DELETED;
		}

	} // setDeleted()

	/**
	 * Set the value of [hidden] column.
	 * 
	 * @param      int $v new value
	 * @return     void
	 */
	public function setHidden($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hidden !== $v) {
			$this->hidden = $v;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::HIDDEN;
		}

	} // setHidden()

	/**
	 * Set the value of [fe_users_uid] column.
	 * 
	 * @param      string $v new value
	 * @return     void
	 */
	public function setFeUsersUid($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->fe_users_uid) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->fe_users_uid !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->fe_users_uid = $obj;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::FE_USERS_UID;
		}

	} // setFeUsersUid()

	/**
	 * Set the value of [fe_groups_uid] column.
	 * 
	 * @param      string $v new value
	 * @return     void
	 */
	public function setFeGroupsUid($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->fe_groups_uid) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->fe_groups_uid !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Blob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->fe_groups_uid = $obj;
			$this->modifiedColumns[] = TxMklvcommunityFeUsersFeGroupsMmPeer::FE_GROUPS_UID;
		}

	} // setFeGroupsUid()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (1-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param      int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->uid = $rs->getInt($startcol + 0);

			$this->pid = $rs->getInt($startcol + 1);

			$this->tstamp = $rs->getInt($startcol + 2);

			$this->crdate = $rs->getInt($startcol + 3);

			$this->cruser_id = $rs->getInt($startcol + 4);

			$this->deleted = $rs->getInt($startcol + 5);

			$this->hidden = $rs->getInt($startcol + 6);

			$this->fe_users_uid = $rs->getBlob($startcol + 7);

			$this->fe_groups_uid = $rs->getBlob($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = TxMklvcommunityFeUsersFeGroupsMmPeer::NUM_COLUMNS - TxMklvcommunityFeUsersFeGroupsMmPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating TxMklvcommunityFeUsersFeGroupsMm object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      Connection $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TxMklvcommunityFeUsersFeGroupsMmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TxMklvcommunityFeUsersFeGroupsMmPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TxMklvcommunityFeUsersFeGroupsMmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TxMklvcommunityFeUsersFeGroupsMmPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setUid($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += TxMklvcommunityFeUsersFeGroupsMmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = TxMklvcommunityFeUsersFeGroupsMmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TxMklvcommunityFeUsersFeGroupsMmPeer::DATABASE_NAME);

		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::UID)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::UID, $this->uid);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::PID)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::PID, $this->pid);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::TSTAMP)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::TSTAMP, $this->tstamp);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::CRDATE)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::CRDATE, $this->crdate);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::CRUSER_ID)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::CRUSER_ID, $this->cruser_id);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::DELETED)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::DELETED, $this->deleted);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::HIDDEN)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::HIDDEN, $this->hidden);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_USERS_UID)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_USERS_UID, $this->fe_users_uid);
		if ($this->isColumnModified(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_GROUPS_UID)) $criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::FE_GROUPS_UID, $this->fe_groups_uid);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TxMklvcommunityFeUsersFeGroupsMmPeer::DATABASE_NAME);

		$criteria->add(TxMklvcommunityFeUsersFeGroupsMmPeer::UID, $this->uid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getUid();
	}

	/**
	 * Generic method to set the primary key (uid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setUid($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TxMklvcommunityFeUsersFeGroupsMm (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPid($this->pid);

		$copyObj->setTstamp($this->tstamp);

		$copyObj->setCrdate($this->crdate);

		$copyObj->setCruserId($this->cruser_id);

		$copyObj->setDeleted($this->deleted);

		$copyObj->setHidden($this->hidden);

		$copyObj->setFeUsersUid($this->fe_users_uid);

		$copyObj->setFeGroupsUid($this->fe_groups_uid);


		$copyObj->setNew(true);

		$copyObj->setUid(NULL); // this is a pkey column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     TxMklvcommunityFeUsersFeGroupsMm Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     TxMklvcommunityFeUsersFeGroupsMmPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TxMklvcommunityFeUsersFeGroupsMmPeer();
		}
		return self::$peer;
	}

} // BaseTxMklvcommunityFeUsersFeGroupsMm
