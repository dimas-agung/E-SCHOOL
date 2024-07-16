<?php

namespace Tests\Feature;

use App\Models\ClassGroup;
use App\Models\GradeClass;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassApiControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // public function testGetAllClassGroup(): void
    // {
    //     $user = User::factory()->create([
    //         'email' => 'test1@example.com',
    //         'password' => bcrypt('password123'),
    //     ]);
    //     $class = GradeClass::create([
    //         'class_group_id' => 1,
    //         'teacher_id' =>1,
    //         'name' => 'IPA',
    //         'status' => 1,
    //         'description' => '',
    //     ]);
    //     $ClassGroup = ClassGroup::create([
    //         'user_id' => $user->id,
    //         'class_id' => $class->id,
    //         'nis' => '12345678',
    //         'nisn' => '12345678',
    //         'name' => 'Ahmad Wahid Pambudi',
    //         'birth' => '1978-04-01',
    //         'birth_place' => 'Jombang',
    //         'gender' => 'L',
    //         'religion' => 'Islam',
    //         'address' => 'Jombang, Jln Pahlawan no 12',
    //         'phone_number' => '08234578191',
    //         'status' => '1',
    //         // 'is_active' => $request->input(''),
    //         'join_date' => '2020-01-01',
    //     ]);

    //     $response=$this->actingAs($user)->get('/api/ClassGroup');

    //     $response->assertStatus(200);
    //     // $response->assertJson([
    //     //     'id' => $constituency->id,
    //     //     'name' => $constituencyName
    //     // ]);
    //     // $this->assertDatabaseHas('ClassGroup', [
    //     //     'nip' => $user->nip
    //     // ]);
    //     // $data = $response->getData();
    //     // $this->assertEquals($ClassGroup,$data[]);
    // }
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
    //     $ClassGroup = ClassGroup::create([
    //         'user_id' => $user->id,
    //         'class_id' => $class->id,
    //         'nis' => '12345678',
    //         'nisn' => '12345678',
    //         'name' => 'Ahmad Wahid Pambudi',
    //         'birth' => '1978-04-01',
    //         'birth_place' => 'Jombang',
    //         'gender' => 'L',
    //         'religion' => 'Islam',
    //         'address' => 'Jombang, Jln Pahlawan no 12',
    //         'phone_number' => '08234578191',
    //         'status' => '1',
    //         // 'is_active' => $request->input(''),
    //         'join_date' => '2020-01-01',
    //     ]);
    //     $param = [
    //         'ClassGroup_id' => $ClassGroup->id
    //     ];
    //     $expected_data = [
    //         'status' => true,
    //         'data' => $ClassGroup,
    //         'message' => 'Data ClassGroup found'
    //     ];
    //     $response=$this->actingAs($user)->get(route('api.ClassGroup'),$param);

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
    // public function testStoreClassGroup(): void
    // {
    //     $user = User::factory()->create([
    //         'email' => 'test@example.com',
    //         'password' => bcrypt('password123'),
    //     ]);
    //     // $class = GradeClass::create([
    //     //     'class_group_id' => 1,
    //     //     'teacher_id' =>1,
    //     //     'name' => 'IPA',
    //     //     'description' => '',
    //     //     'status' => 1
    //     // ]);
    //     $ClassGroup = [
    //         'user_id' => $user->id,
    //         'class_id' => 1,
    //         'nis' => '12345678',
    //         'nisn' => '12345678',
    //         'name' => 'Ahmad Wahid Pambudi',
    //         'birth' => '1978-04-01',
    //         'birth_place' => 'Jombang',
    //         'gender' => 'L',
    //         'religion' => 'Islam',
    //         'address' => 'Jombang, Jln Pahlawan no 12',
    //         'phone_number' => '08234578191',
    //         'status' => '1',
    //         'join_date' => '2020-01-01',
    //         // 'is_active' => $request->input(''),

    //     ];

    //     $response=$this->actingAs($user)->post(route('api.ClassGroup.store'),$ClassGroup);

    //     $response->assertStatus(200);
    //     $this->assertDatabaseHas('ClassGroup', [
    //         'nis' => $ClassGroup['nis']
    //     ]);

    // }
    // public function testUpdateClassGroup(): void
    // {
    //     $user = User::factory()->create([
    //         'email' => 'test2@example.com',
    //         'password' => bcrypt('password123'),
    //     ]);
    //     $ClassGroup = ClassGroup::create([
    //         'user_id' => $user->id,
    //         'class_id' => 1,
    //         'nis' => '12345678',
    //         'nisn' => '12345678',
    //         'name' => 'Ahmad Wahid Pambudi',
    //         'birth' => '1978-04-01',
    //         'birth_place' => 'Jombang',
    //         'gender' => 'L',
    //         'religion' => 'Islam',
    //         'address' => 'Jombang, Jln Pahlawan no 12',
    //         'phone_number' => '08234578191',
    //         'status' => '1',
    //         'join_date' => '2020-01-01',
    //         // 'is_active' => $request->input(''),

    //     ]);
    //     $this->assertDatabaseHas('ClassGroup', [
    //         'nis' => $ClassGroup['nis']
    //     ]);
    //     $data = [
    //         'user_id' => $user->id,
    //         'class_id' => 1,
    //         'nis' => '12345678',
    //         'nisn' => '12345678',
    //         'name' => 'Ahmad Wahid Pambudi',
    //         'birth' => '1978-04-01',
    //         'birth_place' => 'Jombang',
    //         'gender' => 'L',
    //         'religion' => 'Islam',
    //         'address' => 'Jombang, Jln Pahlawan no 12',
    //         'phone_number' => '08234578191',
    //         'status' => '1',
    //         'join_date' => '2020-01-01',
    //         'is_active' => 1,

    //     ];

    //     $response=$this->actingAs($user)->put(route('api.ClassGroup.update',$ClassGroup->id),$data);

    //     $response->assertStatus(200);
    //     $this->assertDatabaseHas('ClassGroup', [
    //         'nis' => $data['nis']
    //     ]);

    // }
}
