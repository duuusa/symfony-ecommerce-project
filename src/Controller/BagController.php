<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BagController extends AbstractController
{

    #[Route('/bag', name: 'app_bag')]
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        //return empty array if nothing stored in the session
        $bag = $session->get('bag', []);

        $bagDatas = [];

        foreach($bag as $id => $quantity){
            $bagDatas[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $priceTotal = 0;

        foreach ($bagDatas as $data) {
            $totalData = $data['product']->getPrice() * $data['quantity'];
            $priceTotal += $totalData;
        }

        return $this->render('bag/index.html.twig', [
            'products'=> $bagDatas,
            'price' => $priceTotal
        ]);
    }

    #[Route('/bag/add/{id}', name: 'order_add')]
    public function add(SessionInterface $session, $id, ProductRepository $productRepository) {

        $bag = $session->get('bag', []);

        if(!empty($bag[$id])){
            $bag[$id]++;
        }else {
            $bag[$id]= 1;
        }

        //save quantity in bag for this session
        $session->set('bag', $bag);

        return $this->redirectToRoute('app_bag');
    }

    #[Route('/bag/delete/{id}', name: 'order_delete')]
    public function remove($id, SessionInterface $session )
    {
        $bag = $session->get('bag', []);
        if(!empty($bag[$id])){
            unset($bag[$id]);
        }

        //update of the precedent bag
        $session->set('bag', $bag);
        return $this->redirectToRoute('app_bag');
    }

    #[Route('/bag/checkout/', name: 'order_checkout')]
    public function check(SessionInterface $session )
    {
        $bag = $session->get('bag', []);
        dd($bag);
        $order = new Order();

        return $this->redirectToRoute('app_bag');
    }
}
