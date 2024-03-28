<?php

declare(strict_types=1);

namespace Aeliot\Bundle\DoctrineEncryptedField\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use Aeliot\Bundle\DoctrineEncryptedField\Enum\FieldTypeEnum;

final class EncryptedStringType extends StringType implements EncryptedFieldLengthInterface
{
    use ValueConversionTrait;

    public function getDefaultFieldLength(AbstractPlatform $platform): ?int
    {
        return 255;
    }

    public function getName(): string
    {
        return FieldTypeEnum::ENCRYPTED_STRING;
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getBinaryTypeDeclarationSQL($column);
    }
}
