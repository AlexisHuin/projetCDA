<?php
require_once "./root/pdo.php";
$titre = "Mise à jour type de produit";
include './includes/header.php';
include './includes/banner.php';
$titreArticle = "Modification";

include './includes/section.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: product.php");
    exit;
}

$id = $_GET["id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newNom = $_POST['DPRODU'];
    $newPrice = $_POST['PUVEN'];

    $sql = 'UPDATE produits SET DPRODU = :newNom, PUVEN = :newPrice WHERE IPRODDU = :id';

    try {
        $query = $db->prepare($sql);
        $query->execute([
            ':newNom' => $newNom,
            ':newPrice' => $newPrice,
            ':id' => $id
        ]);

        $message = "Modification acceptée";
    } catch (PDOException $e) {
        echo 'Erreur de la mise à jour du projet : ' . $e->getMessage();
        exit();
    }
} else {
    $sql = "SELECT * FROM produits WHERE IPRODDU = :id";

    try {
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $type = $query->fetch();
        

        if (!$type) {
            http_response_code(404);
            echo "Le produit n'a pas été trouvé.";
            exit;
        }
    } catch (PDOException $e) {
        echo 'Erreur lors de la récupération du type de produit : ' . $e->getMessage();
        exit;
    }
}
?>

<div class="result">
    <form class="result_item" method="POST" enctype="multipart/form-data" action="updateProduct.php?id=<?= $id ?>">
        <label for="DPRODU">Changer le nom du produit</label>
        <input type="text" name="DPRODU" value="<?= isset($newNom) ? $newNom : $type['DPRODU'] ?>">
        <label for="PUVEN">Changer le prix</label>
        <input type="number" step="0.01" name="PUVEN" value="<?= isset($newPrice) ? $newPrice : $type['PUVEN'] ?>">
        <button type="submit">Valider</button>
    </form>
</div>

<?php
include './includes/footer.php';
?>
