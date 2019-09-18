<?php

namespace App\Controller;

use App\Entity\BlockchainTransaction;
use App\Entity\BlockchainWallet;
use Doctrine\Common\Collections\Criteria;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// TODO: Move getRepository to the service

final class TransactionController extends AbstractFOSRestController
{
    /**
     * Updates transaction details
     * @Rest\Put("/transaction")
     * @param Request $request
     * @return View
     * @throws \Exception
     */
    public function putTransaction(Request $request): View
    {
        $entityManager = $this->getDoctrine()->getManager();

        $wallet = $this->getDoctrine()->getRepository(BlockchainWallet::Class)->findOneBy(['address' => $request->get('trackedWalletId')]);
        $transactions = $wallet->getBlockchainTransactions();

        $transactionId = $request->get('transactionId');

        $criteria = Criteria::create()->where(Criteria::expr()->eq('transaction_id', $transactionId));

        $filteredTransactions = $transactions->matching($criteria);

        $transaction = null;

        if (count($filteredTransactions) > 0) {
            $transaction = $filteredTransactions[0];
            $transaction->setNumOfConfirmations($request->get('numberOfConfirmations'));

        } else {
            $date = new \DateTime();
            $date->setTimestamp($request->get('date'));
            $transaction = new BlockchainTransaction();
            $transaction->setAddressesOutput($request->get('addressesOutput'));
            $transaction->setAddressesInput($request->get('addressesInput'));
            $transaction->setAmount($request->get('amount'));
            $transaction->setDate($date);
            $transaction->setTransactionId($request->get('transactionId'));
            $transaction->setNumOfConfirmations($request->get('numberOfConfirmations'));
            $transaction->setTransactionType($request->get('transactionType'));
            $wallet->addBlockchainTransaction($transaction);
            $entityManager->persist($transaction);
        }

        $entityManager->flush();

        return View::create($filteredTransactions, Response::HTTP_OK);
    }
}
