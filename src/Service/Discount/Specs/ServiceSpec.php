<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:50
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use App\Entity\Rules;

class ServiceSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $rule = $this->params['services'] ?? null;
        if (is_null($rule)) {
            return true;
        }

        $services = $item->getService();
        if (empty($services)) {
            return false;
        }

        foreach ($services as $service) {
            if (!in_array($service, $rule)) {
                return false;
            }
        }

        return true;
    }
}