<?php

/**
 * Idea: use abstract factory method to configure table with renderers
 * 
 * Possible renderers are:
 * - <div> renderer
 * - <table> renderer
 * - <ul> renderer
 * ...
 * 
 * #################################
 * # Todos                         #
 * #################################
 * 
 * @todo implement sort-mechanism
 * @todo implement pagebrowser-functionality
 * @todo implement auto-creation from models
 * @todo implement tag-attributes for renderers
 * 
 *
 */

/**
 * Abstract class for creating renderers. Class acts as abstract factory
 * and creates renderers for tables, rows and cells.
 * 
 * One instance of this class is used as a rendering configuration
 * for the list object.
 *
 */
abstract class tx_mklvcommunity_listHelper_renderFactory {
	
	/**
	 * Renderer for table rendering
	 *
	 * @var tx_mklvcommunity_listHelper_renderObject
	 */
	protected $tableRenderer 	= null;
	
	/**
	 * Renderer for row rendering
	 *
	 * @var tx_mklvcommunity_listHelper_renderObject
	 */
	protected $rowRenderer 		= null;
	
	/**
	 * Renderer for cell rendering
	 *
	 * @var tx_mklvcommunity_listHelper_renderObject
	 */
	protected $cellRenderer 	= null;
	
	/**
	 * Returns renderer for table rendering
	 *
	 * @return tx_mklvcommunict_listHelper_renderObject
	 */
	final public function getTableRenderer() {
		return $this->tableRenderer;
	}
	
	/**
	 * Returns renderer for row rendering
	 *
	 * @return tx_mklvcommunity_listHelper_renderObject
	 */
	final public function getRowRenderer() {
		return $this->rowRenderer;
	}
	
	/**
	 * Returns renderer for cell rendering
	 *
	 * @return tx_mklvcommunity_listHelper_renderObject
	 */
	final public function getCellRenderer() {
		return $this->cellRenderer;
	}
	
}


/**
 * Implementation of a Renderer Factory for standard
 * HTML table rendering
 *
 */
class tx_mklvcommunity_listHelper_tableRenderFactory extends tx_mklvcommunity_listHelper_renderFactory {
	
	/**
	 * Constructor sets the render objects of the class for table rendering
	 *
	 */
	public function __construct() {
		$this->tableRenderer 	= new tx_mklvcommunity_listHelper_tableTableRenderer();
		$this->rowRenderer 		= new tx_mklvcommunity_listHelper_tableRowRenderer();
		$this->cellRenderer		= new tx_mklvcommunity_listHelper_tableCellRenderer();
	}
	
}

/**
 * Implementation of a Renderer Factory for div Table Rendering
 *
 */
class tx_mklvcommunity_listHelper_divRendererFactory extends tx_mklvcommunity_listHelper_renderFactory {
	
	/**
	 * Constructor sets the render objects of the class for div-tag rendering
	 * @todo needs to be implemented
	 *
	 */
	public function __construct() {
		$this->tableRenderer	= new tx_mklvcommunity_listHelper_divTableRenderer();
		$this->rowRenderer 		= new tx_mklvcommunity_listHelper_divRowRenderer();
		$this->cellRenderer		= new tx_mklvcommunity_listHelper_divCellRenderer();
	}
	
}

/**
 * Interface definition for render objects
 *
 */
interface tx_mklvcommunity_listHelper_renderObject {
	
	/**
	 * Renders a given content with the configured 
	 * HTML wrapping
	 * 
	 * @todo add a parameter for tag attributes
	 *
	 * @param string $content
	 */
	public function render($content);
	
}

/**
 * Implementation of tx_mklvcommunicty_listHelper_renderObject for rendering html tables
 *
 */
class tx_mklvcommunity_listHelper_tableTableRenderer implements tx_mklvcommunity_listHelper_renderObject {
	
	public function render($content) {
		return '<table>' . $content . '</table>';
	}
	
}

