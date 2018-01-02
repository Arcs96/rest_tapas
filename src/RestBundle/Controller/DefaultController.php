<?php

namespace RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RestBundle\Entity\Tapa;
use RestBundle\Form\TapaType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/ ", name="inicio")
     */
    public function indexAction()
    {
      $repository = $this->getDoctrine()->getRepository('RestBundle:Tapa');
      $tapa = $repository->findAll();
      return $this->render('RestBundle:Default:index.html.twig',array("tapas"=>$tapa));
    }

    /**
     * @Route("/forminsert", name="forminsert")
     */
    public function formAction(Request $request)
    {
        $tapa = new Tapa();
        $form = $this->createForm(TapaType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $tapa = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($tapa);
          $em->flush();

          return $this->redirectToRoute('formvalid');
    }
        return $this->render('RestBundle:Tapa:form.html.twig',array("form"=>$form->createView()));
    }

    /**
     * @Route("/formvalid", name="formvalid")
     */
    public function validateAction($id)
    {
      $tapa = new Tapa();
      $validator = $this->get('validator');
      $errors = $validator->validate($tapa);

      if (count($errors) > 0) {
        return $this->render('RestBundle:Tapa:valid.html.twig', array(
          'errors' => $errors,
        ));
      }
      return $this->redirectToRoute('inicio');
    }

   /**
    * @Route("/formdelete/{id}", name="formdelete")
    */
   public function deleteAction($id)
   {
        $em = $this->getDoctrine()->getEntityManager();
        $tapas = $em->getRepository("RestBundle:Tapa");

        $tapa = $tapas->find($id);
        $em->remove($tapa);
        $flush=$em->flush();

        if ($flush == null) {
            echo "Post se ha borrado correctamente";
        } else {
            echo "El post no se ha borrado";
        }
        return $this->render('RestBundle:Default:index.html.twig',array("tapas"=>$tapa));
    }

    /**
     * @Route("/mostrar/{id}", name="mostrar")
     */
    public function unicoAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('RestBundle:Tapa');
        $tapa = $repository->findById($id);
        return $this->render('RestBundle:Default:infoTapa.html.twig',array("tapas"=>$tapa));
    }

}
