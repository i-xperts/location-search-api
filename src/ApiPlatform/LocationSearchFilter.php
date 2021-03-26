<?php

namespace App\ApiPlatform;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;

class LocationSearchFilter extends AbstractFilter
{
    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?string $operationName = null)
    {
        if ($property !== 'search') {
            return;
        }

        $alias = $queryBuilder->getRootAliases()[0];// dd($value); die();
        $queryBuilder
            ->andWhere(sprintf('LOWER(%s.zipcode) LIKE LOWER(:search) OR LOWER(%s.location) LIKE LOWER(:search)', $alias, $alias))
            ->setParameter('search', '%'.$value.'%');
    }

    public function getDescription(string $resourceClass): array
    {
        return [
            'search' => [
                'property' => null,
                'type' => 'string',
                'required' => true,
                'openapi' => [
                    'description' => 'Search across multiple fields',
                ],
            ],
        ];
    }
}