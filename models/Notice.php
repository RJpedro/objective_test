<?php 

class Notice 
{

    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function store($array) {

        [
            $idNoticeApi,
            $author,
            $categories,
            $content,
            $excerpt,
            $thumb,
            $title,
            $createAt,
        ] = $array; 
        
        $status = null;

        try {    
            $SQL = " INSERT INTO notices (id_notice_api, author, categories, content, excerpt, thumb, title, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?); ";

            $stmt = $this->connection->prepare($SQL);

            $stmt->bindParam(1, $idNoticeApi);
            $stmt->bindParam(2, $author);
            $stmt->bindParam(3, $categories);
            $stmt->bindParam(4, $content);
            $stmt->bindParam(5, $excerpt);
            $stmt->bindParam(6, $thumb);
            $stmt->bindParam(7, $title);
            $stmt->bindParam(8, $createAt);
            
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
    
    public function getOneNotice($id) {

        $array  = []; 
        $status = null;

        try {    
            $SQL = "SELECT * FROM notices WHERE id = ?; ";
            
            $stmt = $this->connection->prepare($SQL);
            
            $stmt->bindParam(1, $id);

            if ($stmt->execute()) {
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getAllNotices($limit, $idsNotices) {

        $array  = []; 
        $status = null;
        $idsNotices = $this->generateInSQL($idsNotices);

        try {    

            $SQL = "SELECT * FROM notices ";
            
            if ($idsNotices !== false) $SQL .= "WHERE id_notice_api NOT IN($idsNotices) ";
            $SQL .= "ORDER BY create_at DESC ";
            if ($limit !== null && $limit !== "") $SQL .= "LIMIT $limit ";

            $stmt = $this->connection->prepare($SQL);

            if ($stmt->execute()) {
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getIdsAllNotices($array) {

        if (is_null($array)) return [[], null];

        $arrayIds = []; 
        $status = null;

        try {    
            foreach ($array[0] as $key => $value) {
                array_push($arrayIds, $value["id_notice_api"]);
            }
            $status = "Sucesso";
        } catch (Error $error) {
            $status = $error->getMessage();
        }

        return [
            $arrayIds,
            $status,
        ];
    }

    public function generateInSQL($array)
    {
        if (is_null($array) || gettype($array) === "string") return false;

        $indices = "";
        $isFirst = true;

        // ITERANDO SOBRE CADA VALOR CONTIDO NO ARRAY E SALVANDO EM UMA STRING PARA PODERMOS UTLIZAR
        foreach ($array as $key => $objeto) {
            ($isFirst === true) ? $indices .= "'" . $objeto . "'" : $indices .= ",'" . $objeto . "'";
            $isFirst === true ? $isFirst = false : null;
        }

        // REMOVENDO ASPAS DUPLAS DA STRING PARA UTILIZARMOS NO SQL
        $indices = str_replace('"', '', $indices);
        return $indices;
    }
}