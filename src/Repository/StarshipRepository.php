<?php

namespace App\Repository;

use App\Model\StarShip;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

class StarshipRepository
{

    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * @return StarShip[]
     */
    public function findAllStarship(): array
    {
        $this->logger->info(" Starship Collection has been collected ");

        return [
            new StarShip(
                1,
                "Le Charles de Gaulle",
                "AL",
                "Lieutenant Albert",
               StarshipStatusEnum::COMPLETED
            ),
            new StarShip(
                2,
                "1ère Division Française Libre",
                "BS",
                "Capitaine Cédric",
                StarshipStatusEnum::WAITING
            ),
            new StarShip(
                3,
                "Amiral de Tours",
                "CZ",
                "Adjudant Mesmer",
               StarshipStatusEnum::IN_PROGRESS
            )
        ];
    }

    public function find(int $id): ?StarShip
    {
        foreach ($this->findAllStarship() as $starship) {
            if ($starship->getId() == $id) return $starship;
        }
        return null;
    }

}