<?php

namespace Tests\Feature;

use App\Models\GradeClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentApiControllerTest extends TestCase
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
    public function testGetAllStudent(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);
        $class = GradeClass::create([
            'class_group_id' => 1,
            'teacher_id' =>1,
            'name' => 'IPA',
            'status' => 1,
            'description' => '',
        ]);
        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => $class->id,
            'nis' => '12345678',
            'nisn' => '12345678',
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

        $response=$this->actingAs($user)->get('/api/student');

        $response->assertStatus(200);
        // $response->assertJson([
        //     'id' => $constituency->id,
        //     'name' => $constituencyName
        // ]);
        // $this->assertDatabaseHas('student', [
        //     'nip' => $user->nip
        // ]);
        // $data = $response->getData();
        // $this->assertEquals($student,$data[]);
    }
    public function testGetSpesificStudent(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);
        $class = GradeClass::create([
            'class_group_id' => 1,
            'teacher_id' =>1,
            'name' => 'IPA',
            'description' => '',
            'status' => 1,
        ]);
        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => $class->id,
            'nis' => '12345678',
            'nisn' => '12345678',
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
            'student_id' => $student->id
        ];
        $expected_data = [
            'status' => true,
            'data' => $student,
            'message' => 'Data student found'
        ];
        $response=$this->actingAs($user)->get(route('api.student'),$param);

        $response->assertStatus(200);
        // $response->assertJson([
        //     'id' => $constituency->id,
        //     'name' => $constituencyName
        // ]);
        // $this->assertDatabaseHas('student', [
        //     'nip' => $user->nip
        // ]);
        // $data = $response->getData();
        // $response->assertExactJson($expected_data);
    }
    public function testStoreStudent(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        // $class = GradeClass::create([
        //     'class_group_id' => 1,
        //     'teacher_id' =>1,
        //     'name' => 'IPA',
        //     'description' => '',
        //     'status' => 1
        // ]);
        $student = [
            'user_id' => $user->id,
            'class_id' => 1,
            'nis' => '12345678',
            'nisn' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            'join_date' => '2020-01-01',
            // 'is_active' => $request->input(''),

        ];

        $response=$this->actingAs($user)->post(route('api.student.store'),$student);

        $response->assertStatus(200);
        $this->assertDatabaseHas('student', [
            'nis' => $student['nis']
        ]);

    }
    public function testUpdateStudent(): void
    {
        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt('password123'),
        ]);
        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => 1,
            'nis' => '12345678',
            'nisn' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            'join_date' => '2020-01-01',
            // 'is_active' => $request->input(''),

        ]);
        $this->assertDatabaseHas('student', [
            'nis' => $student['nis']
        ]);
        $data = [
            'user_id' => $user->id,
            'class_id' => 1,
            'nis' => '12345678',
            'nisn' => '12345678',
            'name' => 'Ahmad Wahid Pambudi',
            'birth' => '1978-04-01',
            'birth_place' => 'Jombang',
            'gender' => 'L',
            'religion' => 'Islam',
            'address' => 'Jombang, Jln Pahlawan no 12',
            'phone_number' => '08234578191',
            'status' => '1',
            'join_date' => '2020-01-01',
            'is_active' => 1,

        ];

        $response=$this->actingAs($user)->put(route('api.student.update',$student->id),$data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('student', [
            'nis' => $data['nis']
        ]);

    }

}
