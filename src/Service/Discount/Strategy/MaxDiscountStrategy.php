<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 20:22
 */

namespace App\Service\Discount\Strategy;


use App\Entity\Rules;
use Doctrine\Common\Collections\ArrayCollection;

class MaxDiscountStrategy implements MaxDiscountStrategyInterace
{
    /** @var Rules[] */
    protected $discountRules;

    public function __construct()
    {
        $this->discountRules = new ArrayCollection();
    }

    public function add(Rules $rule)
    {
        if (!$this->discountRules->contains($rule)) {
            $this->discountRules->add($rule);
        }

        return $this;
    }

    public function value() : Rules
    {
        $discountValue = 0;
        $result = new Rules();
        foreach ($this->discountRules as $discountRule) {
            if ($discountRule->getDiscountValue() >= $discountValue) {
                $discountValue = $discountRule->getDiscountValue();
                $result = $discountRule;
            }
        }

        return $result;
    }
}