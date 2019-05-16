<?php
namespace Eden\GraphQl\Model;
use Magento\Framework\Model\AbstractModel;

class Book extends AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Eden\GraphQl\Model\ResourceModel\Book::class);
    }
}
