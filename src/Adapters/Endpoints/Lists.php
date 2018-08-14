<?php

namespace HandriP\Mailchimp\Adapters\Endpoints;

use HandriP\Mailchimp\Contracts\AbstractMailchimpAdapter;
use Exception;

class Lists extends AbstractMailchimpAdapter
{
    const ENDPOINT = 'lists';

    public function create(array $data = [], string $id = '') : array
    {
        if(empty($data))
        {
            throw new Exception('Data can not be empty', 400);
        }
        
        return $this->client->post(sprintf('%s/%s', self::ENDPOINT, $id), [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($data)
        ]);
    }

    public function read(string $id = '') : array
    {
        return $this->client->get(sprintf('%s/%s', self::ENDPOINT, $id));
    }

    public function edit(string $id, array $data = []) : array
    {

    }
}

