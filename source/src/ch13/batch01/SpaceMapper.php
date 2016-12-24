<?php
declare(strict_types = 1);

namespace popp\ch13\batch01;

class SpaceMapper extends Mapper
{

    private $selectStmt;
    private $selectAllStmt;
    private $updateStmt;
    private $insertStmt;
    private $findByVenueStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE id=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE space SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO space ( name, venue ) VALUES( ?, ?)"
        );

/* listing 13.14 */

        // SpaceMapper::__construct()

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM space"
        );
        $this->findByVenueStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
/* /listing 13.14 */
    }

/* listing 13.15 */
    public function getCollection(array $raw): Collection
    {
        return new SpaceCollection($raw, $this);
    }
/* /listing 13.15 */

    protected function doCreateObject(array $raw): DomainObject
    {
        $obj = new Space(
            (int)$raw['id'],
            $raw['name']
        );

        $venmapper = new VenueMapper();
        $venue = $venmapper->find((int)$raw['venue']);
        $obj->setVenue($venue);

        //$eventmapper = new EventMapper();
        //$eventcollection = $eventmapper->findBySpaceId($raw['id']);
        //$obj->setEvents($eventcollection);
        return $obj;
    }

/* listing 13.21 */

    // SpaceMapper

    protected function targetClass(): string
    {
        return Space::class;
    }
/* /listing 13.21 */

    protected function doInsert(DomainObject $object)
    {
        $venue = $object->getVenue();

        if (! $venue) {
            throw new AppException("cannot save without venue");
        }

        $values = [ $object->getname(), $venue->getId() ];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    public function update(DomainObject $object)
    {
        $values = [
            $object->getname(),
            $object->getid(),
            $object->getId()
        ];

        $this->updateStmt->execute($values);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

/* listing 13.16 */
    public function findByVenue($vid): Collection
    {
        $this->findByVenueStmt->execute([$vid]);

        return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
    }
/* /listing 13.16 */
}
