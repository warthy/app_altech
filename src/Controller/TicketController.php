<?php

namespace Altech\Controller;

use Altech\Model\Entity\Ticket;
use Altech\Model\Repository\TicketMessageRepository;
use Altech\Model\Repository\TicketRepository;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use DateTime;
use Exception;

class TicketController extends Controller
{
    public function panel()
    {
        /** @var TicketRepository $repo */
        $repo = $this->getRepository(TicketRepository::class);
        $client = $this->getUser();

        return Security::hasPermission(Security::ROLE_ADMIN) ?
            $this->render('/ticket/admin.php', [
               'title' => "Administration des tickets"
            ])
            :
            $this->render('/ticket/client.php', [
            'title' => 'Gestion des tickets',
            'tickets' => $repo->findAllByClient($client)
        ]);
    }

    public function view($id)
    {
        /** @var TicketRepository $ticketRepo */
        $ticketRepo = $this->getRepository(TicketRepository::class);
        /** @var TicketMessageRepository $messageRepo */
        $messageRepo = $this->getRepository(TicketMessageRepository::class);
        /** @var Ticket $ticket */
        $ticket = $ticketRepo->findById($id);


        if ($ticket) {
            $user = $this->getUser();
            if ($ticket->getClientId() === $user->getId() || Security::hasPermission(Security::ROLE_ADMIN)) {
                if (!is_null($ticket->getAdminId())) {
                    $userRepo = $this->getRepository(UserRepository::class);
                    $ticket->setAdmin($userRepo->findById($ticket->getAdminId()));
                }

                return $this->render('/ticket/view.php', [
                    "title" => "ticket $id : " . $ticket->getSubject(),
                    "ticket" => $ticket,
                    "messages" => $messageRepo->findAllByTicket($ticket)
                ]);
            }
        }
        throw new Exception("Invalid id: $id");
    }

    public function open()
    {
        $req = $this->getRequest();
        $client = $this->getUser();
        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;

            if (!empty($form->get("description")) && !empty($form->get("subject"))) {
                $repo = $this->getRepository(TicketRepository::class);

                $ticket = (new Ticket())
                    ->setDescription($form->get("description"))
                    ->setSubject($form->get("subject"))
                    ->setClientId($client->getId())
                    ->setClosed(false)
                    ->setOpenAt(new DateTime());

                $repo->insert($ticket);
                $this->redirect('/ticket/' . $ticket->getId());
            }
        }

        return $this->render("/ticket/open.php", [
            "title" => "Ouverture d'un ticket"
        ]);
    }

    public function close($id)
    {
        $repo = $this->getRepository(TicketRepository::class);
        /** @var Ticket $ticket */
        $ticket = $repo->findById($id);

        if ($ticket && !$ticket->isClosed()) {
            $admin = $this->getUser();
            if ($ticket->getAdminId() === $admin->getId()) {
                $ticket->setClosed(true);
                $repo->update($ticket);

                $this->redirect("/ticket/$id");
            }
        }
        throw new Exception("Invalid id: $id");

    }

    public function assign($id)
    {
        $repo = $this->getRepository(TicketRepository::class);
        /** @var Ticket $ticket */
        $ticket = $repo->findById($id);

        if ($ticket && !$ticket->getAdminId()) {
            $ticket->setAdminId($this->getUser()->getId());
            $repo->update($ticket);

            $this->redirect("/ticket/$id");

        }
        throw new Exception("Invalid id: $id");

    }
}