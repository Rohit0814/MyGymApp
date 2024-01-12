<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class InstructorTest extends TestCase
{
    use RefreshDatabase;
    public function test_instructor_is_redirect_to_instructor_dashboard(){
        $user = User::factory()->create([
            'role' => 'instructor',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertRedirect(route('instructor.dashboard'));
    }
}
