<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class DataQueryTest extends TestCase
{
    public function test_model_filter_with_relations()
    {
        $filters = [
            'relationsearch' => 'admin',
            'relation' => 'roles',
            'sort' => 'name',
        ];

        $query = User::ModelFilterWithRelations($filters);

        $this->assertCount(1, $query->get());

    }
}
