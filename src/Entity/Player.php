<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\UpScoreController;
use App\Controller\DownScoreController;

/**
 * @ApiResource(
 *     attributes={
 *       "denormalization_context"={"groups"={"player:input"}},
 *       "order"={"score": "DESC"}
 *     },
 *     itemOperations={
 *       "get",
 *       "upscore"={
 *              "method"="GET",
 *              "path"="/players/{id}/up_score.{_format}",
 *              "controller"=UpScoreController::class,
 *              "openapi_context" = {
 *                       "summary"="Increase a player's score by 1 point"
 *              }
 *         },
 *       "down_score"={
 *              "method"="GET",
 *              "path"="/players/{id}/down_score.{_format}",
 *              "controller"=DownScoreController::class,
 *              "openapi_context" = {
 *                       "summary"="Reduce a player's score by 20 points"
 *              }
 *         }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"player:input"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function __construct()
    {
        $this->score = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }
}
