<?php

class User
{

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function store($array)
    {

        [
            $nameUser,
            $loginUser,
            $password,
            $createAt,
        ] = $array;

        $status = null;

        try {
            $SQL = "
                INSERT INTO users (name, login, password, create_at) VALUES (?, ?, PASSWORD(?), ?);
            ";

            $stmt = $this->connection->prepare($SQL);

            $stmt->bindParam(1, $nameUser);
            $stmt->bindParam(2, $loginUser);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $createAt);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $status = "Sucesso";
            }
        } catch (Error $error) {
            $status = $error->getMessage();
        }

        return [
            $array,
            $status,
        ];
    }

    public function sign_in($array)
    {
        [
            $loginUser,
            $password,
        ] = $array;

        $arrayInfoUser = [];
        $status = null;

        try {
            $SQL = "
                SELECT * FROM users WHERE login = :login AND password = PASSWORD(:password) 
            ";

            $stmt = $this->connection->prepare($SQL);

            $stmt->bindParam(":login", $loginUser);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            if ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $arrayInfoUser = [
                    "id" => $rs->id,
                    "login" => $rs->login,
                    "name" => $rs->name,
                    "create_at" => $rs->create_at,
                ];

                $status = "Sucesso";
            }
        } catch (Error $error) {
            $status = $error->getMessage();
        }

        return [
            $arrayInfoUser,
            $status,
        ];
    }

    public function create_sessions($array)
    {
        [
            $arrayInfoUser,
            $status,
        ] = $array;

        try {
            // 3600 SEGUNDOS == 1 HORA
            $sessionTime = 3600;

            // SERVIDOR IRA MANTER A SESSÃO NO MINIMO 1 HORA
            ini_set('session.gc_maxlifetime', $sessionTime);

            // DEFININDO OS PARÂMETROS DA SESSÃO
            session_set_cookie_params($sessionTime);

            // INICIANDO A SESSÃO
            session_start();

            // CRIANDO VARIÁVEIS DE SESSÃO
            $_SESSION['idUser']     = $arrayInfoUser["id"];
            $_SESSION['nameUser']   = $arrayInfoUser["name"];
            $_SESSION['loginUser']  = $arrayInfoUser["login"];
        } catch (Error $error) {
            $status = $error->getMessage();
        }

        return [
            $arrayInfoUser,
            $status,
        ];
    }

    public function delete_sessions()
    {
        $status = null;

        try {
            session_start();

            if (isset($_SESSION["idUser"])) unset($_SESSION["idUser"]);
            if (isset($_SESSION["nameUser"])) unset($_SESSION["nameUser"]);
            if (isset($_SESSION["loginUser"])) unset($_SESSION["loginUser"]);

            $status = "Sucesso";
        } catch (Error $error) {
            $status = $error->getMessage();
        }

        return $status;
    }
}
