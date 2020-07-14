<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 18/05/2020
 * Time: 00:18
 */

namespace MsgBundle\Entity;

use MsgBundle\Repository\MsgRepository;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Message implements MessageComponentInterface
{
    protected $connections = array();

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * When a new connection is opened it will be passed to this method
     * @param ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn)
    {
        $this->connections[] = $conn;
        //$conn->send('..:: Hello from the Notification Center ::..');
        echo "New connection \n";
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn)
    {
        foreach ($this->connections as $key => $conn_element) {
            if ($conn === $conn_element) {
                unset($this->connections[$key]);
                break;
            }
        }
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param ConnectionInterface $conn
     * @param \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->send("Error : " . $e->getMessage());
        $conn->close();
    }

    /**
     * Triggered when a client sends data through the socket
     * @param \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
     * @param string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $from, $msg)
    {
        $m = new Msg;
        $data = json_decode($msg);
            if($data->action =='message') {
                echo "******";
                $m->setMsgTxt($data->message);
                $m->setUserId($data->user);
                $m->addMsg($m);
                echo $m."\n";
            }
        foreach ($this->connections as $key => $conn) {
            $conn->send((string)$msg);
            echo "on message" . $msg . "\n";
        }
    }
}
