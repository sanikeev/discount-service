<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.18
 * Time: 20:12
 */

namespace App\Controller\Api;


use App\Entity\Rules;
use App\Form\RuleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class RuleController
 * @package App\Controller\Api
 * @Route("/api/rule")
 */
class RuleController extends AbstractController
{
    /**
     * @Route("/{id}", name="api_rule_index", methods={"GET"})
     * @param Rules $rule
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Rules $rule)
    {
        return $this->json($rule);
    }

    /**
     * @Route("/", name="api_rule_list", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository(Rules::class)->findAll();
        return $this->json($list);
    }

    /**
     * @Route("/", name="api_rule_create", methods={"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function create(Request $request)
    {
        $form = $this->createForm(RuleType::class);
        $form->submit(json_decode($request->getContent(), true), true);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->json([], 201);
        }
        return $this->json($form->getErrors(), 400);
    }

    /**
     * @param Rules $rule
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/{id}", name="api_rule_edit", methods={"PUT"})
     */
    public function edit(Rules $rule, Request $request)
    {
        $form = $this->createForm(RuleType::class, $rule);
        $form->submit(json_decode($request->getContent(), true), true);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->json($form->getData());
        }

        return $this->json($form->getErrors(), 400);
    }

    /**
     * @param $id
     * @Route("/{id}", name="api_rule_delete", methods={"DELETE"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function delete(Rules $rule)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($rule);
        $em->flush();
        return $this->json([], 204);
    }
}