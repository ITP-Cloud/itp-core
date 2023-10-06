<?php

namespace App\Libraries;

/**
 * Class ITPEngineProxy
 * @Author: Aaron Mkandawire
 * @Date:   2018-01-18 11:00:00
 * @version: v1.0
 * @description: This class is used to proxy the ITP Engine
 *               and provide a simple interface to the ITP Engine API
 *               for the rest of the application.
 * 
 * @package App\Libraries
 */
class ITPEngineProxy
{
  public static function createUserAccount(array $user = null): bool
  {
    $itp_engine_url = env('engineUrl');

    $client = \Config\Services::curlrequest();

    $response = $client->post($itp_engine_url . '/api/v1/user-account', [
      'headers' => ['Content-Type', 'application/json'],
      'body' => json_encode($user)
    ]);

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }

  public static function deleteUserAccount(object $user)
  {
  }

  public static function createDatabase(array $options)
  {
  }

  public static function deleteDatabase(array $options)
  {
  }

  public static function createFtpAccount(array $options)
  {
  }

  public static function deleteFtpAccount(array $options)
  {
  }

  public static function createWebsite(array $website)
  {
  }

  public static function deleteWebsite(array $website)
  {
  }
}
