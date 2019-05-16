<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Eden\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Book field resolver, used for GraphQL request processing
 */
class Book implements ResolverInterface
{
    /**
     * @var \Eden\GraphQl\Model\ResourceModel\Book
     */
    protected $bookResource;

    /**
     * @var \Eden\GraphQl\Model\BookFactory
     */
    protected $bookFactory;

    public function __construct(
        \Eden\GraphQl\Model\ResourceModel\Book $bookResource,
        \Eden\GraphQl\Model\BookFactory $bookFactory
    ){
        $this->bookResource = $bookResource;
        $this->bookFactory = $bookFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $bookId = $this->getBookId($args);
        $bookData = $this->getBookData($bookId);
        return $bookData;
    }

    /**
     * @param array $args
     * @return int
     * @throws GraphQlInputException
     */
    private function getBookId(array $args): int
    {
        if (!isset($args['id'])) {
            throw new GraphQlInputException(__('"Book id should be specified'));
        }

        return (int)$args['id'];
    }

    /**
     * @param int $bookId
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getBookData(int $bookId): array
    {
        $bookFactory = $this->bookFactory->create();
        $this->bookResource->load($bookFactory, $bookId);
        return $bookFactory->getData();
    }
}
