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
 * Student field resolver, used for GraphQL request processing
 */
class Student implements ResolverInterface
{
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
        $studentId = $this->getStudentId($args);
        $studentData = $this->getStudentData($studentId);

        return $studentData;
    }

    /**
     * @param array $args
     * @return int
     * @throws GraphQlInputException
     */
    private function getStudentId(array $args): int
    {
        if (!isset($args['id'])) {
            throw new GraphQlInputException(__('"Student id should be specified'));
        }

        return (int)$args['id'];
    }

    /**
     * @param int $studentId
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getStudentData(int $studentId): array
    {
        return [];
    }
}
