<?php

namespace App\Libraries;

/**
 * Class ITPEngineProxy
 * @Author: Aaron Mkandawire
 * @Date:   2023-01-18 11:00:00
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
    $client = \Config\Services::curlrequest();
    $response = $client->request(
      'POST',
      env('engineUrl') . '/api/v1/user-account/new',
      [
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => json_encode($user)
      ]
    );

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }

  public static function createDatabaseUser(array $user = null)
  {
    $client = \Config\Services::curlrequest();
    $response = $client->request(
      'POST',
      env('engineUrl') . '/api/v1/database-user/new',
      [
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => json_encode($user)
      ]
    );

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }

  public static function createFtpAccount(array $user = null)
  {
    $client = \Config\Services::curlrequest();
    $response = $client->request(
      'POST',
      env('engineUrl') . '/api/v1/ftp-account/new',
      [
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => json_encode($user)
      ]
    );

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }

  public static function createSystemAccounts(array $user = null)
  {
    ITPEngineProxy::createUserAccount($user);
    ITPEngineProxy::createDatabaseUser($user);
    ITPEngineProxy::createFtpAccount($user);
  }

  public static function createWebsite(array $website = null)
  {
    $client = \Config\Services::curlrequest();
    $response = $client->request(
      'POST',
      env('engineUrl') . '/api/v1/website/new',
      [
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => json_encode($website)
      ]
    );

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }

  public static function createDatabase(array $database = null)
  {
    $client = \Config\Services::curlrequest();
    $response = $client->request(
      'POST',
      env('engineUrl') . '/api/v1/database/new',
      [
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => json_encode($database)
      ]
    );

    if ($response->getStatusCode() == 200) {
      return true;
    } else {
      return false;
    }
  }
}
