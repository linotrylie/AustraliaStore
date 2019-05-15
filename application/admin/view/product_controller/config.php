<?php

return array (
  'module' => 'admin',
  'menu' => 
  array (
    0 => 'add',
    1 => 'forbid',
    2 => 'resume',
    3 => 'delete',
    4 => 'recyclebin',
    5 => 'saveorder',
  ),
  'create_config' => true,
  'controller' => 'ProductController',
  'title' => '',
  'form' => 
  array (
    0 => 
    array (
      'title' => 'product_id',
      'name' => 'product_id',
      'type' => 'number',
      'option' => '',
      'default' => '',
      'sort' => '1',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
    1 => 
    array (
      'title' => 'product_name',
      'name' => 'product_name',
      'type' => 'text',
      'option' => '',
      'default' => '',
      'search' => '1',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
    2 => 
    array (
      'title' => 'unit_price',
      'name' => 'unit_price',
      'type' => 'number',
      'option' => '',
      'default' => '',
      'sort' => '1',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
    3 => 
    array (
      'title' => 'unit_quantity',
      'name' => 'unit_quantity',
      'type' => 'text',
      'option' => '',
      'default' => '',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
    4 => 
    array (
      'title' => 'in_stock',
      'name' => 'in_stock',
      'type' => 'number',
      'option' => '',
      'default' => '',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
    5 => 
    array (
      'title' => 'create_time',
      'name' => 'add_time',
      'type' => 'number',
      'option' => '',
      'default' => '',
      'search_type' => 'text',
      'validate' => 
      array (
        'datatype' => '',
        'nullmsg' => '',
        'errormsg' => '',
      ),
    ),
  ),
  'create_table' => '1',
  'table_engine' => 'InnoDB',
  'table_name' => '',
  'field' => 
  array (
    1 => 
    array (
      'name' => 'product_id',
      'type' => 'int(10)',
      'default' => 'NULL',
      'key' => '1',
      'comment' => 'product_id',
      'extra' => 'unsigned',
    ),
    2 => 
    array (
      'name' => 'product_name',
      'type' => 'varchar(255)',
      'default' => 'NULL',
      'comment' => 'product_name',
      'extra' => '',
    ),
    3 => 
    array (
      'name' => 'unit_price',
      'type' => 'float(8,2)',
      'default' => 'NULL',
      'comment' => 'unit_price',
      'extra' => '',
    ),
    4 => 
    array (
      'name' => 'unit_quantity',
      'type' => 'varchar(15)',
      'default' => 'NULL',
      'comment' => 'unit_quantity',
      'extra' => '',
    ),
    5 => 
    array (
      'name' => 'in_stock',
      'type' => 'int(10)',
      'default' => 'NULL',
      'comment' => 'in_stock',
      'extra' => 'unsigned',
    ),
    6 => 
    array (
      'name' => 'create_time',
      'type' => 'int(11)',
      'default' => '0',
      'not_null' => '1',
      'comment' => 'add_time',
      'extra' => '',
    ),
    7 => 
    array (
      'name' => 'isdelete',
      'type' => 'tinyint(1)',
      'default' => '0',
      'not_null' => '1',
      'comment' => '',
      'extra' => 'unsigned',
    ),
    8 => 
    array (
      'name' => 'status',
      'type' => 'tinyint(1)',
      'default' => '1',
      'not_null' => '1',
      'comment' => '',
      'extra' => 'unsigned',
    ),
    9 => 
    array (
      'name' => 'update_time',
      'type' => 'int(11)',
      'default' => '0',
      'not_null' => '1',
      'comment' => '',
      'extra' => '',
    ),
  ),
  'model' => '1',
  'auto_timestamp' => '1',
);
