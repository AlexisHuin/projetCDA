<?php
require_once "./root/pdo.php";
$titre = "Mise à jour type de produit";
include './includes/header.php';
include './includes/banner.php';
$titreArticle = "Modification";

include './includes/section.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: producttype.php");
    exit;
}

$id = $_GET["id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newNom = $_POST['DTYPRO'];

    $sql = 'UPDATE type_de_produit SET DTYPRO = :newNom WHERE ITYPRO = :id';

    try {
        $query = $db->prepare($sql);
        $query->execute([
            ':newNom' => $newNom,
            ':id' => $id
        ]);

        $message = "Modification acceptée";
    } catch (PDOException $e) {
        echo 'Erreur de la mise à jour du projet : ' . $e->getMessage();
        exit();
    }
} else {
    $sql = "SELECT * FROM type_de_produit WHERE ITYPRO = :id";

    try {
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $type = $query->fetch();
        

        if (!$type) {
            http_response_code(404);
            echo "Le type de produit n'a pas été trouvé.";
            exit;
        }
    } catch (PDOException $e) {
        echo 'Erreur lors de la récupération du type de produit : ' . $e->getMessage();
        exit;
    }
}
?>

<div class="result">
    <form class="result_item" method="POST" enctype="multipart/form-data" action="updateProductType.php?id=<?= $id ?>">
        <label for="DTYPRO">Changer le nom du type de produit</label>
        <input type="text" name="DTYPRO" value="<?= isset($newNom) ? $newNom : $type['DTYPRO'] ?>">
        <button type="submit">Valider</button>
    </form>
</div>

<?php
include './includes/footer.php';
?>
