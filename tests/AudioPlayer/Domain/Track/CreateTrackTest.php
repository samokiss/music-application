<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\AudioPlayer\Domain\Track\CreateTrack;
use App\AudioPlayer\Infrastructure\Persistence\InMemoryTrackRepositoryAdapter;
use App\AudioPlayer\Domain\Track\CreateTrackRequest;

class CreateTrackTest extends TestCase
{
    private CreateTrack $createTrack;

    protected function setUp(): void
    {
        $this->createTrack = new CreateTrack(new InMemoryTrackRepositoryAdapter());
    }

    public function testCreateTaskExecutionReturnTask()
    {
        $actual = $this->createTrack->execute(new CreateTrackRequest('Billie Jean', new DateTime('1982-06-25'),'pop',300,'MJ' ));

        $this->assertCount(1, InMemoryTrackRepositoryAdapter::$tracks);
        $this->assertContains($actual,InMemoryTrackRepositoryAdapter::$tracks);
    }

    public function testCreateTaskExecutionThrowException()
    {
        $this->expectException(\App\AudioPlayer\Domain\Track\TrackAlreadyAddedToPlaylist::class);

        $request = new CreateTrackRequest('Billie Jean', new DateTime('1982-06-25'),'pop',300,'MJ' );
        $this->createTrack->execute($request);
        $this->createTrack->execute($request);
    }
}
