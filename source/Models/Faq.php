<?php

namespace Source\Models;

use Source\Core\Connect;

class Faq
{
    private $id;
    private $question;
    private $answer;
    private $message;

    /**
     * @return mixed|null
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed|null $question
     */
    public function setQuestion($question): void
    {
        $this->question = $question;
    }

    /**
     * @return mixed|null
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed|null $answer
     */
    public function setAnswer($answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): void 
    {
		$this->id = $id;
	}

    /**
     * @param $question
     * @param $answer
     */
    public function __construct($id = null, $question = null, $answer = null)
    {
        $this->id = $id;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function selectAll ()
    {
        $query = "SELECT * FROM faqs";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function insert()
    {
        $query = "INSERT INTO faqs (question, answer) 
                  VALUES(:question, :answer)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":question", $this->question);
        $stmt->bindParam(":answer", $this->answer);
        $stmt->execute();
        $this->message = "FAQ cadastrada com sucesso!";
        return true;
    }

    public function insertQuestion()
    {
        $query = "INSERT INTO faqs (question) 
                  VALUES(:question)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":question", $this->question);
        $stmt->execute();
        $this->message = "Questão enviada com sucesso! Aguarde o Admin responder.";
        return true;
    }

    public function findById() : bool
    {
        $query = "SELECT * FROM faqs WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $faq = $stmt->fetch();
            $this->question = $faq->question;
            $this->answer = $faq->answer;
            return true;
        }
    }

    public function getById(?int $id)
    {
        $query = "SELECT * FROM faqs WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $idQuery = "";
        if (empty($id)) {
            $idQuery = $this->id;
        } else {
            $idQuery = $id;
        }
        $stmt->bindParam(":id", $idQuery);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        }
        return $stmt->fetch();
    }

    public function update()
    {
        $query = "UPDATE faqs SET question = :question, answer = :answer WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":question",$this->question);
        $stmt->bindParam(":answer",$this->answer);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $array= [
            "id" => $this->id,
            "question" => $this->question,
            "answer" => $this->answer
        ];

        $this->message = "Faq alterado com sucesso!";
    }

    
}