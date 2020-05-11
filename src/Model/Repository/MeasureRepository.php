<?php
namespace Altech\Model\Repository;

use Altech\Controller\ClientController;
use Altech\Model\Entity\Measure;
use Altech\Model\Entity\Candidate;
use Altech\Model\Entity\EntityInterface;
use Altech\Model\Entity\User;
use App\Component\Repository;
use PDO;


class MeasureRepository extends Repository
{
    const TABLE_NAME = "measure";
    const ENTITY = Measure::class;

    public function findById(int $id): Measure
    {
        /** @var Measure $measure */
        $measure = parent::findById($id);
        $stmt = $this->pdo->prepare('SELECT * FROM ' . CandidateRepository::TABLE_NAME . ' WHERE id = :id');
        $stmt->execute(["id" => $measure->getCandidate_id()]);

        $measure->setCandidate($stmt->fetchObject(CandidateRepository::ENTITY));
        return $measure;
    }

    public function findAllOfUser(User $client) {
        $stmt = $this->pdo->prepare('SELECT * FROM '. self::TABLE_NAME .' WHERE client_id = :client_id ORDER BY date_measured DESC');
        $stmt->bindValue(':client_id', $client->getId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }


    public function findAllByCandidateId(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE candidate_id = :candidate_id ORDER BY date_measured DESC');
        $stmt->bindValue(':candidate_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::ENTITY);
    }

    

    /**
     * @param Measure $measure
     * @return Measure
     */
    public function insert($measure): Measure
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO' . self::TABLE_NAME . 
            '(heartbeat, temperature, conductivity, visual_unexpected_reflex, visual_expected_reflex, sound_unexpected_reflex, sound_expected_reflex, tonality_recognition, date_measured, candidate_id, client_id' .
            'VALUES (:heartbeat, :temperature, :conductivity, :visual_unexpected_reflex, :visual_expected_reflex, :sound_unexpected_reflex, :sound_expected_reflex, :tonality_recognition, :date_measured, :candidate_id, :client_id)'
        );

        

        $stmt->execute([
            'heartbeat' => $measure->getHeartBeat(),
            'temperature' => $measure->getTemperature(),
            'conductivity' => $measure->getConductivity(),
            'visual_unexpected_reflex' => $measure->getVisualUnexpectedReflex(),
            'visual_expected_reflex' => $measure->getVisualExpectedReflex(),
            'sound_unexpected_reflex' => $measure->getSoundUnexpectedReflex(),
            'sound_expected_reflex' => $measure->getSoundExpectedReflex(),
            'tonality_recognition' => $measure->getTonalityRecognition(),
            'date_measured' => $measure->getDate_measured(),
            'candidate_id' => $measure->getCandidate()->getId(),
            'client_id' => $measure->getClient_id()
        ]);
        
        $measure->setId($this->pdo->lastInsertId());
        return $measure;        
    }

    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }

    public function delete(Measure $measure): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM ' . self::TABLE_NAME .
        'WHERE id = :id'
        );

        $stmt->execute([
            'id' => $measure->getId()
        ]);

        //delete measure object ?
    }

    
}