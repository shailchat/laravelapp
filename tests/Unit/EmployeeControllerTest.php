<?php

namespace Tests\Unit;

use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_homepage_routes_working(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_employee_homepage_routes_working(): void
    {
        $response = $this->get('/employees');


        $response->dumpHeaders();

        //$response->dumpSession();

        //$response->dump();

        $response->assertStatus(200);
    }


    public function test_employee_can_be_created_working(): void
    {
        $response = $this->postJson('/employees', ['name' => 'Sally']);

        $response
            ->assertStatus(201);
//            ->assertExactJson([
//                'created' => true,
//            ]);
    }
}
