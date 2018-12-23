<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RulesRepository")
 */
class Rules
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json", length=500, nullable=true)
     */
    private $ruleParam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discountValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRuleParam()
    {
        return $this->ruleParam;
    }

    /**
     * @param mixed $ruleParam
     * @return Rules
     */
    public function setRuleParam($ruleParam)
    {
        $this->ruleParam = $ruleParam;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Rules
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    /**
     * @param mixed $discountValue
     * @return Rules
     */
    public function setDiscountValue($discountValue)
    {
        $this->discountValue = $discountValue;

        return $this;
    }
}
