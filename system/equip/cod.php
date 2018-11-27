<style>
    .floating-box {
        float: left;
        width: 150px;
        height: 75px;
        margin: 10px;
        padding: 10px;
        border: 3px solid black;
    }
</style>
<page>
    <?php
    $read = new Database;
    $read->connect();
    $read->select('equipamentos', 'numSerie, numEquip, tpEquip', NULL, "statusEquip = 'OK'", "numEquip ASC");
    foreach ($read->getResult() as $r):
        extract($r);
        echo "<div class=\"floating-box\">
            <p>$numEquip</p>
            <barcode type=\"C128A\" value=\"$numSerie\" style=\"width: 40mm; height: 5mm; font-size: 4mm\"></barcode>
        </div>";
    endforeach;
    $read->disconnect();
    ?>
</page>