<?php
namespace Eden\GraphQl\Model;
use Magento\Framework\Model\AbstractModel;

class Student extends AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Eden\GraphQl\Model\ResourceModel\Student::class);
    }
}
