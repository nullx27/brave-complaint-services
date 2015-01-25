<?php namespace App\Models;

use \ArrayAccess;
use \Iterator;
use \Config;

class Types implements ArrayAccess, Iterator{

    protected $types;

    public function __construct()
    {
        $this->types = [
            'general' => [
                'name' => 'General',
                'permission' => Config::get('braveapi.permission-review-general')
            ],
            'ownership' => [
                'name' => 'Ownership',
                'permission' => Config::get('braveapi.permission-review-ownership')
            ],
            'awoxing' => [
                'name' => 'Awoxing',
                'permission' => Config::get('braveapi.permission-review-awoxing')
            ],
            'srp' => [
                'name' => 'SRP',
                'permission' => Config::get('braveapi.permission-review-srp')
            ],
            'leadership' => [
                'name' => 'Leadership',
                'permission' => Config::get('braveapi.permission-review-leadership')
            ],
            'other' => [
                'name' => 'Other',
                'permission' => Config::get('braveapi.permission-review-other')
            ]
        ];
    }

    public function getNiceName($name)
    {
        if(array_key_exists($name, $this->types))
        {
            return $this->types[$name]['name'];
        }

        return false;
    }

    public function getPermission($name){
        if(array_key_exists($name, $this->types))
        {
            return $this->types[$name]['permission'];
        }
    }

    public function getTypesFromPermission(array $permissions)
    {
        //return all types if user has all permission
        if(in_array(Config::get('braveapi.permission-review-all'), $permissions) )
        {
            return $this->types;
        }

        $out = [];
        foreach($permissions as $permission){
            foreach($this->types as $key => $data){
                if($permission == $data['permission']){
                    $out[$key] = $data;
                }
            }
        }

        return $out;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        current($this->types);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->types);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        key($this->types);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     *       Returns true on success or false on failure.
     */
    public function valid()
    {
        return key($this->types) !== null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->types);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->types);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->types[$offset];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->types[$offset] = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->types[$offset]);
    }


}