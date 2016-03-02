<?php

namespace Serrex\RestBunble\Contracts;

interface ResponseInterface
{
    public function send();

    public function getStatus();

    public function getMessages();

    public function getJson();

    public function getData();
}
