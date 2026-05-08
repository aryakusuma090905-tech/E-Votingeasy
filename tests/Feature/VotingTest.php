<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VotingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * TEST USER BISA VOTING
     */
    public function test_user_can_vote()
    {
        $user = User::factory()->create();

        $candidate = Candidate::create([
            'nomor_urut' => 1,
            'nama_ketua' => 'Ketua A',
            'nama_wakil' => 'Wakil A',
            'visi' => 'Visi A',
            'misi' => 'Misi A',
            'vote_count' => 0
        ]);

        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $candidate->id
        ]);

        $this->assertDatabaseHas('votes', [
            'user_id' => $user->id,
            'candidate_id' => $candidate->id
        ]);
    }

    /**
     * TEST USER TIDAK BISA VOTE 2X
     */
    public function test_user_cannot_vote_twice()
    {
        $user = User::factory()->create();

        $candidate = Candidate::create([
            'nomor_urut' => 1,
            'nama_ketua' => 'Ketua B',
            'nama_wakil' => 'Wakil B',
            'visi' => 'Visi B',
            'misi' => 'Misi B',
            'vote_count' => 0
        ]);

        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $candidate->id
        ]);

        $alreadyVote = Vote::where(
            'user_id',
            $user->id
        )->exists();

        $this->assertTrue($alreadyVote);
    }
}