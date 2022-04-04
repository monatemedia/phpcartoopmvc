<?php
/*
    Cart class
    Handle all tasks related to showing or modifying the number of items in cart
    
    The cart keeps track of user selected items using a session variable, $_SESSION['cart'].
    The session variable holds an array that contains the ids and the number selected of the pro in the cart.

    $_SESSION['cart']['product_id'] = num of specific item in cart
*/

class cart
{
    function __construct(){}

    /*
        Getters and Setters
    */
    /**
     * Return an array of all product info for items in the cart
     * 
     * @access public
     * @param
     * @return array, null
     */
    public function get()
    {
        if  (isset($_SESSION['cart']))
        {
            // get all product ids of items in cart_rows
            $ids = $this->get_ids();

            // use list of ids to get product info from database
            global $Products;
            return $Products->get($ids);
        }
        return NULL;
    }

    /**
     * Return an array of all product ids in cart
     * 
     * @access public
     * @param
     * @return array, null
     */
    public function get_ids()
    {
        if (isset($_SESSION['cart']))
        {
            return array_keys($_SESSION['cart']);
        }
        return NULL;
    }

    /**
     * Adds item to Cart
     * @access public
     * @param int, int
     * @return null
     */
    public function add($id, $num = 1)
    {
        // setup or retrieve cart
        $cart = array();
        if (isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart'];
        }

        // check to see if item is already in cart
        if (isset($cart[$id]))
        {
            // if item is in cart
            $cart[$id] = $cart[$id] + $num;
        }
        else
        {
            // if item is not in cart
            $cart[$id] = $num;
        }
        $_SESSION['cart'] = $cart;
    }
    
    /**
     * Empties all items from cart
     * 
     * @access public
     * @param
     * @return null
     */    
    public function empty_cart()
    {
        unset($_SESSION['cart']);
    }

    /*
        Create page parts
    */

    /**
     * Return a string, containing list items for each product in cart
     * 
     * @access public
     * @param
     * @return string
     */
    public function create_cart()
    {
        // get products currently in cart
        $products = $this->get();

        echo "<pre>";
        print_r(($products));
        echo "</pre>";
    }
}