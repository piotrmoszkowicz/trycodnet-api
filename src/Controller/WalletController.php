<?php

namespace App\Controller;

use App\Entity\BlockchainWallet;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// TODO: Move getRepository to the service

final class WalletController extends AbstractFOSRestController {
    /**
     * Retrieves all wallets from database
     * @Rest\Get("/wallets")
     */
    public function getWallets(): View {
        $wallets = $this->getDoctrine()->getRepository(BlockchainWallet::Class)->findAll();

        return View::create($wallets, Response::HTTP_OK, []);
    }

    /**
     * Retrieves wallet from database by ID
     * @Rest\Get("/wallets/{walletId}")
     * @param int $walletId
     * @return View
     */
    public function getWallet(int $walletId): View {
        $wallet = $this->getDoctrine()->getRepository(BlockchainWallet::Class)->find($walletId);

        return View::create($wallet, Response::HTTP_OK);
    }

    /**
     * Adds new wallet to the database
     * @Rest\Post("/wallets")
     * @param Request $request
     * @return View
     */
    public function addWallet(Request $request): View {
        $entityManager = $this->getDoctrine()->getManager();

        $wallet = new BlockchainWallet();
        $wallet->setAddress($request->get('walletAddress'));

        $entityManager->persist($wallet);
        $entityManager->flush();

        return View::create($wallet, Response::HTTP_CREATED);
    }
}
