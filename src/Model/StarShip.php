<?php

namespace App\Model;

class StarShip
{

    public function __construct(
        private int $id,
        private string $name,
        private string $class,
        private string $captain,
        private StarshipStatusEnum $status,

    ){
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getCaptain(): string
    {
        return $this->captain;
    }

    /**
     * @param string $captain
     */
    public function setCaptain(string $captain): void
    {
        $this->captain = $captain;
    }

    /**
     * @return StarshipStatusEnum
     */
    public function getStatus(): StarshipStatusEnum
    {
        return $this->status;
    }

    /**
     * @param StarshipStatusEnum $status
     */
    public function setStatus(StarshipStatusEnum $status): void
    {
        $this->status = $status;
    }

    public function getStatusString() :string
    {
        return $this->status->value;
    }

    public function getImageFile(): string
    {
        return match ($this->status) {
            StarshipStatusEnum::WAITING => 'images/status-waiting.png',
            StarshipStatusEnum::IN_PROGRESS => 'images/status-in-progress.png',
            StarshipStatusEnum::COMPLETED => 'images/status-complete.png',
        };

    }

}