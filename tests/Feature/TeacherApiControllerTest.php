<?php

namespace Tests\Feature;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherApiControllerTest extends TestCase
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
    public function testGetAllTeacher(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'nip' => '12345678',
            'nuptk' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ]);

        $response=$this->actingAs($user)->get(route('api.teacher'));

        $response->assertStatus(200);
        // $response->assertJson([
        //     'id' => $constituency->id,
        //     'name' => $constituencyName
        // ]);
        // $this->assertDatabaseHas('teacher', [
        //     'nip' => $user->nip
        // ]);
        // $data = $response->getData();
        // $this->assertEquals($teacher,$data[]);
    }
    public function testGetSpesificTeacher(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'nip' => '12345678',
            'nuptk' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ]);
        $param = [
            'teacher_id' => $teacher->id
        ];
        $expected_data = [
            'status' => true,
            'data' => $teacher,
            'message' => 'Data teacher found'
        ];
        $response=$this->actingAs($user)->get(route('api.teacher'),$param);

        $response->assertStatus(200);
        // $response->assertJson([
        //     'id' => $constituency->id,
        //     'name' => $constituencyName
        // ]);
        // $this->assertDatabaseHas('teacher', [
        //     'nip' => $user->nip
        // ]);
        // $data = $response->getData();
        // $response->assertExactJson($expected_data);
    }
    public function testStoreTeacher(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $data = [
            'user_id' => $user->id,
            'nip' => '12345678',
            'nuptk' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ];

        $response=$this->actingAs($user)->post(route('api.teacher.store'),$data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('teacher', [
            'nip' => $data['nip']
        ]);

    }
    public function testUpdateTeacher(): void
    {
        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt('password123'),
        ]);
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'nip' => '123456781',
            'nuptk' => '123456781',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ]);
        $this->assertDatabaseHas('teacher', [
            'nip' => $teacher['nip']
        ]);
        $data = [
            'user_id' => $user->id,
            'nip' => '1',
            'nuptk' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            // 'is_active' => $request->input(''),
            'join_date' => '2020-01-01',
        ];

        $response=$this->actingAs($user)->put(route('api.teacher.update',$teacher->id),$data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('teacher', [
            'nip' => $data['nip']
        ]);

    }

}
