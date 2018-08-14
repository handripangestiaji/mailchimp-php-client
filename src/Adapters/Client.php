<?php

namespace HandriP\Mailchimp\Adapters;

use HandriP\Mailchimp\Adapters\Endpoints\Lists;

class Client
{
    protected $client;
    
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function lists()
    {
        return new Lists($this->client);
    }
}