<?php

/* listing 15.14 */
// mylib/LibraryCatalogue.php

namespace popp\library;

use popp\library\inventory\Book;

class LibraryCatalogue
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }
}
/* /listing 15.14 */
