<?php

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Orders extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('orders', 'num');
    }

    // add an item to an order
    function add_item($num, $code) {
        
    }

    // calculate the total for an order
    function total($num) {
        // change the total amount for an order by iterate over the items in an order
        $CI = &get_instance();
        $CI->load->model('orderitems');
        
        // get all the items in the order by calling some('code',$num)
        $items = $this->orderitems->some('code', $num);
        
        // used foreach loop to iterate all the item in items and add them up
        $result = 0.0;
        foreach ($items as $item) 
        {
            $menuitem = $this->menu->get($item->item);
            $result = $item->quantity * $menuitem->price;
        }
        
        // return total amount of items in the order
        return $result;
    }

    // retrieve the details for an order
    function details($num) {
        
    }

    // cancel an order
    function flush($num) {
        
    }

    // validate an order
    // it must have at least one item from each category
    function validate($num) {
        return false;
    }

}
