<style type="text/css">
    <!--
    .ex1
    {
        border-collapse: separate;
        border-spacing: 2px 50px;
    }
    .fonteGd
    {
        font: 15px arial, sans-serif;
        font-size:    40pt;
        font-weight:  bold;
        padding:      1px;
        text-align:   center;
        text-decoration: underline;
        text-transform: capitalize;
    }
    .fontePq
    {
        font: 15px arial, sans-serif;
        font-size:    30pt;
        padding:      1px;
        text-align:   center;
        text-transform: capitalize;
    }
    -->
</style>
<div>
    <table class="">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Sacola</th>
                <th>Retirada</th>
                <th>Devolvida</th>
                <th>Avariada</th>
                <th>Vendidas</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($imp->getRelat_total() as $value):
                extract($value);
                //print_r($value);
                ?>
                <tr class="">
                    <td><?= $matricula ?></td>
                    <td><?= $nome ?></td>
                    <td><?= $tp_sacola ?></td>
                    <td><?= $qtd_retirada ?></td>
                    <td><?= $qtd_devolvida ?></td>
                    <td><?= $qtd_avariada ?></td>
                    <td><?= $Vendidas ?></td>
                    <td><?= $data ?></td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
