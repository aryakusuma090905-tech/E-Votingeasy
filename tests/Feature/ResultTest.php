<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResultTest extends TestCase
{
    use RefreshDatabase;

    /**
     * TEST HITUNG SUARA
     */
    public function test_vote_count_increment()
    {
        $candidate = Candidate::create([
            'nomor_urut' => 1,
            'nama_ketua' => 'Ketua C',
            'nama_wakil' => 'Wakil C',
            'visi' => 'Visi C',
            'misi' => 'Misi C',
            'vote_count' => 0
        ]);

        $candidate->increment('vote_count');

        $this->assertEquals(
            1,
            $candidate->fresh()->vote_count
        );
    }

    /**
     * TEST TOTAL SUARA
     */
    public function test_total_votes()
    {
        Candidate::create([
            'nomor_urut' => 1,
            'nama_ketua' => 'Ketua D',
            'nama_wakil' => 'Wakil D',
            'visi' => 'Visi D',
            'misi' => 'Misi D',
            'vote_count' => 5
        ]);

        Candidate::create([
            'nomor_urut' => 2,
            'nama_ketua' => 'Ketua E',
            'nama_wakil' => 'Wakil E',
            'visi' => 'Visi E',
            'misi' => 'Misi E',
            'vote_count' => 3
        ]);

        $totalVotes = Candidate::sum('vote_count');

        $this->assertEquals(8, $totalVotes);
    }
}