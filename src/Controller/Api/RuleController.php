<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.18
 * Time: 20:12
 */

namespace App\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RuleController
 * @package App\Controller\Api
 * @Route("/api/rule")
 */

class RuleController extends AbstractController
{
    /**
     * @Route("/{id}", name="api_rule_index", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index($id)
    {
        return $this->json("index");
    }

    /**
     * @Route("/", name="api_rule_list", methods={"GET"})
     */
    public function list()
    {

    }

    /**
     * @Route("/", name="api_rule_create", methods={"POST"})
     */
    public function create()
    {

    }

    /**
     * @param int $id
     * @Route("/{id}", name="api_rule_edit", methods={"PUT"})
     */
    public function edit(int $id)
    {

    }

    /**
     * @param $id
     * @Route("/{id}", name="api_rule_delete", methods={"DELETE"})
     */
    public function delete($id)
    {

    }
}