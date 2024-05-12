<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\Loan\Status;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_model()
    {
        $data = [
            'sum' => '123',
            'status' => Status::Active->value,
        ];

        $this->post(route('loans.store'), $data)
            ->assertStatus(201)
            ->assertJson(['data' => $data]);
    }

    public function test_list_models()
    {
        $model = Loan::factory()->create();

        $this->get(route('loans.index'))
            ->assertStatus(200)
            ->assertJsonFragment([$model->toArray()]);
    }

    public function test_show_model()
    {
        $model = Loan::factory()->create();

        $this->get(route('loans.show', $model->id))
            ->assertStatus(200)
            ->assertJsonFragment([$model->toArray()]);
    }

    public function test_update_model()
    {
        $model = Loan::factory()->create();

        $updateData = [
            'sum' => 1234,
        ];

        $this->put(route('loans.update', $model->id), $updateData)
            ->assertStatus(200)
            ->assertJson(function (AssertableJson $json) use ($updateData) {
                $json->where('data.sum', $updateData['sum']);
            });
    }

    public function test_delete_model()
    {
        $model = Loan::factory()->create();

        $this->delete(route('loans.destroy', $model->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('loans', ['id' => $model->id]);
    }

}
