<?php

namespace App\Controller;

use App\Entity\BlockchainWallet;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class WalletController extends AbstractFOSRestController {
    /**
     * Retrives all wallets from database
     * @Rest\Get("/wallets")
     */
    public function getWallets(): View {
        $repository = $this->getDoctrine()->getRepository(BlockchainWallet::Class);

        $wallets = $repository->findAll();

        return View::create($wallets, Response::HTTP_OK, []);
    }
}
