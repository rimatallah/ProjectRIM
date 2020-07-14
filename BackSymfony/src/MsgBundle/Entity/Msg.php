<?php

namespace MsgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use mysqli;

//(repositoryClass="MsgBundle\Repository\MsgRepository")

/**
 * Msg
 *
 * @ORM\Table(name="msg")
 * @ORM\Entity
 */
class Msg
{


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_id", type="string", length=255)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_txt", type="string", length=500)
     */
    private $msgTxt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="msg_date_time", type="datetime",nullable=true)
     */
    private $msgDateTime;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param string $userId
     *
     * @return Msg
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set msgTxt
     *
     * @param string $msgTxt
     *
     * @return Msg
     */
    public function setMsgTxt($msgTxt)
    {
        $this->msgTxt = $msgTxt;

        return $this;
    }

    /**
     * Get msgTxt
     *
     * @return string
     */
    public function getMsgTxt()
    {
        return $this->msgTxt;
    }

    /**
     * Set msgDateTime
     *
     * @param \DateTime $msgDateTime
     *
     * @return Msg
     */
    public function setMsgDateTime($msgDateTime)
    {
        $this->msgDateTime = $msgDateTime;

        return $this;
    }

    /**
     * Get msgDateTime
     *
     * @return \DateTime
     */
    public function getMsgDateTime()
    {
        return $this->msgDateTime;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getMsgTxt();
    }


    public function addMsg(Msg $msg)
    {
        /* database_host: 127.0.0.1
    database_port: null
     database_name: spearfishdb
     database_user: root
    database_password: null
    mailer_transport: smtp
     mailer_host: 127.0.0.1
     mailer_user: null
     mailer_password: null
     secret: ThisTokenIsNotSoSecretChangeIt */
        echo "11111111 \n";
        $mysqli = new mysqli("127.0.0.1", "root", null, "spearfishdb");

        /* Vérification de la connexion */
        if ($mysqli->connect_errno) {
            printf("Échec de la connexion : %s\n", $mysqli->connect_error);
            echo "echec de la connection";
            exit();
        }

        /* Requête "Select" retourne un jeu de résultats */
        $sql="insert into msg (user_id,msg_txt,msg_date_time) values ('".$msg->getUserId()."','".$msg->getMsgTxt()."','".date ("Y-m-d H:i:s")."')";
        //$sql="insert into msg (user_id,msg_txt) values ('".$msg->getUserId()."','".$msg->getMsgTxt()."')";
        if ($result = $mysqli->query($sql)) {
           // ,msg_date_time   . "','" . $msg->getMsgDateTime()
            echo "22222222 \n";

            /* Libération du jeu de résultats */
            $mysqli->close();
        }
    }
}

