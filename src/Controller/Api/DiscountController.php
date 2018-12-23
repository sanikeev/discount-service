<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.18
 * Time: 20:14
 */

namespace App\Controller\Api;


use App\Entity\Rules;
use App\Form\OrderType;
use App\Service\Discount\DiscountService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DiscountController
 * @package App\Controller\Api
 * @Route("/api/discount")
 */
class DiscountController extends AbstractController
{

    /**
     * @Route("", name="api_discount_index", methods={"POST"})
     * @param Request $request
     * @param DiscountService $service
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Request $request, DiscountService $service)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Rules[] $ruleList */
        $ruleList = $em->getRepository(Rules::class)->findAll();
        $form = $this->createForm(OrderType::class);
        $form->submit(json_decode($request->getContent(), true), true);
        if ($form->isSubmitted() && $form->isValid()) {
            $rule = $service->getDiscount($form->getData(), $ruleList);
            return $this->json([
                'discount' => $rule->getDiscountValue(),
                'title' => $rule->getTitle()
            ]);
        }
        return $this->json($form->getErrors(), 400);
    }
}