<?php

require_once('class.tx_mklvcommunity_listHelper.php');

$list = new tx_mklvcommunity_listHelper_list(2,new tx_mklvcommunity_listHelper_tableRenderFactory());

$cell1Obj = new tx_mklvcommunity_listHelper_contentObject(array('content' => 'Zelle1_1'));
$cell2Obj = new tx_mklvcommunity_listHelper_contentObject(array('content' => 'Zelle1_2'));

$cellContentRenderer = new tx_mklvcommunity_listHelper_textRenderer('content');

$row = new tx_mklvcommunity_listHelper_row(array($cellContentRenderer, $cellContentRenderer), array($cell1Obj, $cell2Obj));

$list->addRow($row);
$list->addRow($row);

echo $list->render();

?>