/**
 * Implementation of tx_mklvcommunity_listHelper_renderObject for rendering html table-rows
 *
 */
class tx_mklvcommunity_listHelper_tableRowRenderer implements tx_mklvcommunity_listHelper_renderObject {
	
	public function render($content) {
		return '<tr>' . $content . '</tr>';
	}
	
}

/**
 * Implementation of tx_mklvcommunity_listHelper_renderObject for rendering html table-cells
 *
 */
class tx_mklvcommunity_listHelper_tableCellRenderer implements tx_mklvcommunity_listHelper_renderObject {
	
	public function render($content) {
		return '<td>' . $content . '</td>';
	}
	
}

/**
 * Main class, implements a list object for rendering lists.
 * The object can be configured with different factories for rendering
 *
 */
class tx_mklvcommunity_views_listView extends tx_mklvcommunity_view {
	
	/**
	 * Array for rows
	 *
	 * @var array
	 */
	private $rows = array();
	
	/**
	 * Number of columns used by the list
	 *
	 * @var int
	 */
	private $numOfCols;
	
	/**
	 * Holds a reference to the renderFactory
	 *
	 * @var tx_mklvcommunity_listHelper_renderFactory
	 */
	private $renderFactory;
	
	/**
	 * Sets the render factory for the list
	 *
	 * @param 	tx_mklvcommunity_listHelper_renderFactory 	$renderFactory
	 */
	public function setRenderFactory($renderFactory) {
		$this->renderFactory = $renderFactory;
	}
	
	/**
	 * Adds a row to the rows array
	 *
	 * @param tx_mklvcommunity_listHelper_row 	$row
	 */
	public function addRow($row) {
			$row->setParentTable($this);
			$this->rows[]=$row;
	}
	
	/**
	 * Deletes a row from the rows array
	 *
	 * @param tx_mklvcommunity_listHelper_row 	$row
	 */
	public function deleteRow($row) {
		$this->rows = array_diff($this->rows, array($row));
	}
	
	/**
	 * Returns the render object for row-rendering as configured by the
	 * renderFactory
	 *
	 * @return tx_mklvcommunity_listHelper_renderObject
	 */
	public function getRowRenderer() {
		return $this->renderFactory->getRowRenderer();
	}
	
	/**
	 * Returns the render object for row-rendering as configured by the
	 * renderFactory
	 *
	 * @return tx_mklvcommunity_listHelper_renderObject
	 */
	public function getCellRenderer() {
		return $this->renderFactory->getCellRenderer();
	}
	
	/**
	 * Renders the list by delegating the rendering to its rows
	 * and later using its own renderObject to render the content
	 *
	 * @return 	string	Result of the rendering process (mostly HTML code)
	 */
	public function renderList() {
		$content = '';
		foreach ($this->rows as $row) {
			$content .= $row->render();
		}
		return $this->renderFactory->getTableRenderer()->render($content);
	}
	
	/**
	 * Renders a list from an appended model
	 * Uses cell configurations given in $rowConfigurationArray for rendering each cell of a row
	 * $rowConfigurationArray must have the following form:
	 * array('key' => $contentRenderObject ...)
	 * 
	 *
	 * @param array $rowConfigurationArray
	 * @return unknown
	 */
	public function renderFromModel(array $rowConfigurationArray) {
		
		/*if (!($this->model)) {
			return 'No model defined so no output generated!';
		}*/
		foreach($this->model as $entry) {
			/* create new row element with one cell for each entry in $rowConfigurationArray */
			$cellContents = array();
			foreach($rowConfigurationArray as $key => $rowConfiguration) {
				$cellContents[] = $entry;
			}
			$row = new tx_mklvcommunity_listHelper_row($rowConfigurationArray, $cellContents, $this);
			$this->addRow($row);
		}
		return $this->renderList();
	}
		
}

/**
 * Class for implementing row objects
 *
 */
