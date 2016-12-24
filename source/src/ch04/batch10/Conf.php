<?php
declare(strict_types=1);

namespace popp\ch04\batch10;

class Conf
{
    private $file;
    private $xml;
    private $lastmatch;

/* listing 04.58 */
    public function __construct(string $file)
    {
        $this->file = $file;
        if (! file_exists($file)) {
            throw new \Exception("file '$file' does not exist");
        }
        $this->xml = simplexml_load_file($file);
    }
/* /listing 04.58 */

/* listing 04.59 */
    public function write()
    {
        if (! is_writeable($this->file)) {
            throw new \Exception("file '{$this->file}' is not writeable");
        }
        file_put_contents($this->file, $this->xml->asXML());
    }
/* /listing 04.59 */

    public function get(string $str): string
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $value)
    {
        if (! is_null($this->get($key))) {
            $this->lastmatch[0]=$value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}
