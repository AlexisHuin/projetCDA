<?php
require_once "./root/pdo.php";
$titre = "Mise à jour type de produit";
include './includes/header.php';
include './includes/banner.php';
$titreArticle = "Modification";

include './includes/section.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: producteur.php");
    exit;
}

$id = $_GET["id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newReason = $_POST['RSOPRO'];
    $newRespons = $_POST['NPRRES'];
    $newTel = $_POST['TPRODU'];
    $newMail = $_POST['MPRODU'];
    $newAdress = $_POST['APOPRO'];
    $newGps = $_POST['CGPPRO'];

    $sql = 'UPDATE producteur SET RSOPRO = :newReason, NPRRES = :newRespons, TPRODU = :newTel, MPRODU = :newMail, APOPRO = :newAdress, CGPPRO = :newGps WHERE IPRODU = :id';

    try {
        $query = $db->prepare($sql);
        $query->execute([
            
            'newReason' => $newReason,
            ':newRespons' => $newRespons,
            'newTel' => $newTel,
            'newMail' => $newMail,
            'newAdress' => $newAdress,
            'newGps' => $newGps,
            ':id' => $id
        ]);

        $message = "Modification acceptée";
    } catch (PDOException $e) {
        echo 'Erreur de la mise à jour du projet : ' . $e->getMessage();
        exit();
    }
} else {
    $sql = "SELECT * FROM producteur WHERE IPRODU = :id";

    try {
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $producteur = $query->fetch();
        

        if (!$producteur) {
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
  <!-- $sql = 'UPDATE producteur SET RSOPRO = :newReason, NPRRES = :newRespons, TPRODU = :newTel, MPRODU = :newMail, APOPRO = :newAdress, CGPPRO = :newGps WHERE IPRODU = :id'; -->
<div class="result">
    <form class="result_item" method="POST" enctype="multipart/form-data" action="updateProductor.php?id=<?= $id ?>">
        <label for="RSOPRO">Modifier raison sociale</label>
        <input type="text" name="RSOPRO" value="<?= isset($newReason) ? $newReason : $producteur['RSOPRO'] ?>">

        <label for="RSOPRO">Modifier nom</label>
        <input type="text" name="NPRRES" value="<?= isset($newRespons) ? $newRespons : $producteur['NPRRES'] ?>">

        <label for="RSOPRO">Modifier tel</label>
        <input type="text" name="TPRODU" value="<?= isset($newTel) ? $newTel : $producteur['TPRODU'] ?>">

        <label for="RSOPRO">Modifier mail</label>
        <input type="text" name="MPRODU" value="<?= isset($newMail) ? $newMail : $producteur['MPRODU'] ?>">

        <label for="RSOPRO">Modifier adresse postal</label>
        <input type="text" name="APOPRO" value="<?= isset($newAdress) ? $newAdress : $producteur['APOPRO'] ?>">

        <label for="RSOPRO">Modifier GPS</label>
        <input type="text" name="CGPPRO" value="<?= isset($newGps) ? $newGps : $producteur['CGPPRO'] ?>">

        <button type="submit">Valider</button>
    </form>
</div>

<?php
include './includes/footer.php';
?>
