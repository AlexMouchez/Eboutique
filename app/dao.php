<?php

class DAO
{
    /* Paramètres de connexion à la base de données.
	 Idéalement, des getters et setters devraient être écrits pour modifier ces valeurs
	 en cas de changement de serveur.
	*/

    private $host = "db";
    private $user = "root";
    private $password = "";
    private $database = "greengarden";
    private $charset = "utf8";

    // Instance courante de la connexion à la base de données.
    private $bdd;

    // Stockage de l'erreur éventuelle renvoyée par le serveur MySQL.
    private $error;


    // Constructeur vide par défaut. (compatibilité, conformité, modifications futures)
    public function __construct()
    {
    }

    /* Méthode pour établir une connexion à la base de données. */
    public function connexion()
    {

        try {
            // Crée une connexion à MySQL en utilisant les paramètres définis.
            $this->bdd = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset, $this->user, $this->password);
        } catch (Exception $e) {
            // // En cas d'erreur, enregistre le message d'erreur et on arrête tout
            $this->error = 'Erreur : ' . $e->getMessage();
        }
    }

    /* Méthode pour exécuter une requête SQL et renvoyer les résultats sous forme de tableau. */
    public function getResults($query)
    {
        $results = array();

        // Exécute la requête SQL.
        $stmt = $this->bdd->query($query);

        if (!$stmt) {
            // En cas d'échec, enregistre les informations d'erreur.
            $this->error = $this->bdd->errorInfo();
            return false;
        } else {
            // Renvoie les résultats sous forme de tableau.
            return $stmt->fetchAll();
        }
    }

    /* Méthode pour fermer la connexion à la base de données */
    public function disconnect()
    {
        $this->bdd = null;
    }

    /* Méthode pour récupérer la dernière erreur fournie par le serveur mysql */
    public function getLastError()
    {
        return $this->error;
    }

    public function getCategories()
    {
        $sql =  'SELECT t_d_categorie.Libelle AS libelle FROM t_d_categorie';
        return $this->getResults($sql);
    }
    public function getCategorie($id)
    {
        $sql =  'SELECT t_d_categorie.Libelle AS libelle FROM t_d_categorie    INNER JOIN t_d_produit ON t_d_produit.Id_Categorie = t_d_categorie.Id_Categorie    WHERE t_d_produit.Id_Categorie LIKE :id';

        $stmt = $this->bdd->prepare($sql);


        $stmt->bindParam(':id', $id, PDO::PARAM_STR);


        if ($stmt->execute()) {
            // Si l'exécution réussit, retourne tous les résultats de la requête sous forme de tableau
            return $stmt->fetchAll();
        } else {
            // En cas d'échec de l'exécution, enregistre les informations d'erreur dans la propriété $error
            $this->error = $stmt->errorInfo();
            // Retourne false pour indiquer qu'il y a eu une erreur lors de l'exécution de la requête
            return false;
        }
    }
    public function getFournisseur($id)
    {
        $sql =  'SELECT Nom_Fournisseur  FROM t_d_fournisseur    INNER JOIN t_d_produit ON t_d_produit.Id_Fournisseur = t_d_fournisseur.Id_Fournisseur    WHERE t_d_produit.Id_Fournisseur LIKE :id';

        $stmt = $this->bdd->prepare($sql);


        $stmt->bindParam(':id', $id, PDO::PARAM_STR);


        if ($stmt->execute()) {
            // Si l'exécution réussit, retourne tous les résultats de la requête sous forme de tableau
            return $stmt->fetchAll();
        } else {
            // En cas d'échec de l'exécution, enregistre les informations d'erreur dans la propriété $error
            $this->error = $stmt->errorInfo();
            // Retourne false pour indiquer qu'il y a eu une erreur lors de l'exécution de la requête
            return false;
        }
    }
    /* Fonction pour ajouter un utilisateur dans la BDD et dans le tableau */
    public function getAddUser($selectedLogin, $selectedPassword, $selectedId_UserType)
    {
        $sql = "INSERT INTO 	t_d_user (Login, Password,Id_UserType) VALUES 	('$selectedLogin', '$selectedPassword','$selectedId_UserType')";
        return $this->getResults($sql);
    }

    public function getProduits()
    {
        $sql =  'SELECT *  FROM t_d_produit';
        return $this->getResults($sql);
    }
    public function getCatProduit($categorie)
    {
        if ($categorie != "toutes") {
            $sql =  'SELECT * FROM t_d_produit
                     LEFT JOIN t_d_categorie ON t_d_produit.Id_Categorie = t_d_categorie.Id_Categorie
                     WHERE t_d_categorie.libelle LIKE :categorie
                     OR t_d_categorie.Id_Categorie_Parent IN (
                    SELECT Id_Categorie FROM t_d_categorie WHERE libelle LIKE :categorie
                )';

            $stmt = $this->bdd->prepare($sql);
            $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        } else {
            $sql = 'SELECT * FROM t_d_produit';
            $stmt = $this->bdd->prepare($sql);
        }

        if ($stmt->execute()) {
            // Si l'exécution réussit, retourne tous les résultats de la requête sous forme de tableau
            return $stmt->fetchAll();
        } else {
            // En cas d'échec de l'exécution, enregistre les informations d'erreur dans la propriété $error
            $this->error = $stmt->errorInfo();
            // Retourne false pour indiquer qu'il y a eu une erreur lors de l'exécution de la requête
            return false;
        }
    }
    public function getOneProduits($name)
    {
        $sql = 'SELECT * FROM t_d_produit WHERE Nom_Long LIKE :name';

        // Utilisation de la requête préparée avec un paramètre lié
        $stmt = $this->bdd->prepare($sql);

        // Liage du paramètre
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la requête préparée
        $stmt->closeCursor();

        // Retourne les résultats
        return $result;
    }
    public function getCoUser($selectedLogin, $selectedPassword)
    {
        $sql = 'SELECT t_d_user.Login 
        FROM t_d_user   
        WHERE t_d_user.Login = :login
        AND t_d_user.Password = :password';

        $stmt = $this->bdd->prepare($sql);

        $stmt->bindParam(':login', $selectedLogin, PDO::PARAM_STR);
        $stmt->bindParam(':password', $selectedPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Si l'exécution réussit, retourne tous les résultats de la requête sous forme de tableau
            return $stmt->fetchAll();
        } else {
            // En cas d'échec de l'exécution, enregistre les informations d'erreur dans la propriété $error
            $this->error = $stmt->errorInfo();
            // Retourne false pour indiquer qu'il y a eu une erreur lors de l'exécution de la requête
            return false;
        }
    }
}
