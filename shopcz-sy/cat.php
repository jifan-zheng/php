<?php
$cat = array(
	array('cat_id'=>1,'cat_name'=>'男女服装','parent_id'=>0),
	array('cat_id'=>2,'cat_name'=>'家用电器','parent_id'=>0),
	array('cat_id'=>3,'cat_name'=>'男装','parent_id'=>1),
	array('cat_id'=>4,'cat_name'=>'女装','parent_id'=>1),
	array('cat_id'=>5,'cat_name'=>'衬衫','parent_id'=>3),
	array('cat_id'=>6,'cat_name'=>'牛仔裤','parent_id'=>3),
	array('cat_id'=>7,'cat_name'=>'连衣裙','parent_id'=>4),
	array('cat_id'=>8,'cat_name'=>'大家电','parent_id'=>2),
	array('cat_id'=>9,'cat_name'=>'生活家电','parent_id'=>2),
	array('cat_id'=>10,'cat_name'=>'平板电视','parent_id'=>8),
	array('cat_id'=>11,'cat_name'=>'空调','parent_id'=>8),
);

//具备嵌套结构的多维数组
$res = array(
	array('cat_id'=>1,'cat_name'=>'男女服装','parent_id'=>0
		'child' => array(
			array('cat_id'=>3,'cat_name'=>'男装','parent_id'=>1
				'child' => array(
					array('cat_id'=>5,'cat_name'=>'衬衫','parent_id'=>3),
					array('cat_id'=>6,'cat_name'=>'牛仔裤','parent_id'=>3),
				)
			),
			array('cat_id'=>4,'cat_name'=>'女装','parent_id'=>1
				'child' => array(
					array('cat_id'=>7,'cat_name'=>'连衣裙','parent_id'=>4),
				)
			),
		)
	),
	array('cat_id'=>2,'cat_name'=>'家用电器','parent_id'=>0
		'child' => array(
			array('cat_id'=>8,'cat_name'=>'大家电','parent_id'=>2
				'child' => array(
					array('cat_id'=>10,'cat_name'=>'平板电视','parent_id'=>8),
					array('cat_id'=>11,'cat_name'=>'空调','parent_id'=>8),
				)
			),
			array('cat_id'=>9,'cat_name'=>'生活家电','parent_id'=>2),
		)
	)
);