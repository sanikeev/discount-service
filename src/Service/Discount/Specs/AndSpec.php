<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:49
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use Doctrine\Common\Collections\ArrayCollection;

class AndSpec implements SpecInterface
{
    /** @var SpecInterface[] */
    protected $specifications;

    public function __construct()
    {
        $this->specifications = new ArrayCollection();
    }

    public function add(SpecInterface $spec) {
        if (!$this->specifications->contains($spec)) {
            $this->specifications->add($spec);
        }

        return $this;
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($item)) {
                return false;
            }
        }
        return true;
    }

}