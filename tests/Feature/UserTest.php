<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{Album, User};
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_cant_delete_albums()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);        
        $album = Album::factory()->create();
        
        $this->actingAs($user)->delete('/albums/delete/' . $album->id, ['_token' => csrf_token()]);
        
        $this->assertDatabaseHas('albums', [
            'id' => $album->id
        ]);
    }
    
    public function test_adminstrator_can_delete_albums()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
        $album = Album::factory()->create();

        $this->actingAs($user)->delete('/albums/delete/' . $album->id, ['_token' => csrf_token()]);
        
        $this->assertDatabaseMissing('albums', [
            'id' => $album->id
        ]);
    }
}