<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Eden\GraphQl\Model\Resolver;

use Magento\Framework\Exception\State\InputMismatchException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Validator\Exception as ValidatorException;

/**
 * Create customer account resolver
 */
class CreateStudent implements ResolverInterface
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
        if (!isset($args['input']) || !is_array($args['input']) || empty($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }
        try {
            $data = [];
        } catch (ValidatorException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        } catch (InputMismatchException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }

        return ['customer' => $data];
    }
}
