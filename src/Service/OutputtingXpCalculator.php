<?php

namespace App\Service;

use App\Character\Character;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

#[AsDecorator(xpCalculator::class)]
class OutputtingXpCalculator implements xpCalculatorInterface
{
    public function __construct(
        private readonly xpCalculatorInterface $innerCalculator)
    {

    }

    public function addXp(Character $winner, int $enemyLevel): void
    {
        $beforeLevel = $winner->getLevel();

        $this->innerCalculator->addXp($winner, $enemyLevel);

        $afterLevel = $winner->getLevel();
        if ($afterLevel > $beforeLevel) {
            $output = new ConsoleOutput();
            $output->writeln('--------------------------------');
            $output->writeln('<bg=green;fg=white>Congratulations! You\'ve leveled up!</>');
            $output->writeln(sprintf('You are now level "%d"', $winner->getLevel()));
            $output->writeln('--------------------------------');
        }
    }
}
