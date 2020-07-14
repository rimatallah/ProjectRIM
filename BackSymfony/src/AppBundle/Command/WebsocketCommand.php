<?php

namespace AppBundle\Command;




use app\MsgRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\App;
use MsgBundle\Entity\Message;

class WebsocketCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('websocket')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }
        $output->writeln('runnig websocket server on 8080');
        $app = new App('127.0.0.1', 8080);
       // $app->route('/chat', new Message($this->getContainer()), array('*'));
        $app->route('', new Message($this->getContainer()), array('*'));
        $app->run();
        $output->writeln('Command result.');
    }

}
