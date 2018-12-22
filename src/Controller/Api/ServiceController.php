<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.12.18
 * Time: 20:00
 */

namespace App\Controller\Api;

use App\Entity\Service;
use App\Form\ServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/service")
 * Class ServiceController
 * @package App\Controller\Api
 */
class ServiceController extends AbstractController
{

    /**
     * @Route("/{id}", name="api_service_index", methods={"GET"})
     * @param Service $service
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Service $service, SerializerInterface $serializer)
    {
        $data = $serializer->serialize($service, 'json');
        return new Response($data);
    }

    /**
     * @Route("/", name="api_service_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function list(SerializerInterface $serializer)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository(Service::class)->findAll();
        $data = $serializer->serialize($list, 'json');
        return new Response($data);
    }

    /**
     * @Route("/", name="api_service_create", methods={"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function create(Request $request)
    {
        $form = $this->createForm(ServiceType::class);
        $form->submit($request->request->all(), true);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->json([], 201);
        }
        return $this->json($form->getErrors(), 400);
    }

    /**
     * @param Service $service
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/{id}", name="api_service_edit", methods={"PUT"})
     */
    public function edit(Service $service, Request $request, SerializerInterface $serializer)
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->submit($request->request->all(), true);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            $data = $serializer->serialize($form->getData(), 'json');
            return new Response($data);
        }
        return $this->json($form->getErrors(), 400);
    }

    /**
     * @param Service $service
     * @Route("/{id}", name="api_service_delete", methods={"DELETE"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function delete(Service $service)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($service);
        $em->flush();
        return $this->json([], 201);
    }
}