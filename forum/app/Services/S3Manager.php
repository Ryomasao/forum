<?php

namespace App\Services;

use Aws\S3\S3Client;
use Aws\Sts\StsClient;

class S3Manager
{
    //S3client
    protected $s3;

    public function __construct()
    {
      $this->s3 = \App::make('aws')->createClient('s3');

    }

    /**
     * 
     */
    public function putFile($filePath)
    {

      $resulut = $this->s3->putObject([
        'Bucket'     => env('AWS_BUCKET'),
        'Key'        => '/test/test.txt',
        'SourceFile' => $filePath,
      ]);

      return $result;

    }

    public function putFile2()
    {
      $bucket = 'tohu';
      $keyname = 'test/test.txt';

      // Instantiate the client.
      $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => env('AWS_REGION'),
        'credentials' => [
            'key'    => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
        ],
      ]);

      // Upload data.
      $result = $s3->putObject(array(
          'Bucket' => $bucket,
          'Key'    => $keyname,
          'Body'   => 'Hello, world!'
      ));

      return $result;

    }

    public function publishUrl()
    {
      $bucket = 'tohu';
      $keyname = 'test/test.txt';

      // Instantiate the client.
      $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => env('AWS_REGION'),
        'credentials' => [
            'key'    => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
        ],
      ]);

      $cmd = $s3->getCommand('GetObject', [
        'Bucket' => $bucket,
        'Key'    => $keyname
      ]);

      $request = $s3->createPresignedRequest($cmd, '+50 minutes');

      $presignedUrl = (string) $request->getUri();

      return $presignedUrl;

    }

    public function getToken()
    {
      $sts = StsClient::factory(
        [
          'region' => 'ap-northeast-1',
          'version' => 'latest',
          'credentials' => [
              'key'    => env('AWS_KEY'),
              'secret' => env('AWS_SECRET'),
          ],
        ]
      );

      $credentials = $sts->getSessionToken()->get('Credentials');
      dd($credentials['AccessKeyId'],$credentials['SecretAccessKey']);

      return $sts;
    }


}
