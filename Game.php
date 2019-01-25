<?php //classe Game.php

final class Game implements JsonSerializable
{
    private $letterBag = ['a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'b', 'b', 'c', 'c', 'd', 'd', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'f', 'f', 'g', 'g', 'h', 'h', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'j', 'k', 'l', 'l', 'l', 'l', 'l', 'm', 'm', 'm', 'n', 'n', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'p', 'p', 'q', 'r', 'r', 'r', 'r', 'r', 'r', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 'u', 'u', 'u', 'u', 'u', 'u', 'v', 'v', 'w', 'x', 'y', 'z'];
    private $letters = [];
    private $isOver = false;

    public function jsonSerialize()
    {
        return [
          "letters" => $this->getLetters()
        ];
    }

    public function __construct()
    {
        $this->letters = [];
        shuffle($this->letterBag);
        $this->letters = array_slice($this->letterBag, 0, 7);

    }

    /**
     * @return array
     */
    public function getLetters(): array
    {
        return $this->letters;
    }

    /**
     * @param array $letters
     */
    public function setLetters($letters)
    {
        $this->letters = $letters;
    }

    /**
     * @return bool
     */
    public function isOver()
    {
        return $this->isOver;
    }

    /**
     * @param bool $isOver
     */
    public function setIsOver($isOver)
    {
        $this->isOver = $isOver;
    }
}