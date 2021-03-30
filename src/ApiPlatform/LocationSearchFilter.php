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

        $zipcode = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        $searchterm = trim(preg_replace('/[0-9]+/', '', $value));

        $alias = $queryBuilder->getRootAliases()[0]; // dd($zipcode, $searchterm); die();
        $queryBuilder
            ->andWhere(sprintf('LOWER(%s.zipcode) LIKE LOWER(:zipsearch) AND LOWER(%s.location) LIKE LOWER(:textsearch)', $alias, $alias))
            ->setParameter('zipsearch', '%'.$zipcode.'%')
            ->setParameter('textsearch', '%'.$searchterm.'%');
    }

    public function getDescription(string $resourceClass): array
    {
        return [
            'search' => [
                'property' => null,
                'type' => 'string',
                'required' => false,
                'openapi' => [
                    'description' => 'Search across multiple fields',
                ],
            ],
        ];
    }
}