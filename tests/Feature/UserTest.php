<?
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_user()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }
}
