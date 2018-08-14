<?php

namespace HandriP\Mailchimp\Test\Unit\Adapters\Endpoints;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use FindWork\Transporter\Adapters\GuzzleAdapter;
use HandriP\Mailchimp\Adapters\Client;
use Exception;

class ListTest extends TestCase
{
    public function testReadShouldReturnArray()
    {
        $mock = new MockHandler([new Response(200, [], '[{"result": "test"}]')]);
        $handler = HandlerStack::create($mock);
        $client = new GuzzleAdapter([
            'base_uri' => 'https://dc.api.mailchimp.xyz/3.0',
            'basic_auth' => ['mailchimp', 'your-api-key'],
            'handler' => $handler]);

        $mailchimp = new Client($client);

        $result = $mailchimp->lists()->read();

        $this->assertTrue(is_array($result));
    }

    public function testCreateShouldReturnArray()
    {
        $mock = new MockHandler([new Response(200, [], '[{"result": "test"}]')]);
        $handler = HandlerStack::create($mock);
        $client = new GuzzleAdapter([
            'base_uri' => 'https://dc.api.mailchimp.xyz/3.0',
            'basic_auth' => ['mailchimp', 'your-api-key'],
            'handler' => $handler]);

        $mailchimp = new Client($client);
        
        $data = [
            'name' => 'test',
            'contact' => [
                'company' => 'FindWork',
                'address1' => 'Menara BTPN 47th floor, cocowork',
                'city' => 'Jakarta Selatan',
                'state' => 'DKI Jakarta',
                'zip' => '12950',
                'country' => 'Indonesia'
            ],
            'permission_reminder' => 'ivibesmedia.com This platform is a place for netizen, vloggers, blogger, instagrammers, youtubers, facebookers, buzzer and other online media activists to interact positively and getting profit from leading brands / products from Indonesia and Worldwide.',
            'campaign_defaults' => [
                'from_name' => 'Find Work',
                'from_email' => 'handri@findwork.io',
                'subject' => 'Test mailchimp php client',
                'language' => 'id'
            ]
        ];

        $result = $mailchimp->lists()->create($data);

        $this->assertTrue(is_array($result));
    }

    public function testCreateShouldThrowExceptionIfDataIsEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Data can not be empty');
        $this->expectExceptionCode(400);

        $mock = new MockHandler([new Response(200, [], '[{"result": "test"}]')]);
        $handler = HandlerStack::create($mock);
        $client = new GuzzleAdapter([
            'base_uri' => 'https://dc.api.mailchimp.xyz/3.0',
            'basic_auth' => ['mailchimp', 'your-api-key'],
            'handler' => $handler]);

        $mailchimp = new Client($client);

        $data = [];

        $result = $mailchimp->lists()->create($data);
    }
}