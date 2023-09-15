 <?php
    require_once "./root/pdo.php";
    $titre="Mise a jour";
    if (!isset($_GET["id"]) || empty($_GET["id"])) {
        header("Location: product.php");
        exit;
    }


    $titre = "Update";
    $id = $_GET["id"];
    $sql = "SELECT * FROM produits WHERE IPRODDU=:id";
    try {
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $projet = $query->fetch();
    } catch (PDOException $e) {
        if (!$produit) {
            http_response_code(404);
            echo " C'est casser mon chef";
            exit;
        }
    }

        
    include './includes/header.php';
    include './includes/banner.php';
    ?>




 <div class="result">
     <form class="result_item" type="POST" enctype="multipart/form-data" action="update.php?id=<?= $produit['IPRODDU'] ?>">
         <label for="title">Changer le titre</label>
         <input type="text" value="<?= $produit['DPRODU'] ?>">
         <button action="submit">Valider</button>


     </form>
 </div>



 <?php
    include './includes/footer.php';
