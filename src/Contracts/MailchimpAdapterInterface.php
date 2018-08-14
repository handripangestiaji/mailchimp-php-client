<?php

namespace HandriP\Mailchimp\Contracts;

interface MailchimpAdapterInterface 
{
    public function create(array $data = [], string $id) : array;
    public function read(string $id) : array;
    public function edit(string $id, array $data = []) : array;
}