class tx_mklvcommunity_listHelper_row {
	
	/**
	 * Array for the cells
	 *
	 * @var array
	 */
	private $cells = array();
	
	/**
	 * Holds a reference to the parent list-object
	 *
	 * @var tx_mklvcommunity_listHelper_list
	 */
	private $parentTable = null;
	
	/**
	 * Constructor for the line object. Needs an array of cellTypes
	 * with which the cells will be configured and an array of cellContents
	 * to be used as content objects for the cells.
	 *
	 * @param unknown_type $cellTypes
	 * @param unknown_type $cellContents
	 */
	public function __construct($cellContentRenderers, $cellContents, $parentTable) {
		if (!(count($cellContentRenderers) == count($cellContents))) {
			throw new Exception('The length of cellTypesArray hast to be the length of cell contents array!');
		}
		$this->parentTable = $parentTable;
		$cellContentCounter = 0;
		foreach ($cellContentRenderers as $cellContentRenderer) {
			$this->addCell($cellContentRenderer, $cellContents[$cellContentCounter]);
			$cellContentCounter++;
		}
	}
	
	/**
	 * Sets the parent list-object
	 *
	 * @param 	tx_mklvcommunity_listHelper_list 	$parentTable
	 */
	public function setParentTable($parentTable) {
		$this->parentTable = $parentTable;
	}
	
	/**
	 * Returns the renderer for a cell object
	 *
	 * @return tx_mklvcommunity_listHelper_renderObject
	 */
	public function getCellRenderer() {
		return $this->parentTable->getCellRenderer();
	}
	
	public function getParentTable() {
		return $this->parentTable;
	}
	
	/**
	 * Renders the row by delegating the rendering process to the
	 * cell objects and wrapping the content with the renderObject
	 * as configured by the renderFactory
	 *
	 * @return 	string		Mostly HTML Code
	 */
	public function render() {
		$content = '';
		foreach ($this->cells as $cell) {
			$content .= $cell->render();
		}
		$rowRenderer = $this->parentTable->getRowRenderer();
		return $rowRenderer->render($content);
	}
	
	/**
	 * Adds a cell to the cells array
	 *
	 * @param tx_mklvcommunity_listHelper_renderObject 	$cellContentRenderer
	 * @param tx_mklvcommunity_listHelper_contentObject $cellContent
	 */
	private function addCell($cellContentRenderer, $cellContent) {
		$cell = new tx_mklvcommunity_listHelper_cell($cellContentRenderer, $cellContent, $this);
		$this->cells[] = $cell;
	}
	
}

/**
 * Class for implementing a cell object
 *
 */
class tx_mklvcommunity_listHelper_cell {
	
	/**
	 * Holds the key of the content object, 
	 * that points to the value which can be
	 * used for sorting the list
	 *
	 * @var string
	 */
	private $sortKey;
	
	/**
	 * Reference to a content object for the cell
	 *
	 * @var tx_mklvcommunity_listHelper_contentObject
	 */
	private $contentObj;
	
	/**
	 * Holds a reference to the rendering object for the content
	 * (not the cellRenderer!)
	 *
	 * @var tx_mklvcommunity_contentRenderer
	 */
	private $contentRenderer;
	
	/**
	 * Holds a reference to the parent row for this cell
	 *
	 * @var tx_mklvcommunity_listHelper_row
	 */
	private $parentRow = null;
	
	/**
	 * Constructor for the row object. Needs a contentRenderer and a contentObject as parameters.
	 * Sets up a cell object with the content of the contentObject and contentRenderer as 
	 * rendering object for the cell content.
	 *
	 * @param tx_mklvcommunity_listHelper_contentRenderer 	$contentRenderer
	 * @param tx_mklvcommunity_listHelper_contentObject 	$contentObj
	 */
	public function __construct($contentRenderer, $contentObj, $parentRow) {
		$this->parentRow 		= $parentRow;
		$this->contentObj 		= $contentObj;
		$this->contentRenderer 	= $contentRenderer;
		$contentRenderer->setParentCell($this);
	}
	
