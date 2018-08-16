<?php

namespace Tests\Feature;

use App\Clinic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClinicTest extends TestCase
{
    public function test_get_featured_attribute_should_return_boolean()
    {
        $clinic = Clinic::first();

        $this->assertTrue(is_bool($clinic->featured));
    }
}
