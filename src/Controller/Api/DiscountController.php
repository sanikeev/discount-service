<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.18
 * Time: 20:14
 */

namespace App\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DiscountController
 * @package App\Controller\Api
 * @Route("/api/discount")
 */
class DiscountController extends AbstractController
{

    /**
     * @Route("/", name="api_discount_index", methods={"POST"})
     */
    public function index()
    {

    }
}