<?php

return [

  /**
   * server configuration of Braintree
   */

  'environment' => env('BR_ENVIRONMENT', 'sandbox'),
  'merchantId' => env('BR_MERCHANTID'),
  'publicKey' => env('BR_PUBLICKEY'),
  'privateKey' => env('BR_PRIVATEKEY')

];