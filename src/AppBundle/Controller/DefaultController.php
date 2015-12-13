<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contacts;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction(Request $request)
    {
        $contacts = new Contacts();
        $formContacts = $this->createForm(new ContactsType(), $contacts);

        if($request->isMethod('POST')){

            $formContacts->handleRequest($request);

            if ($formContacts->isValid()) {
                $em = $this->getDoctrine()->getManager();

                foreach($contacts->getContacts() as $el) {
                    $contact = new Contact();
                    $em->persist(
                        $contact->setEmail($el['email'])
                            ->setFirstName($el['firstName'])
                        ->setCreatedAt(new \DateTime())
                    );
                    $em->flush();
                }
                return $this->render('default/success.html.twig');
            }
            return $this->render('default/contacts-bootstrap.html.twig', array(
                'form'=>$formContacts->createView(),
                'contacts'=>$contacts,
                'posted'=>true,
            ));
        }

        return $this->render('default/contacts-bootstrap.html.twig', array(
            'form'=>$formContacts->createView(),
            'posted'=>false,
        ));

    }
}
