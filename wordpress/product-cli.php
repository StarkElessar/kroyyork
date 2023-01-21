<?php

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
 return;
}

class Product_CLI extends \WP_CLI_Command {

 /**
  * Untag all early access classes when public access date is past.
  *
  * Your comments go here.
  */
 // Your function goes here.
}

WP_CLI::add_command( 'product', 'Product_CLI' );