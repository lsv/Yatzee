<?php
namespace Lsv\Yatzee;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class YatzeeCommand.
 *
 * @codeCoverageIgnore
 */
class YatzeeCommand extends Command
{
    /**
     * Dice types
     *
     * @var Types
     */
    private $types;

    /**
     * Construct
     *
     * @param Types $types
     */
    public function __construct(Types $types)
    {
        $this->types = $types;
        parent::__construct('yatzee');
    }

    /**
     * Configure the command
     *
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('yatzee')
            ->setDescription('Roll the dice')
            ->addOption(
                'rolls',
                'r',
                InputOption::VALUE_OPTIONAL,
                'How many times do you want to throw the dices?',
                1000000
            )
            ->addOption(
                'dicesize',
                's',
                InputOption::VALUE_OPTIONAL,
                'How many sides does the dice have',
                6
            );
    }

    /**
     * {@inheritdoc}
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numDices = 6;
        for ($r = 0; $r < $input->getOption('rolls'); ++$r) {
            $dices = [];
            for ($i = 1; $i <= $numDices; ++$i) {
                $dices[$i] = mt_rand(1, 6);
            }

            foreach ($this->types->getTypes() as $type) {
                if ($type->isValid($numDices) && $type->count($r, $dices, $input->getOption('dicesize'))) {
                    continue 2;
                }
            }
        }

        /**
         * @var $tableData OutputData[]
         */
        $tableData = [];
        foreach ($this->types->getTypes() as $type) {
            if ($type->canWrite()) {
                $tableData[] = $type->write(
                    $input->getOption('rolls'),
                    new OutputData(
                        $type->getName(),
                        ['<info>Dice</info>', '<info>Times</info>', '<info>Percent</info>']
                    )
                );
            }
        }

        foreach ($tableData as $data) {
            $table = new Table($output);
            $table->setHeaders(
                [
                [new TableCell($data->getName(), ['colspan' => 3])],
                $data->getHeaders(),
                ]
            );
            $table->addRows($data->getRows());
            $table->addRow(new TableSeparator());
            $table->addRow(['<info>First</info>', $data->getFirst()]);
            $table->addRow(['<info>Total</info>', $data->getTotal(), $data->getTotalPercent()]);
            $table->render();
        }
    }
}
