<?php

namespace HandriP\Mailchimp\Contracts;

interface MailchimpAdapterInterface 
{
    public function create(array $data = []) : array;
    public function read(string $id) : array;
    public function edit(string $id, array $data = []) : array;
}