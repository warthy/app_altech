<?php
namespace Altech\Controller;

use Altech\Model\Repository\CandidateRepository;
use App\Component\Controller;

class CandidateController extends Controller
{
    public function index(){
        $repo = $this->getRepository(CandidateRepository::class);
        $page = $this->getRequest()->get->get("page") ?? 0;

        return $this->render('/candidate/index.php', [
            'candidates' => $repo->findAllPaginated($page),
            'page' => $page,
            'totalPage' => $repo->findPageCount()
        ]);
    }
}