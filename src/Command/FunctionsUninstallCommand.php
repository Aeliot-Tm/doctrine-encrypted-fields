<?php

declare(strict_types=1);

namespace Aeliot\Bundle\DoctrineEncryptedField\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'doctrine-encrypted-field:functions:uninstall')]
final class FunctionsUninstallCommand extends FunctionsInstallationCommand
{
    protected function configure(): void
    {
        parent::configure();

        $this->setDescription('Uninstall functions');
    }

    protected function prepare(Connection $connection, string $functionName, OutputInterface $output): void
    {
        if ($this->functionManager->hasFunction($connection, $functionName)) {
            $this->functionManager->removeFunction($connection, $functionName, $output);
        }
    }
}
