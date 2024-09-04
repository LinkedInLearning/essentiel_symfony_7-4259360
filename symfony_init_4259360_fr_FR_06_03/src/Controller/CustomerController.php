<?php

namespace App\Controller;

use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Customer;
use App\Service\MyHelper;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use App\Services\MyHelper;

class CustomerController extends AbstractController
{
    #[Route('/formcustomer', name: 'formcustomer')]
    public function index(Request $request, ManagerRegistry $doctrine, LoggerInterface $logger, MyHelper $helper)
    {
      
        $date = $helper->getTheDate();
        $customer = new Customer();
        $customerform = $this->createForm(CustomerType::class, $customer);

        $customerform->handleRequest($request);

        if($customerform->isSubmitted() && $customerform->isValid())
        {
           $entitymanager = $doctrine->getManager();
           $client = $customerform->getData();
           $logger->log('info','un client a été ajouté'); 
            
           $entitymanager->persist($client);
           $entitymanager->flush();
            
        }

        return $this->render('customer/index.html.twig', [
         'customerform' => $customerform->createview(),
         'date' => $date
        ]);
    }
}
