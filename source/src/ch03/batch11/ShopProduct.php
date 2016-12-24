<?php
namespace popp\ch03\batch11;

/* listing 03.30 */
class ShopProduct
{
    public $numPages;
    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;
/* /listing 03.30 */
    public $type="book";
/* listing 03.30 */

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float  $price,
        int    $numPages = 0,
        int    $playLength = 0
    ) {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
        $this->numPages          = $numPages;
        $this->playLength        = $playLength;
    }

    public function getNumberOfPages()
    {
        return $this->numPages;
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getProducer()
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }
/* /listing 03.30 */

    public function setType(string $type)
    {
        $this->type=$type;
    }
/* listing 03.31 */

    public function getSummaryLine()
    {
        $base  = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        if ($this->type == 'book') {
            $base .= ": page count - {$this->numPages}";
        } elseif ($this->type == 'cd') {
            $base .= ": playing time - {$this->playLength}";
        }
        return $base;
    }
/* /listing 03.31 */
/* listing 03.30 */
}
/* /listing 03.30 */
