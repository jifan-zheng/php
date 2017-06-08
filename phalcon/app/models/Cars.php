<?php

class Cars extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $brand_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $price;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $year;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $style;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("order_sys");
        $this->belongsTo('brand_id', '\Brands', 'id', ['alias' => 'Brands']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Cars';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cars[]|Cars
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cars
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function insert($array=null)
    {
        //利用反射获取类的属性
        $reflect = new ReflectionClass($this);
        $proc = $reflect->getDefaultProperties();
 
        //获取数组长度
        $len=count($proc);
        //反序输出
        $procRev = array_reverse($proc);
        //过滤不必要的属性，获取表名
        $procValid = array_slice($procRev,13,$len-13-1);
        /*输出数组属性
        foreach ($procValid as $key => $value) 
        {
            # code...
            echo $key;
            echo "<br>";
        }
        */
        //插入数组
        foreach ($procValid as $key => $value) 
        {
            # code...
            $this->$key = $array[$key];
        }
        
        echo $this->save()?"ok":"on";
    }

    public  function raw()
    {
        $results=$this->getReadConnection()->query('SELECT  *  FROM Cars, Brands WHERE Brands.Bid = Cars.brand_id')->fetchAll(2);
        
        foreach ($results as $result) 
        {
            # code...
            var_dump($result);
            echo "<br>";
        }
        
    }



    public function test()
    {
        echo "test";
    }

}
