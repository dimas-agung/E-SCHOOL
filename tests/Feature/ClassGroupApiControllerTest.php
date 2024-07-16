<?php

namespace Tests\Feature;

use App\Models\ClassGroup;
use App\Models\GradeClass;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassGroupApiControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testGetAllClassGroup(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);

        $dataClassGroup = [
            'level' => 11,
            'name' => 'Mesin',
            'description' => '11 Mesin',
        ];
        $ClassGroup = ClassGroup::create($dataClassGroup);

        $response=$this->actingAs($user)->get('/api/class_group');

        $response->assertStatus(200);
        // $response->assertJson([
        //     'id' => $constituency->id,
        //     'name' => $constituencyName
        // ]);
        // $this->assertDatabaseHas('ClassGroup', [
        //     'nip' => $user->nip
        // ]);
        // $data = $response->getData();
        // $this->assertEquals($ClassGroup,$data[]);
    }
    // public function testGetSpesificClassGroup(): void
    // {
    //     $user = User::factory()->create([
    //         'email' => 'test1@example.com',
    //         'password' => bcrypt('password123'),
    //     ]);
    //     $class = GradeClass::create([
    //         'class_group_id' => 1,
    //         'teacher_id' =>1,
    //         'name' => 'IPA',
    //         'description' => '',
    //         'status' => 1,
    //     ]);
    //     $dataClassGroup = [
    //         'level' => 11,
    //         'name' => 'Mesin',
    //         'description' => '11 Mesin',
    //     ];
    //     $ClassGroup = ClassGroup::create($dataClassGroup);
    //     $param = [
    //         'class_group_id' => $ClassGroup->id
    //     ];
    //     $expected_data = [
    //         'status' => true,
    //         'data' => $ClassGroup,
    //         'message' => 'Data ClassGroup found'
    //     ];
    //     $response=$this->actingAs($user)->get(route('api.class_group'),$param);

    //     $response->assertStatus(200);
    //     // $response->assertJson([
    //     //     'id' => $constituency->id,
    //     //     'name' => $constituencyName
    //     // ]);
    //     // $this->assertDatabaseHas('ClassGroup', [
    //     //     'nip' => $user->nip
    //     // ]);
    //     // $data = $response->getData();
    //     // $response->assertExactJson($expected_data);
    // }
    public function testStoreClassGroup(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $dataClassGroup = [
            'level' => 11,
            'name' => 'Mesin',
            'description' => '11 Mesin',
        ];
        $response=$this->actingAs($user)->post(route('api.class_group.store'),$dataClassGroup);

        $response->assertStatus(200);
        $this->assertDatabaseHas('class_group', [
            'level' => $dataClassGroup['level']
        ]);

    }
    public function testUpdateClassGroup(): void
    {
        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt('password123'),
        ]);
        $dataClassGroup = [
            'level' => 11,
            'name' => 'Mesin',
            'description' => '11 Mesin',
        ];
        $ClassGroup = ClassGroup::create($dataClassGroup);
        $this->assertDatabaseHas('class_group', [
            'level' => $ClassGroup['level']
        ]);
        $dataClassGroupUpdate = [
            'level' => 99,
            'name' => 'Mesin',
            'description' => '11 Mesin',
        ];


        $response=$this->actingAs($user)->put(route('api.class_group.update',$ClassGroup->id),$dataClassGroupUpdate);

        $response->assertStatus(200);
        $this->assertDatabaseHas('class_group', [
            'level' => $dataClassGroupUpdate['level']
        ]);

    }
}
