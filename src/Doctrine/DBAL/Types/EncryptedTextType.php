<?php

declare(strict_types=1);

namespace Aeliot\Bundle\DoctrineEncryptedField\Doctrine\DBAL\Types;

use Aeliot\Bundle\DoctrineEncryptedField\Enum\FieldTypeEnum;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\TextType;

final class EncryptedTextType extends TextType implements EncryptedFieldLengthInterface
{
    use ValueConversionTrait;

    public function getDefaultFieldLength(AbstractPlatform $platform): ?int
    {
        return null;
    }

    public function getName(): string
    {
        return FieldTypeEnum::ENCRYPTED_TEXT;
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getBlobTypeDeclarationSQL($column);
    }
}
