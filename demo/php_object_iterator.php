<?php
/**
* 类使用Iterator迭代器遍历对象
* 调用顺序猜测是:
* rewind, valid, key, current, next
* 不好意思，猜错了，正确顺序是：current 和 key 调换
*
* 另外，如果我传入的是二维数组又该怎么处理了呢？(答案是将key和value分成两个数组)
*/
class ClassIterator implements Iterator
{

	private $_data;
	private $_postion;

	function __construct($data)
	{
		echo __METHOD__, '<br/>';
		$this->_data = $data;
		$this->_postion = 0;
	}

	public function rewind() {
		//倒回、重置
		echo __METHOD__, '<br/>';
		$this->_postion = 0;
	}

	public function key() {
		echo __METHOD__, '<br/>';
		return $this->_postion;
	}

	public function current() {
		echo __METHOD__, '<br/>';		
		return $this->_data[$this->_postion];
	}

	public function valid() {
		echo __METHOD__, '<br/>';		
		$len = count($this->_data);
		return ($this->_postion >= 0 && $this->_postion < $len);
	}

	public function next() {
		echo __METHOD__, '<br/>';
		$this->_postion ++;
	}

}

//$array = array(3,8,7,10,100,5,1,4,2,9,6);
$ci = new ClassIterator($array);

foreach ($ci as $key => $value) {
	echo $key, '--------', $value, '<br/>';
}