	/**
	 * Sets the parent row of the object
	 *
	 * @param tx_mklvcommunity_listHelper_row 	$parentRow
	 */
	public function setParentRow($parentRow) {
		$this->parentRow = $parentRow;
	}
	
	/**
	 * Returns the attribute of the content object that is used
	 * as sort key for list sorting.
	 *
	 * @return 	string
	 */
	public function getSortKey() {
		return $contentObj->{$this->sortKey};
	}
	
	/**
	 * Sets the attribute of the content object that is used
	 * as sort key for list sorting
	 * 
	 * @todo check for attribute when key is set
	 *
	 * @param 	string 		$sortKey
	 */
	public function setSortKey($sortKey) {
		$this->sortKey = $sortKey;
	}
	
	public function getParentRow() {
		return $this->parentRow;
	}
	
	/**
	 * Renders the cell content by using the contentRenderer and 
	 * the cellRenderer. Returns the created string as output.
	 *
	 * @todo think about adding the contentRenderer to the contentObject!
	 * 
	 * @return 	string	Output of the rendering process
	 */
	public function render() {
		$cellContent = $this->contentRenderer->render($this->contentObj);
		$cellRenderer = $this->parentRow->getCellRenderer();
		return $cellRenderer->render($cellContent);
	}
	
}

/**
 * Class definition of a content object.
 * 
 * @todo should extend tx_lib_object
 * @todo should have its own renderer
 *
 */
class tx_mklvcommunity_listHelper_contentObject {
	
	/**
	 * Internal storage for the content elements
	 *
	 * @var unknown_type
	 */
	private $contentArr = array();
	
	/**
	 * Constructor for contentObject
	 * Takes an array with key=>value pairs and
	 * stores it to the internal data array
	 *
	 * @param unknown_type $array
	 */
	public function __construct($array) {
		$this->contentArr = $array;
	}
	
	/**
	 * Interceptor method for taking values from internal storage array
	 * for unknown properties.
	 *
	 * @param 	string 	$key	Key of the internal storage array
	 * @return 	string			Value of the internal storage array
	 */
	public function __get($key) {
		return $this->contentArr[$key];
	}
	
	public function get($key) {
		return $this->{$key};
	}
	
}

/**
 * Interface definition of content renderer
 * 
 * @todo try to use content renderers from lib
 *
 */
abstract class tx_mklvcommunity_listHelper_contentRenderer {
	
	/**
	 * Key of the content-object for accessing the property to render
	 *
	 * @var string
	 */
	protected $key = 'content';
	
	/**
	 * Reference to the cell object
	 *
	 * @var tx_mklvcommunity_listHelper_cell
	 */
	protected $parentCell = null;
	
	public function __construct($key = null) {
		if ($key) {
			$this->key = $key;
		}
	}
	
	public function setParentCell($parentCell) {
		$this->parentCell = $parentCell;
	}
	
	public function getParentCell() {
		return $this->parentCell;
	}
	
	/**
	 * Rendering function for contentObject. Must be implemented in 
	 * the extending render classes
	 *
	 * @param tx_mklvcommunity_listHelper_contentObject $contentObj
	 */
	abstract public function render($contentObj);
	
}

/**
 * Implementation of a contentRendering class for rendering normal text-output.
 * If no key was set in the constructor, the class takes the 'content' property
 * of the contentObject by default
 *
 */
class tx_mklvcommunity_listHelper_textRenderer extends tx_mklvcommunity_listHelper_contentRenderer {
	
	/**
	 * Return value of the content property of the given contentObject
	 *
	 * @param 	tx_mklvcommunity_listHelper_contentObject $contentObj
	 * @return 	string
	 */
	public function render($contentObj) {
		return $contentObj->get($this->key);
	}
	
}

?>