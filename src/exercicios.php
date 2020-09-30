<?php

namespace TA_NO_MUNDO_DA_DINEY;

class TaNoMundoDaDiney
{
    public $msgWelcomeDisney = ["Disney" => "Bem Vindo ao mundo da Disney"];
    public $number = [];
    public $myName = ["MyName" => "Matheus dos Santos Bonfácio"];

    function __construct()
    {
        require './layout.html';

        if (isset($_GET['option'])) {
            $this->Option();
        }
    }

    public function Option()
    {
        switch ($_GET['option']) {
            case 1:
                $this->WelcomeDisney();
                break;
            case 2:
                $this->EvenOrOdd();
                break;
            case 3:
                $this->BreakingName();
                break;
        }
    }

    public function WelcomeDisney()
    {
        $this->msgWelcomeDisney += [
            "Nickelodeon" => str_replace(
                $this->msgWelcomeDisney,
                "Disney",
                "Bem Vindo ao mundo da Nickelodeon"
            ),
        ];
        foreach ($this->msgWelcomeDisney as $element) {
            echo $element . "<br>";
        }
    }

    public function EvenOrOdd()
    {
        $this->number = ["Numero" => rand(10, 500)];
        $aux = $this->number["Numero"] % 2;

        if ($aux == 0) {
            $this->number += ["Par ou Impar" => "Par"];
        } else {
            $this->number += ["Par ou Impar" => "Impar"];
        }

        echo "Número: " . $this->number["Numero"] . "<br>";
        echo "Par ou Impar: " . $this->number["Par ou Impar"];
    }

    public function BreakingName()
    {
        $numberOfCaracters = strlen($this->myName["MyName"]);
        $this->myName += [
            // "One" => substr($this->myName, 0, 7)
            "BreakingName" => [
                "One" => substr($this->myName["MyName"], 0, 7),
                "Two" => substr($this->myName["MyName"], 8, 3),
                "Tree" => substr($this->myName["MyName"], 12, 6),
                "four" => substr(
                    $this->myName["MyName"],
                    $numberOfCaracters - 9,
                    9
                ),
            ],
        ];

        echo $this->myName["MyName"];
        foreach ($this->myName["BreakingName"] as $element) {
            echo "<br>" . $element;
        }
    }
}

$start = new TaNoMundoDaDiney();
