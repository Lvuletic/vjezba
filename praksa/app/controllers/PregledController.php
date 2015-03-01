<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {

    }

    public function izracunAction()
    {
        ?>
        <div id="odabir">
        <table id="stavke" border="1">

        <tr>
            <th>Sifra stavke</th>
            <th>Sifra artikla</th>
            <th>Naziv artikla</th>
            <th>Cijena</th>
        </tr>
        <?php
        $request = new Phalcon\Http\Request();
        $sifra = $request->get('sifra');
        $stavke = Stavka::find("sifra_N='$sifra'");
        foreach($stavke as $stavka)
        {
            ?>
            <tr>
                <td><?php echo $stavka->sifra_S?></td>
                <td><?php echo $stavka->sifra_A?></td>
                <td><?php echo $stavka->naziv_A?></td>
                <td><?php echo $stavka->ukupna_cijena?></td>
            </tr>
        <?php

        }
        ?>
        </table>

        </div>
    <?php


    }
}
