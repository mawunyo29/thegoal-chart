<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class DataQueryTest extends TestCase
{
    public function testModelFilterWithRelations()
    {
        $filters = [
            'search' => 'admin',
            'role' => 'admin',
            'permission' => 'create',
            'sort' => 'name',
        ];

        $query = User::ModelFilterWithRelations($filters);

        $this->assertCount(1, $query->get());

    }
}
