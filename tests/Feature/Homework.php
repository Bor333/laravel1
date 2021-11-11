<?php


use PHPUnit\Framework\TestCase;

class Homework extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
