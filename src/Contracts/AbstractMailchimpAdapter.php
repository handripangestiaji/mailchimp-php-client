<?php

namespace HandriP\Mailchimp\Contracts;

abstract class AbstractMailchimpAdapter implements MailchimpAdapterInterface
{
    protected $client = false;

    public function __construct($client) 
    {
        $this->client = $client;
    }
}