<?php

// +----------------------------------------------------------+
// | phpCodeKatas Potter                                      |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * Potter.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codingdojo.org/cgi-bin/wiki.pl?KataPotter
 */
class Potter {

    /**
     * base price for a book
     * 
     * @var int
     */
    private $_basePrice = 8;

    /**
     * base discount
     * 
     * @var float
     */
    private $_discount = 0.05;

    /**
     * returns the price of books
     * 
     * @param array $books
     * 
     * @return float
     */
    public function getPrice(array $books)
    {
        $books = $this->_validateBooks($books);

        if (empty($books)) {
            return 0;
        }

        $regularStackPrice   = $this->_calculateRegularStackPrice($books);
        $fourBooksStackPrice = $this->_calculateFourBookStackPrice($books);

        return min($regularStackPrice, $fourBooksStackPrice);
    }

    /**
     * builds biggest possible stacks and gets price
     * 
     * @param array $books
     * 
     * @return float
     */
    protected function _calculateRegularStackPrice(array $books)
    {
        $bookStacks   = array();
        $currentBooks = array();

        while ($currentBooks !== $books) {
            $currentBooks = array_unique($books);
            $books = array_diff_assoc($books, $currentBooks);
            array_push($bookStacks, $currentBooks);
        }

        return $this->_getStackPrice($bookStacks);
    }

    /**
     * builds stacks with maximum of four books and gets price
     * if next stack has also five books,  it takes max stack instead
     * 
     * @param array $books
     * 
     * @return float
     */
    protected function _calculateFourBookStackPrice(array $books)
    {
        $bookStacks   = array();
        $currentBooks = array();

        while ($currentBooks !== $books) {
            $currentBooks = array_unique($books);
            $nextBooks    = array_diff_assoc($books, $currentBooks);

            $nextStack = array_unique($nextBooks);

            if (count($currentBooks) == 5 && count($nextStack) < 5) {
                array_pop($currentBooks);
                $nextBooks = array_diff_assoc($books, $currentBooks);
            }

            $books = $nextBooks;
            array_push($bookStacks, $currentBooks);
        }
        
        return $this->_getStackPrice($bookStacks);
    }
    
    /**
     * cacculates price for book stacks
     * 
     * @param array $bookStacks
     * 
     * @return float
     */
    protected function _getStackPrice(array &$bookStacks) {
        $price = 0;

        foreach($bookStacks as $books) {
            $price += $this->_calculatePrice($books);
        }

        return $price;
    }
    
    /**
     * cleans up books array
     * 
     * @param array $books
     * 
     * @return array
     */
    protected function _validateBooks(array &$books)
    {
        $filteredBooks = array_filter($books, function ($item) use (&$books) {
            return ($item !== 0 && $item < 6);
        });

        return $filteredBooks;
    }
    
    /**
     * calculates price
     * 
     * @param array $books
     * 
     * @return float
     */
    protected function _calculatePrice(array &$books)
    {
        $price = 0;

        $discount = $this->_calculateDiscount($books);
        $price += count($books) * (1 - $discount) * $this->_basePrice;
        
        return $price;
    }

    /**
     * returns discount for books
     * 
     * @param array $books
     * 
     * @return float
     */
    protected function _calculateDiscount(array &$books)
    {
        $discount = 0;
        $countBooks = count($books);

        if ($countBooks > 3) { // more then 3 books get num of books * 5% discount
            $discount = $countBooks * $this->_discount;
        } elseif ($countBooks > 1) { // lower then 3 books get num of books - 1 discount
            $discount = ($countBooks -1) * $this->_discount;
        }

        return $discount;
    }
}