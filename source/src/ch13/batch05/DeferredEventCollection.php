<?php
declare(strict_types = 1);

namespace popp\ch13\batch05;

class DeferredEventCollection extends EventCollection
{
    private $stmt;
    private $valueArray;
    private $run = false;

    public function __construct(
        DomainObjectFactory $dofact,
        \PDOStatement $stmt_handle,
        array $valueArray
    ) {
        parent::__construct(null, $dofact);
        $this->stmt = $stmt_handle;
        $this->valueArray = $valueArray;
    }

    public function notifyAccess()
    {
        if (! $this->run) {
            $this->stmt->execute($this->valueArray);
            $this->raw = $this->stmt->fetchAll();
            $this->total = count($this->raw);
        }

        $this->run=true;
    }
}
