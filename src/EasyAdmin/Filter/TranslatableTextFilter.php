<?php

declare(strict_types=1);

namespace App\EasyAdmin\Filter;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FilterDataDto;
use EasyCorp\Bundle\EasyAdminBundle\Filter\FilterTrait;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\TextFilterType;

class TranslatableTextFilter implements FilterInterface
{
    use FilterTrait;

    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setFilterFqcn(__CLASS__)
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(TextFilterType::class)
            ->setFormTypeOption('translation_domain', 'messages')
        ;
    }

    public function apply(QueryBuilder $queryBuilder, FilterDataDto $filterDataDto, ?FieldDto $fieldDto, EntityDto $entityDto): void
    {
        $alias         = $filterDataDto->getEntityAlias();
        $property      = $filterDataDto->getProperty();
        $comparison    = $filterDataDto->getComparison();
        $parameterName = $filterDataDto->getParameterName();
        $value         = $filterDataDto->getValue();

        $queryBuilder
            ->leftJoin(sprintf('%s.translations', $alias), sprintf('%s_t', $alias))
            ->andWhere(sprintf('%s_t.%s %s :%s', $alias, $property, $comparison, $parameterName))
            ->setParameter($parameterName, $value)
        ;
    }
}

